@extends('adminlte::page')

@section('title', 'inicio')

@section('content_header')
    <h3>Editar Incapacidad</h3>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop