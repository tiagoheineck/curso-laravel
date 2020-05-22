@extends('layouts.app')

@section('content')

@include('departamentos.menu')
<div class="card">
    <div class="card-header">Departamentos</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th> Nome </th>
            </thead>
            <tbody>
                @foreach ($departamentos as $departamento)
                <tr>
                    <td> 
                    <a href="{{ route('departamentos.show',
                            [
                                'departamento'=>$departamento
                            ]
                        ) }}">
                        {{$departamento->nome}}
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>
    <div class="card-footer">
        {{ $departamentos->links() }}<!--gera os botões de paginação-->
    </div>
</div>

@endsection