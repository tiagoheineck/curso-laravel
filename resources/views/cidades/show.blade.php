@extends('cidades.module')

@section('body')

    Nome da Cidade: {{ $cidade->nome }}

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