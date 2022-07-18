<!--<h1>Bienvenido a la vista principal</h1>-->

@extends('adminlte::page')

@section('title', 'inicio')

@section('content_header')
    <h3>Editar Empleado</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($employee, ['route' => ['administrador.employees.update', $employee], 'method' => 'put']) !!}
                @include('administrador.employees.partials.form')
                {!! Form::submit('Actualizar empleado',['class' => 'btn btn-primary btn-sm']) !!}
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