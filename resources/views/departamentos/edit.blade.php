@extends('departamentos.module')

@section('header', 'Alteração de Departamento')@show

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

    <form id="form-departamento" action="{{ route('departamentos.update',['departamento'=>$departamento]) }}" class="form" method="post">
      @csrf
      @method('put')
      <label for="nome">Nome do Departamento</label>
      <input type="text" name="nome" value="{{ $departamento->nome }}" id="nome" class="form-control">
      @error('nome')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <label for="professor">Nome do Chefe do Departamento</label>
      <select name="professor_id" id="professor" class="form-control">
        <option value=""></option>
        @foreach($professores as $professor)
          <option value="{{ $professor->id }}"
            @if ($professor->id == $departamento->chefe_id))
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
