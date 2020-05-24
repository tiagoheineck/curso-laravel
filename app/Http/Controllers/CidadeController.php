<?php

namespace App\Http\Controllers;

use App\Model\Cidade;
use Illuminate\Http\Request;
use App\Http\Requests\CidadeRequest;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::orderBy('nome')->paginate();
        return view('cidades.index',compact(
            'cidades'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidade = new Cidade();
        $cidades = Cidade::orderBy('nome')->get();
        return view('cidades.form',compact('cidades','cidade'));
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
     * @param  \App\Model\Cidade  $cidade
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
        return view('cidades.form-collective',compact('cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(cidadeRequest $request, Cidade $cidade)
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
            ->with('success','Usuário removido com sucesso');
    }
}
