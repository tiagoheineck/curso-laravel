@extends('conteudos.module')

@section('header', 'Cadastro de Conteúdo')@show

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

    <form id="form-conteudo" action="{{ url("/conteudos") }}" class="form" method="post">
      @csrf
      <label for="nome">Título do Conteudo</label>
      <input type="text" name="titulo" value="{{ old('titulo') }}" id="titulo" class="form-control">
      @error('titulo')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <label for="disciplina">Nome da Discplina</label>
      <select name="disciplina_id" id="disciplina" class="form-control">
        <option value=""></option>
        @foreach($disciplinas as $disciplina)
          <option value="{{ $disciplina->id }}"
            @if ($disciplina->id == old('disciplina_id'))
              selected
            @endif>
              {{ $disciplina->nome }}
          </option>
        @endforeach
      </select>
      @error('disciplina_id')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror


    </form>

@endsection

@section('footer')
  <button type="submit" form="form-conteudo" class="btn btn-success"> Salvar </button>
@endsection
