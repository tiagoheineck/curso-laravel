@extends('cursos.module')

@section('header','Cadastro de Cursos')@show

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
        Form::model($curso,[
            'route' =>  ['cursos.update',$curso],
            'id'    =>  'form-curso',
            'method'=> 'put'
        ])
        .    
        Form::label('nome') .
        Form::text('nome',$curso->nome,[
            'class'=>'form-control'
        ])
        .    
        Form::label('Cidade') 
        .
        Form::select('cidade_id',$cidades->pluck('nome','id'),null,[
            'class'=>'form-control'
        ])
        .
        Form::close() 
    !!}

@endsection

@section('footer')
    {!! Form::submit('Salvar',['form'=>'form-curso'])  !!}
@endsection