@extends('layouts.app')

@section('content')

@include('cursos.menu')
<div class="card">
    <div class="card-header">Cursos</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th> Nome </th>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                <tr>
                    <td> 
                    <a href="{{ route('cursos.show',
                            [
                                'curso'=>$curso
                            ]
                        ) }}">
                        {{$curso->nome}}
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>
    <div class="card-footer">
        {{ $cursos->links() }}<!--gera os botões de paginação-->
    </div>
</div>

@endsection