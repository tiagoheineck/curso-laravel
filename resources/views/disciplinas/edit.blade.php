@extends('disciplinas.module')

@section('header', 'Alteração de Disciplina')@show

@section('body')
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
          @endforeach
        </ul>
      </div>
    @endif

    <form id="form-disciplina" action="{{ route('disciplinas.update',['disciplina'=>$disciplina]) }}" class="form" method="post">
      @csrf
      @method('put')
      <label for="nome">Nome da Disciplina</label>
      <input type="text" name="nome" value="{{ $disciplina->nome }}" id="nome" class="form-control">
      @error('nome')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <label for="carga_horaria">Carga Horária</label>
      <input type="number" name="carga_horaria" value="{{ $disciplina->carga_horaria }}" id="carga_horaria" class="form-control">
      @error('carga_horaria')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <label for="professor">Nome do Professor</label>
      <select name="professor_id" id="professor" class="form-control">
        <option value=""></option>
        @foreach($professores as $professor)
          <option value="{{ $professor->id }}"
            @if ($professor->id == $disciplina->professor->id))
              selected
            @endif>
              {{ $professor->nome }}
          </option>
        @endforeach
      </select>
      @error('professor_id')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </form>

@endsection

@section('footer')
  <button type="submit" form="form-disciplina" class="btn btn-success"> Salvar </button>
@endsection
