@extends('disciplinas.module')

@section('header','Cadastro de Disciplina')@show

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


    <form id="form-disciplina" action="{{ url("/disciplinas/$disciplina->id") }}" class="form" method="POST">
        @csrf
        @if($disciplina->id)
            @method('put')
        @endif
        <label for="nome">Nome da Disciplina</label>
        <input type="text" name="nome" value="{{ old('nome') ?? $disciplina->nome }}" id="nome" class="form-control">
        @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <label for="carga_horaria">Carga Horária</label>
        <input type="number" class="form-control"  value="{{ old('carga_horaria') ?? $disciplina->carga_horaria }}" name="carga_horaria" id="carga_horaria">
        @error('carga_horaria')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <label for="professor">Nome do Professor</label>
        <select name="professor_id" id="professor" class="form-control">
            <option value=""></option>
            @foreach ($professores as $professor)
                <option value="{{ $professor->id }}" 
                    @if($professor->id == old('professor_id'))
                        selected
                    @elseif ($professor->id == $disciplina->professor_id)
                        selected
                    @endif   > {{ $professor->nome }} </option>    
            @endforeach
        </select>
        @error('professor_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        
    </form>

@endsection

@section('footer')
    <button type="submit" form="form-disciplina" class="btn btn-success">Salvar</button>
@endsection