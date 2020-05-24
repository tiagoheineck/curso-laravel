<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\Cidade;
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
        $cursos = Curso::orderBy('nome')->paginate();
        return view('cursos.index',compact(
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
        $curso = new Curso();
        $cidades = Cidade::orderBy('nome')->get();
        return view('cursos.form',compact('cidades','curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {                
        $curso = Curso::create($request->all());

        return redirect("/cursos/$curso->id")
            ->with('success','Curso cadastrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        
          return view('cursos.show',compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        $cidades = Cidade::orderBy('nome')->get();
        return view('cursos.form-collective',compact('curso','cidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Cursos  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        
        $curso->update($request->all());

        return redirect()
            ->route('cursos.show',[
                    'curso'=>$curso
                ]
            )->with('success','Salvei seu cadastro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Curso  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $disciplina->delete();
        return redirect()
            ->route('cursos.index')
            ->with('success','Usuário removido com sucesso');
    }
}
