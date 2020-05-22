@extends('layouts.app')

@section('content')
@include('professores.menu')
<div class="card">
<div class="card-header">Alterar professor {{$professor->nome}}</div>
    <div class="card-body">
        @if ($errors->any())
            @foreach  ($errors->all() as $error)
                <span class="alert alert-danger"> {{$error}}</span>
            @endforeach
            <br>
        @endif


        <form id="form-professor" action="{{route('professores.update',['professor'=>$professor])}}" class="form" method="POST">
           @csrf
           @method('put')
           <label for="nome">Nome do professor</label>
        <input type="text" name="nome" id="nome" value="{{$professor->nome}}" class="form-control" >
           
       </form>
    </div>
    <div class="card-footer">
        <button form="form-professor" type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>

@endsection