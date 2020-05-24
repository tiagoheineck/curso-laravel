@extends('disciplinas.module')

@section('header',$disciplina->nome)

@show

@section('body')

    Nome do Professor: {{ $disciplina->professor->nome }}
    <br>
    Carga Horária: {{ $disciplina->carga_horaria}}

@endsection

@section('footer')
            <a href="{{ route('disciplinas.edit',['disciplina'=>$disciplina])  }}"
                class="btn btn-info"> Editar </a>
            
            <form action="{{ route('disciplinas.destroy',['disciplina'=>$disciplina])  }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger"> Remover </button>                
            </form>
@endsection            