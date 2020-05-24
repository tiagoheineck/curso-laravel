@extends('cursos.module')

@section('header',$curso->nome)

@show

@section('body')

    Nome da Cidade: {{ $curso->cidade->nome }}

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