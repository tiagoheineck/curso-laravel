@extends('professores.module')

@section('header',$professor->nome)

@show

@section('body')
Nome do Professor: {{ $professor->nome }}
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
