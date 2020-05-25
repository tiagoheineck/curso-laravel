@extends('disciplinas.module')

@section('header','Cadastro de Disciplina')@show

@section('body')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 
                

    {!!
        Form::model($disciplina,[
            'route' =>  ['disciplinas.update',$disciplina],
            'id'    =>  'form-disciplina',
            'method'=> 'put'
        ])
        .    
        Form::label('nome')
        .
        Form::text('nome',$disciplina->nome,[
            'class'=>'form-control'
        ])
        .    
        Form::label('Carga Horária') 
        .
        Form::number('carga_horaria',$disciplina->carga_horaria,[
            'class'=>'form-control'
        ])
        .
        Form::label('Professor') 
        .
        Form::select('professor_id',$professores->pluck('nome','id'),null,        
        [
            'class'=>'form-control'
        ])
        .
        Form::close() 
    !!}

@endsection

@section('footer')
    {!! Form::submit('Salvar',['form'=>'form-disciplina','class'=>'btn btn-info'])  !!}
@endsection