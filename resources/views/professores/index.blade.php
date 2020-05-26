@extends('professores.module')

@section('header','Professor')@show
@section('footer')
    {{ $professores->links() }}
@endsection

@section('body')

<table class="table table-striped">
    <thead>
        <th>Nome</th>
    </thead>
    <tbody>
        @foreach($professores as $professor)
        <tr>
            <td>
                <a href="{{ url("professores/$professor->id") }}">
                    {{ $professor->nome }}
                </a>
            </td>
            <td>
                <a href="{{ url("professores/$professor->id") }}">
                    {{ $professor->user->email }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection