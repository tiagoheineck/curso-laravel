@extends('conteudos.module')

@section('header','Conteudo')@show
@section('footer')
    {{ $conteudos->links() }}
@endsection

@section('body')

<table class="table table-striped">
    <thead>
        <th>Nome</th>
    </thead>
    <tbody>
        @foreach($conteudos as $conteudo)
        <tr>
            <td>
                <a href="{{ url("conteudos/$conteudo->id") }}">
                    {{ $conteudo->titulo }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection