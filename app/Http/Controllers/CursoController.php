<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\Cidade;
use App\Model\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::orderBy('nome')->paginate(); //get() traz tudo, caso nao queira paginate
        return view('cursos.index', compact(
            'cursos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::orderBy('nome')->get();
        $departamentos = Departamento::orderBy('nome')->get();
        return view('cursos.form',compact('cidades','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        //dd($request->all());
        $curso = Curso::create($request->all());

        return redirect("cursos/$curso->id")
            ->with('success','Curso cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        $cidades = Cidade::orderBy('nome')->get();
        $departamentos = Departamento::orderBy('nome')->get();
        return view('cursos.edit',compact('curso','cidades','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        $curso->update($request->all());


        return redirect()
            ->route('cursos.show',[
                    'curso'=>$curso
                ]
            )->with('success','Cadastro atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()
                ->route('cursos.index')
                ->with('success','curso removido com sucesso'); //flash data
    }
}
