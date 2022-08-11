@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <div>
        <div class="align-items-center d-flex justify-content-between">
            <h3 class="mb-1">Editar Rol</h3>
            <div class="d-flex align-items-center">
                <a href="{{ route('administrador.roles.index') }}" class="position-relative">
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
            {!! Form::model($role, ['route' => ['administrador.roles.update', $role], 'method' => 'put']) !!}
                @include('administrador.roles.partials.form')
                {!! Form::submit('Actualizar rol',['class' => 'btn bg-navy']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}">
@stop

@section('js')
@stop
