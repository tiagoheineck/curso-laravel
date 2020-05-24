@extends('departamentos.module')

@section('header','Cadastro de Departamento')@show

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
        Form::model($departamento,[
            'route' =>  ['departamento.update',$departamento],
            'id'    =>  'form-departamento',
            'method'=> 'put'
        ])
        .    
        Form::label('nome') .
        Form::text('nome',$departamento->nome,[
            'class'=>'form-control'
        ])
        .
        Form::label('Chefe') 
        .
        Form::select('professor_id',$professores->pluck('nome','id'),null,[
            'class'=>'form-control'
        ])
        .
        Form::close() 
    !!}

@endsection

@section('footer')
    {!! Form::submit('Salvar',['form'=>'form-departamento'])  !!}
@endsection