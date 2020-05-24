<?php

namespace App\Http\Controllers;

use App\Model\Professor;
use App\Model\Disciplina;
use App\Http\Requests\ProfessorRequest;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Call a view
      $professores = Professor::orderBy('nome')->paginate();
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
      $professor = new Professor();
      return view('professores.form', compact('professor',));
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

      return redirect("/professores/$professor->id")
        ->with('success', 'Professor cadastrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        return view('professores.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {

      return view('professores.edit', compact(
        'professor'
      ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorRequest $request, Professor $professor)
    {

        $professor->update($request->all());
        $professor->save();

        return redirect()
            ->route('professores.show',[
                    'professor'=>$professor
                ]
            )->with('success', 'Dados do professor alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()
          ->route('professores.index')
          ->with('success', 'Professor removido com sucesso.');
    }
}
