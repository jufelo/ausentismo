@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
    <div>
        <div class="align-items-center d-flex justify-content-between">
            <h3 class="mb-1">Registro Incapacidad</h3>
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
    @if(request()->query('tipo') == 'real')
        @livewire('administrador.incapacity-create', ['employees' => $employees, 'listaIncapacidades' => $listaIncapacidades, 'cie_10s' => $cie_10s])
    @else
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'administrador.incapacities.store']) !!}
                    @include('administrador.incapacities.partials.form')
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {!! Form::submit('Crear Incapacidad',['class' => 'btn bg-navy my-1']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}">
@stop

@section('js')
@stop
