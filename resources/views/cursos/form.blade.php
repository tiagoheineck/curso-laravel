@extends('cursos.module')

@section('header','Cadastro de Cursos')@show

@section('body')

{{ __('Departament')  }}

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


    <form id="form-curso" action="{{ url("/cursos/$curso->id") }}" class="form" method="POST">
        @csrf
        @if($curso->id)
            @method('put')
        @endif
        <label for="nome">Nome da Curso</label>
        <input type="text" name="nome" value="{{ old('nome') ?? $curso->nome }}" id="nome" class="form-control">
        @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <label for="cidade">Nome da Cidade</label>
        <select name="cidade_id" id="cidade" class="form-control">
            <option value=""></option>
            @foreach ($cidades as $cidade)
                <option value="{{ $cidade->id }}" @if(
                    $cidade->id == old('cidade_id')
                )
                        selected
                 @endif   > {{ $cidade->nome }} </option>    
            @endforeach
        </select>
        @error('cidade_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        
    </form>

@endsection

@section('footer')
    <button type="submit" form="form-curso" class="btn btn-success">Salvar</button>
@endsection