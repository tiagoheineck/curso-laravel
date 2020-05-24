@extends('departamentos.module')

@section('header', 'Departamento')@show

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

@section('footer')
  {{ $departamentos->links() }}
@endsection
