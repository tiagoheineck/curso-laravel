@extends('conteudos.module')

@section('header', 'Alteração de Conteúdo')@show

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

    <form id="form-conteudo" action="{{ route('conteudos.update',['conteudo'=>$conteudo]) }}" class="form" method="post">
      @csrf
      @method('put')
      <label for="nome">Nome do Conteúdo</label>
      <input type="text" name="titulo" value="{{ $conteudo->titulo }}" id="titulo" class="form-control">
      @error('titulo')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <label for="professor">Nome da Disciplina</label>
      <select name="disciplina_id" id="disciplina" class="form-control">
        <option value=""></option>
        @foreach($disciplinas as $disciplina)
          <option value="{{ $disciplina->id }}"
            @if ($disciplina->id == $conteudo->disciplina->id))
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
