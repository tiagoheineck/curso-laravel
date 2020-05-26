@extends('cidades.module')

@section('header','Cidade')@show
@section('footer')
    {{ $cidades->links() }}
@endsection

@section('body')

<table class="table table-striped">
    <thead>
        <th>Nome</th>
    </thead>
    <tbody>
        @foreach($cidades as $cidade)
        <tr>
            <td>
                <a href="{{ url("cidades/$cidade->id") }}">
                    {{ $cidade->nome }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection