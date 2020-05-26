@extends('departamentosprofessores.module')

@section('header','Associação Departamento Professor')@show

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


    <form id="form-departamentoprofessor" action="{{ url("/departamentosprofessores/$departamentoProfessor->id") }}" class="form" method="POST">
        @csrf
        @if($departamentoProfessor->id)
            @method('put')
        @endif
        
        <label for="departamento">Departamento</label>
        <select name="departamento_id" id="departamento" class="form-control">
            <option value=""></option>
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}" 
                    @if($departamento->id == old('departamento_id'))
                        selected
                    @elseif ($departamentoProfessor->departamento_id == $departamento->id)
                        selected
                    @endif   > {{ $departamento->nome }} </option>    
            @endforeach
        </select>
        @error('departamento_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <label for="professor">Professor</label>
        <select name="professor_id" id="professor" class="form-control">
            <option value=""></option>
            @foreach ($professores as $professor)
                <option value="{{ $professor->id }}" 
                    @if($professor->id == old('professor_id'))
                        selected
                    @elseif ($departamentoProfessor->id == $professor->id)
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
    <button type="submit" form="form-departamentoprofessor" class="btn btn-success">Salvar</button>
@endsection