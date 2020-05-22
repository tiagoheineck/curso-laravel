@extends('layouts.app')

@section('content')
@include('cidades.menu')
<div class="card">
<div class="card-header">Novo cidade</div>
    <div class="card-body">
        @if ($errors->any())
            @foreach  ($errors->all() as $error)
                <span class="alert alert-danger"> {{$error}}</span>
            @endforeach
            <br>
        @endif


        <form id="form-cidade" action="{{url('/cidades')}}" class="form" method="POST">
           @csrf
           <label for="nome">Nome da cidade</label>
            <input type="text" name="nome" id="nome" value="{{old('nome')}}" class="form-control" >
           
       </form>
    </div>
    <div class="card-footer">
        <button form="form-cidade" type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>

@endsection