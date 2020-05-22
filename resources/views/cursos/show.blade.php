@extends('layouts.app')

@section('content')
@include('cursos.menu')
<div class="card">
<div class="card-header">Curso: {{ $curso->nome }}</div>
    <div class="card-body">
       Departamento: {{$curso->departamento->nome}} <br>
       Cidade: {{$curso->cidade->nome}} <br>
    </div>
    <div class="card-footer">
        <div class="row">
            <a href=" {{ route('cursos.edit', ['curso'=>$curso])}} " class="btn btn-info">Editar</a>

            <form action="{{ route('cursos.destroy',['curso'=>$curso])}}" method="POST">
                @method('delete')
                @csrf <!-- token para autorizar a requisição e evitar ataques -->
                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </div>
    </div>
</div>

@endsection