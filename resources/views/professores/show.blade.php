@extends('professores.module')

@section('header', $professor->nome )@show

@section('body')
  Nome do Professor: {{ $professor->nome }}
@endsection


@section('footer')
<div class="footer">
  <div class="container">
    <div>
      <a href="{{ route('professores.edit', ['professor'=>$professor]) }}"
        class="btn btn-info"> Editar </a>
    </div>
    <div>
      <form action="{{ route('professores.destroy', ['professor'=>$professor]) }}" method="post">
        @method('delete')
        @csrf
      <button type="submit" class="btn btn-danger"> Remover </button>
      </form>
    </div>
  </div>
</div>
@endsection
