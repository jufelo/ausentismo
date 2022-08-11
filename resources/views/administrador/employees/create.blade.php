@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
    <div>
        <div class="align-items-center d-flex justify-content-between">
            <h3 class="mb-1">Crear empleado</h3>
            <div class="d-flex align-items-center">
                <a href="{{ route('administrador.employees.index') }}" class="position-relative">
                    <i class="fas fa-arrow-alt-circle-left fa-lg mr-2 text-warning class_title" data-title="Atrás"></i>
                </a>
                <a href="{{ route('home') }}" class="position-relative">
                    <i class="fas fa-home fa-lg text-navy class_title" data-title="Ir al Inicio"></i>
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'administrador.employees.store']) !!}
                @include('administrador.employees.partials.form')
                <div class="form-group col-12 my-3">
                    <div class="d-flex justify-content-center">
                        {!! Form::submit('Crear empleado', ['class' => 'btn bg-navy']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
