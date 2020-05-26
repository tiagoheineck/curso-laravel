@extends('cursos.module')

@section('body')

    Nome do Curso: {{ $curso->nome }}
    <br>
    Cidade: {{ $curso->cidade->nome}}

@endsection

@section('footer')
            <a href="{{ route('cursos.edit',['curso'=>$curso])  }}"
                class="btn btn-info"> Editar </a>
            
            <form action="{{ route('cursos.destroy',['curso'=>$curso])  }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger"> Remover </button>                
            </form>
@endsection            