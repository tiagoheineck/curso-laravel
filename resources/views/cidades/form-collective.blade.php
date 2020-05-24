@extends('cidades.module')

@section('header','Cadastro de Cidades')@show

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
        Form::model($cidade,[
            'route' =>  ['cidades.update',$cidade],
            'id'    =>  'form-cidade',
            'method'=> 'put'
        ])
        .    
        Form::label('nome') .
        Form::text('nome',$cidade->nome,[
            'class'=>'form-control'
        ])
        .
        Form::close() 
    !!}

@endsection

@section('footer')
    {!! Form::submit('Salvar',['form'=>'form-cidade'])  !!}
@endsection