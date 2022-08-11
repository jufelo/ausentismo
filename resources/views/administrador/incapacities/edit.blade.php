@extends('adminlte::page')

@section('title', 'inicio')

@section('content_header')
    <div>
        <div class="align-items-center d-flex justify-content-between">
            <h3 class="mb-1">Editar Incapacidad</h3>
            <div class="d-flex align-items-center">
                <a href="{{ route('administrador.incapacities.index') }}" class="position-relative">
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
    <div class="card">
        <div class="card-body">
            {!! Form::model($incapacity, ['route' => ['administrador.incapacities.update', $incapacity], 'method' => 'put']) !!}
                @include('administrador.incapacities.partials.form')
                {!! Form::submit('Actualizar incapacidad',['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}">
@stop

@section('js')
@stop
