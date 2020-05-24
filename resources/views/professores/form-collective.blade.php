@extends('professores.module')

@section('header','Cadastro de Professor')@show

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
        Form::model($professor,[
            'route' =>  ['professores.update',$professor],
            'id'    =>  'form-professor',
            'method'=> 'put'
        ])
        .
        Form::label('nome') .
        Form::text('nome',$professor->nome,[
            'class'=>'form-control'
        ])
        .
        Form::close() 
    !!}

@endsection

@section('footer')
    {!! Form::submit('Salvar',['form'=>'form-professor'])  !!}
@endsection