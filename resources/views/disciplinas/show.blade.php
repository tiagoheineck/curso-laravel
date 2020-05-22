@extends('layouts.app')

@section('content')
@include('disciplinas.menu')
<div class="card">
<div class="card-header">Disciplina: {{ $disciplina->nome }}</div>
    <div class="card-body">
       Professor: {{$disciplina->professor->nome}} <br>
       CH: {{$disciplina->carga_horaria}} <br>
    </div>
    <div class="card-footer">
        <div class="row">
            <a href=" {{ route('disciplinas.edit', ['disciplina'=>$disciplina])}} " class="btn btn-info">Editar</a>

            <form action="{{ route('disciplinas.destroy',['disciplina'=>$disciplina])}}" method="POST">
                @method('delete')
                @csrf <!-- token para autorizar a requisição e evitar ataques -->
                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </div>
    </div>
</div>

@endsection