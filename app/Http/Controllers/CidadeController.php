<?php

namespace App\Http\Controllers;

use App\Http\Requests\CidadeRequest;
use App\Model\Cidade;


class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cidades = Cidade::orderBy('nome')->paginate();
        return view('cidades.index',compact(
            'cidades'
        ));
    }

    public function create()
    {
        $cidade = new Cidade();
        return view('cidades.form',compact('cidade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeRequest $request)
    {                
        $cidade = Cidade::create($request->all());

        return redirect("/cidades/$cidade->id")
            ->with('success','Cidade cadastrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Cidade $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
          return view('cidades.show',compact('cidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        return view('cidades.form',compact('cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeRequest $request, Cidade $cidade)
    {
        $cidade->update($request->all());

        return redirect()
            ->route('cidades.show',[
                    'cidade'=>$cidade
                ]
            )->with('success','Salvei seu cadastro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        $cidade->delete();
        return redirect()
            ->route('cidades.index')
            ->with('success','Curso removido com sucesso');
    }
}
