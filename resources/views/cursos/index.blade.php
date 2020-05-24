@extends('cursos.module')

@section('header','Curso')@show
@section('footer')
    {{ $cursos->links() }}
@endsection

@section('body')

<table class="table table-striped">
    <thead>
        <th>Nome</th>
    </thead>
    <tbody>
        @foreach($cursos as $curso)
        <tr>
            <td>
                <a href="{{ url("cursos/$curso->id") }}">
                    {{ $curso->nome }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection