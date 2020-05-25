@extends('conteudos.module')

@section('header','Cadastro de Conteudo')@show

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
        Form::model($conteudo,[
            'route' =>  ['conteudos.update',$conteudo],
            'id'    =>  'form-conteudo',
            'method'=> 'put'
        ])
        .    
        Form::label('Titulo') .
        Form::text('titulo',$conteudo->titulo,[
            'class'=>'form-control'
        ])
        .    
        Form::label('Conteudo') 
        .
        Form::text('conteudo',$disciplina->conteudo,[
            'class'=>'form-control'
        ])
        .
        Form::label('Disciplina') 
        .
        Form::select('disciplina_id',$disciplina->pluck('nome','id'),null,[
            'class'=>'form-control'
        ])
        .
        Form::close() 
    !!}

@endsection

@section('footer')
    {!! Form::submit('Salvar',['form'=>'form-conteudo'])  !!}
@endsection