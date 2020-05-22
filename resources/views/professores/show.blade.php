@extends('layouts.app')

@section('content')
@include('professores.menu')
<div class="card">
    
<div class="card-header">Professor: {{ $professor->nome }}</div>
    <div class="card-body">
    </div>
    <div class="card-footer">
        <div class="row">
            
            <a href=" {{ route('professores.edit', ['professor'=>$professor])}} " class="btn btn-info">Editar</a>

            <form action="{{ route('professores.destroy',['professor'=>$professor])}}" method="POST">
                @method('delete')
                @csrf <!-- token para autorizar a requisição e evitar ataques -->
                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </div>
    </div>
</div>

@endsection