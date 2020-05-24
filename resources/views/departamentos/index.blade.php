@extends('departamentos.module')

@section('header','Departamentos')@show
@section('footer')
    {{ $departamentos->links() }}
@endsection

@section('body')

<table class="table table-striped">
    <thead>
        <th>Nome</th>
    </thead>
    <tbody>
        @foreach($departamentos as $departamento)
        <tr>
            <td>
                <a href="{{ url("departamentos/$departamento->id") }}">
                    {{ $departamento->nome }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection