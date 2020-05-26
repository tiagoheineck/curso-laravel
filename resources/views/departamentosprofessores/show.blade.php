@extends('departamentosprofessores.module')

@section('body')

    Nome do Professor: {{ $departamentoProfessor->professor->nome }}
    <br>
    Nome do Departamento: {{ $departamentoProfessor->departamento->nome }}

@endsection

@section('footer')
    <a href="{{ route('departamentosprofessores.edit',['departamentoProfessor'=>$departamentoProfessor])  }}"
        class="btn btn-info"> Editar </a>
    
    <form action="{{ route('departamentosprofessores.destroy',['departamentoProfessor'=>$departamentoProfessor])  }}" method="POST">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"> Remover </button>                
    </form>
@endsection            