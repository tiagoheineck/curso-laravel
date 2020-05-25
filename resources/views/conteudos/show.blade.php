@extends('conteudos.module')

@section('header', $conteudo->titulo)@show

@section('body')
  Nome do Conteúdo: {{ $conteudo->titulo }}
  </br>
  Nome do Disciplina: {{ $disciplinaNome }}
@endsection

@section('footer')

    <div class="footer">
      <a href="{{ route('conteudos.edit', ['conteudo'=>$conteudo]) }}"
        class="btn btn-info"> Editar </a>

      <form action="{{ route('conteudos.destroy', ['conteudo'=>$conteudo]) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"> Remover </button>
      </form>
    </div>
  </div>
@endsection
