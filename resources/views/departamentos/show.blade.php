@extends('departamentos.module')

@section('header', $departamento->nome)@show

@section('body')
  Nome do Departamento: {{ $departamento->nome }}
</br>
  Chefe do Departamento: {{ $professorNome}}
@endsection

@section('footer')

    <div class="footer">
      <a href="{{ route('departamentos.edit', ['departamento'=>$departamento]) }}"
        class="btn btn-info"> Editar </a>

      <form action="{{ route('departamentos.destroy', ['departamento'=>$departamento]) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"> Remover </button>
      </form>
    </div>
  </div>
@endsection
