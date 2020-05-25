@extends('disciplinas.module')

@section('header',$disciplina->nome)@show

@section('body')

    Nome do Professor: {{ $disciplina->professor->nome }}
    <br>
    Carga Horária: {{ $disciplina->carga_horaria}}

    <br>
    Criado em {{ $disciplina->created_at->format('d/m/Y')  }}

@endsection

@section('footer')
            <a href="{{ route('disciplinas.edit',['disciplina'=>$disciplina])  }}"
                
                class="btn btn-info"> Editar </a>
            
            <form action="{{ route('disciplinas.destroy',['disciplina'=>$disciplina])  }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger"> Remover </button>                
            </form>
@endsection            

@push('javascript')
            <script>
                console.log('Teste')
            </script>
@endpush