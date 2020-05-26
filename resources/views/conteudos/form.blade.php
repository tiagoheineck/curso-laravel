@extends('conteudos.module')

@section('header','Cadastro de Conteudo')@show

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
    <form id="form-conteudo" action="{{ url("/conteudos/$conteudo->id") }}" class="form" method="POST">
        @csrf
        @if($conteudo->id)
            @method('put')
        @endif
        <label for="titulo">Titulo do Conteudo</label>
        <input type="text" name="titulo" value="{{ old('titulo') ?? $conteudo->nome }}" id="titulo" class="form-control">
        @error('titulo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <label for="conteudo">Conteudo</label>
        <input type="textarea" class="form-control"  value="{{ old('conteudo') ?? $conteudo->conteudo }}" name="conteudo" id="conteudo">
        @error('conteudo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <label for="disciplina_id">Nome da Disciplina</label>
        <select name="disciplina_id" id="disciplina_id" class="form-control">
            <option value=""></option>
            @foreach ($disciplinas as $disciplina)
                <option value="{{ $disciplina->id }}" 
                    @if($disciplina->id == old('disciplina_id'))
                        selected
                    @elseif ($disciplina->id == $conteudo->disciplina_id)
                        selected
                    @endif   > {{ $disciplina->nome }} </option>    
            @endforeach
        </select>
        @error('disciplina_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        
    </form>

@endsection

@section('footer')
    <button type="submit" form="form-conteudo" class="btn btn-success">Salvar</button>
@endsection