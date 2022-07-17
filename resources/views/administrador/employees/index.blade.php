@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
<h3>Gestión de empleados<a href="{{route('administrador.employees.create')}}" class="btn btn-primary btn-sm float-right">Crear empleado</a>
</h3>
@stop

@section('content')
    <p>en construcción</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop