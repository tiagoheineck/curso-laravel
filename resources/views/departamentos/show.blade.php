@extends('departamentos.module')

@section('header',$departamento->nome)

@show

@section('body')

    Nome do Chefe: {{ $departamento->professor->nome }}

@endsection

@section('footer')
            <a href="{{ route('departamentos.edit',['departamento'=>$departamento])  }}"
                class="btn btn-info"> Editar </a>
            
            <form action="{{ route('departamentos.destroy',['departamento'=>$departamento])  }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger"> Remover </button>                
            </form>
@endsection            