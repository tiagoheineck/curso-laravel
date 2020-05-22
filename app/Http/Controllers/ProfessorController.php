<?php

namespace App\Http\Controllers;

use App\Model\Professor;
use Illuminate\Http\Request;
use App\Http\Requests\ProfessorRequest;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professor::orderBy('nome')->paginate(); //get() traz tudo, caso nao queira paginate
        return view('professores.index', compact(
            'professores'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $professores = Professor::orderBy('nome')->get();
        //return view('professores.form',compact('professores'));
        return view('professores.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
        $professor = Professor::create($request->all());

        return redirect("professores/$professor->id")
            ->with('success','Professor cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        return view('professores.show', compact('professor')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        return view('professores.edit',compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorRequest $request, Professor $professor)
    {
        $professor->update($request->all());


        return redirect()
            ->route('professores.show',[
                    'professor'=>$professor
                ]
            )->with('success','Cadastro atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()
                ->route('professores.index')
                ->with('success','professor removido com sucesso'); //flash data
    }
}
