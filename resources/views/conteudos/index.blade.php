@extends('layouts.app')

@section('content')

@include('conteudos.menu')
<div class="card">
    <div class="card-header">Conteúdos</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th> Título </th>
            </thead>
            <tbody>
                @foreach ($conteudos as $conteudo)
                <tr>
                    <td> 
                    <a href="{{ route('conteudos.show',
                            [
                                'conteudo'=>$conteudo
                            ]
                        ) }}">
                        {{$conteudo->titulo}}
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>
    <div class="card-footer">
        {{ $conteudos->links() }}<!--gera os botões de paginação-->
    </div>
</div>

@endsection