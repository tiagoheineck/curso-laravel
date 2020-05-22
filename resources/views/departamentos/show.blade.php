@extends('layouts.app')

@section('content')
@include('departamentos.menu')
<div class="card">
<div class="card-header">Departamento: {{ $departamento->nome }}</div>
    <div class="card-body">
    </div>
    <div class="card-footer">
        <div class="row">
            <a href=" {{ route('departamentos.edit', ['departamento'=>$departamento])}} " class="btn btn-info">Editar</a>

            <form action="{{ route('departamentos.destroy',['departamento'=>$departamento])}}" method="POST">
                @method('delete')
                @csrf <!-- token para autorizar a requisição e evitar ataques -->
                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </div>
    </div>
</div>

@endsection