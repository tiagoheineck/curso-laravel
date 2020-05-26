<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplinaRequest;
use App\Model\Professor;
use App\Model\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{

    public function index()
    {
        $disciplinas = Disciplina::orderBy('nome')->paginate();
        return view('disciplinas.index',compact(
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
        $disciplina = new Disciplina();
        $professores = Professor::orderBy('nome')->get();
        return view('disciplinas.form',compact('professores','disciplina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {                
        $disciplina = Disciplina::create($request->all());

        return redirect("/disciplinas/$disciplina->id")
            ->with('success','Disciplina cadastrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        
          return view('disciplinas.show',compact('disciplina'));
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
        return view('disciplinas.form-collective',compact('disciplina','professores'));
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
        
        $disciplina->update($request->all());

        return redirect()
            ->route('disciplinas.show',[
                    'disciplina'=>$disciplina
                ]
            )->with('success','Salvei seu cadastro');
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
            ->with('success','Usuário removido com sucesso');
    }
}
