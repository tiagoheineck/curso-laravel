@extends('layouts.app')

@section('content')
@include('cursos.menu')
<div class="card">
<div class="card-header">Alterar curso {{$curso->nome}}</div>
    <div class="card-body">
        @if ($errors->any())
            @foreach  ($errors->all() as $error)
                <span class="alert alert-danger"> {{$error}}</span>
            @endforeach
            <br>
        @endif


        <form id="form-curso" action="{{route('cursos.update',['curso'=>$curso])}}" class="form" method="POST">
           @csrf
           @method('put')
           <label for="nome">Nome do curso</label>
        <input type="text" name="nome" id="nome" value="{{$curso->nome}}" class="form-control" >

           <label for="cidade">Cidade</label>
           <select name="cidade_id" id="cidade" class="form-control">
                <option value=""></option>
               @foreach ($cidades as $cidade)
                    <option value="{{$cidade->id}}" @if($cidade->id == $curso->cidade->id) selected
                        
                    @endif >{{$cidade->nome}}</option>
               @endforeach
           </select>
           
           <label for="departamento">Departamento</label>
           <select name="departamento_id" id="departamento" class="form-control">
                <option value=""></option>
               @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}" @if($departamento->id == $curso->departamento->id) selected
                        
                    @endif >{{$departamento->nome}}</option>
               @endforeach
           </select>

       </form>
    </div>
    <div class="card-footer">
        <button form="form-curso" type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>

@endsection