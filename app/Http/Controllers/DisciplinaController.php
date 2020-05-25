<?php

namespace App\Http\Controllers;

use App\Model\Professor;
use App\Model\Disciplina;
use App\Http\Requests\DisciplinaRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;



class DisciplinaController extends Controller
{

    public function index()
    {
        //if(Gate::denies('admin')) abort(403);
        //Call a view
        $disciplinas = Disciplina::orderBy('nome')->paginate();
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
        $disciplina = new Disciplina();
        $professores = Professor::orderBy('nome')->get();
        return view('disciplinas.form', compact('professores', 'disciplina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(DisciplinaRequest $request)
    {
        /*
        //$professor = Professor::findOrFail($request->professor_id);

        $disciplina = new Disciplina();
        $disciplina->nome = $request->nome;
        //$disciplina->professor()->associate($professor);
        $disciplina->professor_id = $request->professor_id;
        $disciplina->save();

        $request->validate(
          [
           'nome'            =>'required',
           'carga_horaria'   =>'required',
           'professor_id'    =>'required'
         ]
        );
        */

        $disciplina = Disciplina::create($request->all());

        return redirect("/disciplinas/$disciplina->id")
          ->with('success', 'Disciplina cadastrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Disciplina  $disciplina
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
      return view('disciplinas.edit', compact(
        'disciplina', 'professores'
      ));
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
        /*
        $disciplina->nome = $request->nome;
        $disciplina->carga_horaria = $request->carga_horaria;
        $disciplina->professor_id = $request->professor_id;
        $disciplina->save();
        */

        //$disciplina->fill($request->all());
        $disciplina->update($request->all());
        $disciplina->save();

        return redirect()
            ->route('disciplinas.show',[
                    'disciplina'=>$disciplina
                ]
            )->with('success', 'Discplina alterada com sucesso');
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
          ->with('success', 'Usuário removido com sucesso.');
    }
}
