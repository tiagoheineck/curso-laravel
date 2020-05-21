@extends('layouts.app')


@section('content')

@include('disciplinas.menu')

<div class="container">
    <div class="card">
        <div class="card-header"> @yield('header') </div>
        <div class="card-body">            
            @yield('body')
        </div>
        <div class="footer">
            @yield('footer')
        </div>
    </div>
</div>  
@endsection
