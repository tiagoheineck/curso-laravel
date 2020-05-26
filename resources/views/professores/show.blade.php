@extends('professores.module')

@section('body')

    Nome do Professor: {{ $professor->nome }}
    <br>
    E-mail do Professor: {{ $professor->user->email }}

@endsection

@section('footer')
    <a href="{{ route('professores.edit',['professor'=>$professor])  }}"
        class="btn btn-info"> Editar </a>
    
    <form action="{{ route('professores.destroy',['professor'=>$professor])  }}" method="POST">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"> Remover </button>                
    </form>
@endsection            