@extends('layouts.app')

@section('content')

@include('cidades.menu')
<div class="card">
    <div class="card-header">Cidades</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th> Nome </th>
            </thead>
            <tbody>
                @foreach ($cidades as $cidade)
                <tr>
                    <td> 
                    <a href="{{ route('cidades.show',
                            [
                                'cidade'=>$cidade
                            ]
                        ) }}">
                        {{$cidade->nome}}
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>
    <div class="card-footer">
        {{ $cidades->links() }}<!--gera os botões de paginação-->
    </div>
</div>

@endsection