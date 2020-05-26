@extends('layouts.app')

@section('content')
@include('conteudos.menu')
<div class="card">
<div class="card-header">Título: <b>{{ $conteudo->titulo }}</b></div>
    <div class="card-body">
       Disciplina: {{$conteudo->disciplina->nome}} <br>
       <br>
       Conteúdo: {{$conteudo->conteudo}} <br>
    </div>
    <div class="card-footer">
        <div class="row">
            {{--  
            
            <a href=" {{ route('conteudos.edit', ['conteudo'=>$conteudo])}} " class="btn btn-info">Editar</a>

            <form action="{{ route('conteudos.destroy',['conteudo'=>$conteudo])}}" method="POST">
                @method('delete')
                @csrf <!-- token para autorizar a requisição e evitar ataques -->
                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
            --}}
        </div>
    </div>
</div>

@endsection