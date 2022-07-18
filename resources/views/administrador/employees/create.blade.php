@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
    <h3>Crear empleado</h3>
@stop

@section('content')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'administrador.employees.store']) !!}
                @include('administrador.employees.partials.form')
                {!! Form::submit('Crear empleado',['class' => 'btn btn-primary btn.sm']) !!}
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