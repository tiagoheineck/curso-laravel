@extends('layouts.app')

@section('content')
@include('cidades.menu')
<div class="card">
<div class="card-header">Cidade: {{ $cidade->nome }}</div>
    <div class="card-body">
    </div>
    <div class="card-footer">
        <div class="row">
            <a href=" {{ route('cidades.edit', ['cidade'=>$cidade])}} " class="btn btn-info">Editar</a>

            <form action="{{ route('cidades.destroy',['cidade'=>$cidade])}}" method="POST">
                @method('delete')
                @csrf <!-- token para autorizar a requisição e evitar ataques -->
                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </div>
    </div>
</div>

@endsection