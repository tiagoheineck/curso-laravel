@extends('layouts.app')

@section('content')

@include('professores.menu')
<div class="card">
    <div class="card-header">Professores</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th> Nome </th>
            </thead>
            <tbody>
                @foreach ($professores as $professor)
                <tr>
                    <td> 
                    <a href="{{ route('professores.show',
                            [
                                'professor'=>$professor
                            ]
                        ) }}">
                        {{$professor->nome}}
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>
    <div class="card-footer">
        {{ $professores->links() }}<!--gera os botões de paginação-->
    </div>
</div>

@endsection