@extends('layouts.app')

@section('content')

@include('disciplinas.menu')
<div class="card">
    <div class="card-header">Disciplinas</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th> Nome </th>
            </thead>
            <tbody>
                @foreach ($disciplinas as $disciplina)
                <tr>
                    <td> 
                    <a href="{{ route('disciplinas.show',
                            [
                                'disciplina'=>$disciplina
                            ]
                        ) }}">
                        {{$disciplina->nome}}
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>
    <div class="card-footer">
        {{ $disciplinas->links() }}<!--gera os botões de paginação-->
    </div>
</div>

@endsection