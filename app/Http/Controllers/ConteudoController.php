<?php

namespace App\Http\Controllers;

use App\Model\Conteudo;
use App\Model\Professor;
use App\Model\Disciplina;
use App\Http\Requests\ConteudoRequest;
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
      //Call a view
      $conteudos = Conteudo::orderBy('titulo')->paginate();
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
      $conteudo = new Conteudo();
      $conteudo->user_id = auth()->user()->id;
      $disciplinas = Disciplina::orderBy('nome')->get();
      return view('conteudos.form', compact('conteudo','disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConteudoRequest $request)
    {
      $conteudo = new Conteudo();
      $conteudo->user_id = auth()->user()->id;
      $conteudo->titulo = $request->titulo;
      $conteudo->disciplina_id = $request->disciplina_id;
      $conteudo->save();

      return redirect("/conteudos/$conteudo->id")
        ->with('success', 'Conteúdo cadastrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function show(Conteudo $conteudo)
    {
        $disciplinaNome = Disciplina::find($conteudo->disciplina_id)->nome;
        return view('conteudos.show', compact('conteudo', 'disciplinaNome'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function edit(Conteudo $conteudo)
    {
        /*
        if($conteudo->user_id === auth()->user()->id){
          $disciplinas = Disciplina::orderBy('nome')->get();
          return view('conteudos.edit', compact(
            'conteudo', 'disciplinas'
          ));
        }
        */

        $disciplinas = Disciplina::orderBy('nome')->get();
        return view('conteudos.edit', compact(
          'conteudo', 'disciplinas'
        ));

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
        $this->authorize('update', $conteudo);
        $conteudo->update($request->all());
        $conteudo->save();

        return redirect()
            ->route('conteudos.show',[
                    'conteudo'=>$conteudo
                ]
            )->with('success', 'Conteúdo alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conteudo $conteudo)
    {
        $this->authorize('delete', $conteudo);
        $conteudo->delete();
        return redirect()
          ->route('conteudos.index')
          ->with('success', 'Conteúdo removido com sucesso.');
    }
}
