<!--<h1>Bienvenido a la vista principal</h1>-->

@extends('adminlte::page')

@section('title', 'inicio')

@section('content_header')
    <h3>Editar Usuario</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, ['route' => ['administrador.users.update', $user], 'method' => 'put']) !!}
                @include('administrador.users.partials.form')
                {!! Form::submit('Actualizar usuario',['class' => 'btn btn-primary btn-sm']) !!}
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