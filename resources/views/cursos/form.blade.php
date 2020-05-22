@extends('layouts.app')

@section('content')
@include('cursos.menu')
<div class="card">
<div class="card-header">Novo curso</div>
    <div class="card-body">
        @if ($errors->any())
            @foreach  ($errors->all() as $error)
                <span class="alert alert-danger"> {{$error}}</span>
            @endforeach
            <br>
        @endif


        <form id="form-curso" action="{{url('/cursos')}}" class="form" method="POST">
           @csrf
           <label for="nome">Nome do curso</label>
        <input type="text" name="nome" id="nome" value="{{old('nome')}}" class="form-control" >

           <label for="cidade">Cidade</label>
           <select name="cidade_id" id="cidade" class="form-control">
               @foreach ($cidades as $cidade)
                    <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
               @endforeach
           </select>

           <label for="departamento">Departamento</label>
           <select name="departamento_id" id="departamento" class="form-control">
               @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}">{{$departamento->nome}}</option>
               @endforeach
           </select>
           
       </form>
    </div>
    <div class="card-footer">
        <button form="form-curso" type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>

@endsection