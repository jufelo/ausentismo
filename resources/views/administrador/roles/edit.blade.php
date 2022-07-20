@extends('adminlte::page')

@section('title', 'inicio')

@section('content_header')
    <h3>Asignar un Rol</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['administrador.roles.update', $role], 'method' => 'put']) !!}
                @include('administrador.roles.partials.form')
                {!! Form::submit('Actualizar rol',['class' => 'btn btn-primary btn-sm']) !!}
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