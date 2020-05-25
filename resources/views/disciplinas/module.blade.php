@extends('layouts.app')


@section('content')

@include('disciplinas.menu')

<div class="container">
    <div class="card">
        <div class="card-header"> @yield('header') </div>
        <div class="card-body">            
            @yield('body')
        </div>
        <div class="card-footer">
            @yield('footer')
        </div>
    </div>
</div>  
@endsection

@push('javascript')

<script> 
    console.log("olá, a partir do módulo")
</script>
@endpush

@section('js-teste')
    <script>console.log('outro teste')</script>
@endsection