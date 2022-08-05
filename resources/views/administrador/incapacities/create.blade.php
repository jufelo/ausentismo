@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
    <h3>Registro Incapacidad</h3>
@stop

@section('content')
    @if(request()->query('tipo') == 'real')
        @livewire('administrador.incapacity-create', ['employees' => $employees, 'listaIncapacidades' => $listaIncapacidades])
    @else
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'administrador.incapacities.store']) !!}
                    @include('administrador.incapacities.partials.form')
                {!! Form::submit('Crear Incapacidad',['class' => 'btn btn-primary btn.sm']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop