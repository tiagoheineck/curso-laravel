<?php

namespace App\Http\Controllers;

use App\Model\Conteudo;
use App\Model\Disciplina;
use Illuminate\Http\Request;

class ConteudoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conteudos = Conteudo::orderBy('titulo')->paginate(); //get() traz tudo, caso nao queira paginate
        return view('conteudos.index', compact(
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
        $disciplinas = Disciplina::orderBy('nome')->get();
        return view('conteudos.form',compact('disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conteudo = Conteudo::create($request->all());

        return redirect("conteudos/$conteudo->id")
            ->with('success','Conteúdo cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function show(Conteudo $conteudo)
    {
        return view('conteudos.show', compact('conteudo'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function edit(Conteudo $conteudo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conteudo $conteudo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conteudo $conteudo)
    {
        //
    }
}
