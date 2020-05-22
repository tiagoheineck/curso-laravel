<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplinaRequest;
use App\Model\Disciplina;
use App\Model\Professor;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinas = Disciplina::orderBy('nome')->paginate(); //get() traz tudo, caso nao queira paginate
        return view('disciplinas.index', compact(
            'disciplinas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professores = Professor::orderBy('nome')->get();
        return view('disciplinas.form',compact('professores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {

        
        //dd($request->all());

        $disciplina = new Disciplina();
        $disciplina->nome = $request->nome;
        $disciplina->professor_id = $request->professor_id;
        $disciplina->carga_horaria = $request->carga_horaria;
        $disciplina->save();

        //tudo isso pode ser substituído por: $disciplina = Disciplina::create($request->all());

        return redirect("disciplinas/$disciplina->id")
            ->with('success','Disciplina cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Disciplina  $disciplin
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        return view('disciplinas.show', compact('disciplina'));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {
        $professores = Professor::orderBy('nome')->get();
        return view('disciplinas.edit',compact('disciplina','professores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinaRequest $request, Disciplina $disciplina)
    {
        $disciplina->nome = $request->nome;
        $disciplina->carga_horaria = $request->carga_horaria;
        $disciplina->professor_id = $request->professor_id;
        $disciplina->save();

        //jeito compacto: 
        //$disciplina->fill($request->all()); $disciplina->save();

        //jeito mais compacto ainda:
        //$disciplina->update($request->all());


        return redirect()
            ->route('disciplinas.show',[
                    'disciplina'=>$disciplina
                ]
            )->with('success','Cadastro atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();
        return redirect()
                ->route('disciplinas.index')
                ->with('success','Disciplina removida com sucesso'); //flash data
    }
}
