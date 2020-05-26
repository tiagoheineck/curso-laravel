@extends('cidades.module')

@section('header','Cadastro de Cidade')@show

@section('body')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


    <form id="form-cidade" action="{{ url("/cidades/$cidade->id") }}" class="form" method="POST">
        @csrf
        @if($cidade->id)
            @method('put')
        @endif
        <label for="nome">Nome da Cidade</label>
        <input type="text" name="nome" value="{{ old('nome') ?? $cidade->nome }}" id="nome" class="form-control">
        @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
    </form>

@endsection

@section('footer')
    <button type="submit" form="form-cidade" class="btn btn-success">Salvar</button>
@endsection