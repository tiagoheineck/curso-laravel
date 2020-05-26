<?php

namespace App\Http\Controllers;

use App\Model\Professor;
use App\Model\Departamento;
use App\Model\DepartamentoProfessor;
use App\Http\Requests\DepartamentoProfessorRequest;
use Illuminate\Http\Request;

class DepartamentoProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentosProfessores = DepartamentoProfessor::orderBy('departamento_id')->paginate();

        return view('departamentosprofessores.index',compact(
            'departamentosProfessores'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentoProfessor = new DepartamentoProfessor();

        $professores = Professor::orderBy('nome')->get();
        $departamentos = Departamento::orderBy('nome')->get();

        return view('departamentosprofessores.form',compact('professores','departamentos','departamentoProfessor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoProfessorRequest $request)
    {                
        $departamentoProfessor = DepartamentoProfessor::create($request->all());

        return redirect("/departamentosprofessores/$departamentoProfessor->id")
            ->with('success','Associação cadastrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(DepartamentoProfessor $departamentoProfessor)
    {        
          return view('departamentosprofessores.show',compact('departamentoProfessor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartamentoProfessor $departamentoProfessor)
    {
        $professores = Professor::orderBy('nome')->get();
        $departamentos = Departamento::orderBy('nome')->get();

        return view('departamentosprofessores.form',compact('departamentoProfessor','professores','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoProfessorRequest $request, DepartamentoProfessor $departamentoProfessor)
    {
        
        $departamentoProfessor->update($request->all());

        return redirect()
            ->route('departamentosprofessores.show',[
                    'departamentoProfessor'=>$departamentoProfessor
                ]
            )->with('success','Salvei seu cadastro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartamentoProfessor $departamentoProfessor)
    {
        $departamentoProfessor->delete();
        return redirect()
            ->route('departamentosprofessores.index')
            ->with('success','Usuário removido com sucesso');
    }
}