@extends('layouts.app')

@section('content')
@include('disciplinas.menu')
<div class="card">
<div class="card-header">Alterar disciplina {{$disciplina->nome}}</div>
    <div class="card-body">
        @if ($errors->any())
            @foreach  ($errors->all() as $error)
                <span class="alert alert-danger"> {{$error}}</span>
            @endforeach
            <br>
        @endif


        <form id="form-disciplina" action="{{route('disciplinas.update',['disciplina'=>$disciplina])}}" class="form" method="POST">
           @csrf
           @method('put')
           <label for="nome">Nome da disciplina</label>
        <input type="text" name="nome" id="nome" value="{{$disciplina->nome}}" class="form-control" >

           <label for="ch">Carga horária</label>
            <input type="number" name="carga_horaria" value="{{$disciplina->carga_horaria}}" id="ch" class="form-control" >

           <label for="professor">Professor</label>
           <select name="professor_id" id="professor" class="form-control">
                <option value=""></option>
               @foreach ($professores as $professor)
                    <option value="{{$professor->id}}" @if($professor->id == $disciplina->professor->id) selected
                        
                    @endif >{{$professor->nome}}</option>
               @endforeach
           </select>
           
       </form>
    </div>
    <div class="card-footer">
        <button form="form-disciplina" type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>

@endsection