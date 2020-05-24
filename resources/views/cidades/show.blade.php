@extends('cidades.module')

@section('header',$cidade->nome)

@show

@section('body')
    Nome Cidade: {{ $cidade->nome}}

@endsection

@section('footer')
            <a href="{{ route('cidades.edit',['cidade'=>$cidade])  }}"
                class="btn btn-info"> Editar </a>
            
            <form action="{{ route('cidades.destroy',['cidade'=>$cidade])  }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger"> Remover </button>                
            </form>
@endsection            