<?php

namespace App\Http\Controllers;

use App\Model\Professor;
use App\Model\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\DepartamentoRequest;


class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Call a view
      $departamentos = Departamento::orderBy('nome')->paginate();
      return view('departamentos.index', compact(
        'departamentos'
      ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $departamento = new Departamento();
      $professores = Professor::orderBy('nome')->get();
      return view('departamentos.form', compact('departamento', 'professores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoRequest $request)
    {
      $departamento = new Departamento();
      $departamento->nome = $request->nome;
      $departamento->chefe_id = $request->professor_id;
      $departamento->save();
      return redirect("/departamentos/$departamento->id")
        ->with('success', 'Departamento cadastrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        $professorNome = Professor::find($departamento->chefe_id)->nome;
        return view('departamentos.show', compact('departamento', 'professorNome'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {

        $professores = Professor::orderBy('nome')->get();
        return view('departamentos.edit', compact(
          'departamento', 'professores'
        ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoRequest $request, Departamento $departamento)
    {

      $departamento->nome = $request->nome;
      $departamento->chefe_id = $request->professor_id;
      $departamento->save();


      //$disciplina->fill($request->all());
      //$departamento->update($request->all());
      //$departamento->save();

      return redirect()
          ->route('departamentos.show',[
                  'departamento'=>$departamento
              ]
          )->with('success', 'Departamento alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
      $departamento->delete();
      return redirect()
        ->route('departamentos.index')
        ->with('success', 'Departamento removido com sucesso.');
    }
}
