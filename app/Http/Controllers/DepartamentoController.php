<?php

namespace App\Http\Controllers;

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
        $departamentos = Departamento::orderBy('nome')->paginate(); //get() traz tudo, caso nao queira paginate
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
        $departamentos = Departamento::orderBy('nome')->get();
        return view('departamentos.form',compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoRequest $request)
    {
        $departamento = departamento::create($request->all());

        return redirect("departamentos/$departamento->id")
            ->with('success','departamento cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        return view('departamentos.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit',compact('departamento'));
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
        $departamento->update($request->all());


        return redirect()
            ->route('departamentos.show',[
                    'departamento'=>$departamento
                ]
            )->with('success','Cadastro atualizado com sucesso.');
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
                ->with('success','departamento removida com sucesso'); //flash data
    }
}
