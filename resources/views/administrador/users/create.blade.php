@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <h3>Crear usuario</h3>
@stop

@section('content')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'administrador.users.store']) !!}
                @include('administrador.users.partials.form')
                {!! Form::submit('Crear usuario',['class' => 'btn btn-primary btn.sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop