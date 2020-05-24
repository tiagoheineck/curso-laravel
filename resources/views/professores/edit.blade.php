@extends('professores.module')

@section('header', 'Alteração de Professor')@show

@section('body')
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
          @endforeach
        </ul>
      </div>
    @endif

    <form id="form-professor" action="{{ route('professores.update',['professor'=>$professor]) }}" class="form" method="post">
      @csrf
      @method('put')
      <label for="nome">Nome do Professor</label>
      <input type="text" name="nome" value="{{ $professor->nome }}" id="nome" class="form-control">
      @error('nome')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>

@endsection

@section('footer')
  <button type="submit" form="form-professor" class="btn btn-success"> Salvar </button>
@endsection
