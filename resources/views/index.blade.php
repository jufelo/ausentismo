<!--<h1>Bienvenido a la vista principal</h1>-->

@extends('adminlte::page')

@section('title', 'inicio')

@section('content_header')
    <h1 class=text-center>Módulo Ausentismo SG-SST</h1>
@stop

@section('content')
    <p class=text-center>(Sistema de gestión de seguridad y salud en el trabajo)</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop