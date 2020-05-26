@extends('conteudos.module')

@section('body')

    Titulo: {{ $conteudo->titulo }}
    <br>
    Conteudo: {{ $conteudo->conteudo}}
    <br>
    Disciplina: {{ $conteudo->disciplina->nome}}

@endsection

@section('footer')
            <a href="{{ route('conteudos.edit',['conteudo'=>$conteudo])  }}"
                class="btn btn-info"> Editar </a>
            
            <form action="{{ route('conteudos.destroy',['conteudo'=>$conteudo])  }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger"> Remover </button>                
            </form>
@endsection            