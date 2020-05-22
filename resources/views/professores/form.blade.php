@extends('layouts.app')

@section('content')
@include('professores.menu')
<div class="card">
<div class="card-header">Novo professor</div>
    <div class="card-body">
        @if ($errors->any())
            @foreach  ($errors->all() as $error)
                <span class="alert alert-danger"> {{$error}}</span>
            @endforeach
            <br>
        @endif


        <form id="form-professor" action="{{url('/professores')}}" class="form" method="POST">
           @csrf
           <label for="nome">Nome do professor</label>
        <input type="text" name="nome" id="nome" value="{{old('nome')}}" class="form-control" >
           
       </form>
    </div>
    <div class="card-footer">
        <button form="form-professor" type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>

@endsection