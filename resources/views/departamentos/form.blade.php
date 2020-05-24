@extends('departamentos.module')

@section('header', 'Cadastro de Departamento')@show

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

    <form id="form-departamento" action="{{ url("/departamentos") }}" class="form" method="post">
      @csrf
      <label for="nome">Nome do Departamento</label>
      <input type="text" name="nome" value="{{ old('nome') }}" id="nome" class="form-control">
      @error('nome')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <label for="professor">Nome do Chefe do Departamento</label>
      <select name="professor_id" id="professor" class="form-control">
        <option value=""></option>
        @foreach($professores as $professor)
          <option value="{{ $professor->id }}"
            @if ($professor->id == $professor->id)
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
  <button type="submit" form="form-departamento" class="btn btn-success"> Salvar </button>
@endsection
