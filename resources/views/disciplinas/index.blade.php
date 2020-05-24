@extends('disciplinas.module')

@section('header', 'Disciplina')@show

@section('body')
  <table class="table table-striped">
    <thead>
      <th>Nome</th>
    </thead>
    <tbody>
      @foreach($disciplinas as $disciplina)
      <tr>
        <td>
           <a href="{{ url("disciplinas/$disciplina->id") }}">
              {{ $disciplina->nome }}
           </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
  {{ $disciplinas->links() }}
@endsection
