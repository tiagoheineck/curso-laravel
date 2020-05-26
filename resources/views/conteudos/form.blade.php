@extends('layouts.app')

@section('content')
@include('conteudos.menu')
<div class="card">
<div class="card-header">Novo Conteúdo</div>
    <div class="card-body">
        @if ($errors->any())
            @foreach  ($errors->all() as $error)
                <span class="alert alert-danger"> {{$error}}</span>
            @endforeach
            <br>
        @endif


        <form id="form-conteudo" action="{{url('/conteudos')}}" class="form" method="POST">
           @csrf
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}" class="form-control" >

            <label for="conteudo">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" class="form-control">{{old('conteudo')}}</textarea>

            <label for="disciplina">Discplina</label>
            <select name="disciplina_id" id="disciplina" class="form-control">
                <option value=""></option>
                @foreach ($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                @endforeach
            </select>

           
           
       </form>
    </div>
    <div class="card-footer">
        <button form="form-conteudo" type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>

@endsection