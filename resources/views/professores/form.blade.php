@extends('professores.module')

@section('header','Cadastro de Professores')

@show

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

<form id="form-professor" action="{{ url("/professores/$professor->id") }}" class="form" method="POST">
    @csrf
    @if($professor->id)
        @method('put')
    @endif
    <label for="nome">Nome do Professor</label>
    <input type="text" name="nome" value="{{ old('nome') ?? $professor->nome }}" id="nome" class="form-control">
    @error('nome')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            
@enderror
    
</form>

@endsection

@section('footer')
    <button type="submit" form="form-professor" class="btn btn-success">Salvar</button>
@endsection