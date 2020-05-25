<?php

namespace App\Http\Controllers;

use App\Model\Conteudo;
use App\Model\Disciplina;
use Illuminate\Http\Request;
use App\Http\Requests\DisciplinaRequest;

class ConteudoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conteudos = Conteudo::orderBy('titulo')->paginate();
        return view('conteudos.index',compact(
            'conteudos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conteudo = new Conteudo();
        $disciplinas = Disciplina::orderBy('titulo')->get();
        return view('conteudos.form',compact('disciplinas','conteudo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConteudoRequest $request)
    {                
        $conteudo = Conteudo::create($request->all());

        return redirect("/conteudos/$conteudo->id")
            ->with('success','Conteudo cadastrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function show(Conteudo $conteudo)
    {
        
          return view('conteudos.show',compact('conteudo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function edit(Conteudo $conteudo)
    {
        $disciplinas = Disciplina::orderBy('nome')->get();
        return view('conteudos.form-collective',compact('conteudo','disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function update(ConteudoRequest $request, Conteudo $conteudo)
    {
        
        $conteudo->update($request->all());

        return redirect()
            ->route('conteudos.show',[
                    'conteudo'=>$conteudo
                ]
            )->with('success','Salvei seu cadastro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Conteudo  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conteudo $conteudo)
    {
        $disciplina->delete();
        return redirect()
            ->route('conteudos.index')
            ->with('success','Usuário removido com sucesso');
    }
}
