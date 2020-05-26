@extends('departamentosprofessores.module')

@section('header','Departamento Professor')@show
@section('footer')
    {{ $departamentosProfessores->links() }}
@endsection

@section('body')

<table class="table table-striped">
    <thead>
        <th>Departamento</th>
        <th>Professor</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($departamentosProfessores as $departamentoProfessor)
        <tr>
            <td>
                {{ $departamentoProfessor->departamento->nome }}
            </td>
            <td>
                {{ $departamentoProfessor->professor->nome }}
            </td>
            <td>
                <a href="{{ url("departamentosprofessores/$departamentoProfessor->id") }}">
                    Ver    
                </a>
            </td>
            

        </tr>
        @endforeach
    </tbody>
</table>

@endsection