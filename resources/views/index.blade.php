<!--<h1>Bienvenido a la vista principal</h1>-->

@extends('adminlte::page')

@section('title', 'inicio')

@section('content_header')
    <h1 class=text-center>Módulo Ausentismo SG-SST</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 px-5 px-sm-0">
                <div class="col mb-4 mb-md-0">
                    <div class="card h-100 bg-primary position-relative">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold text-center w-100">Empleados</h5>
                        </div>
                        <div class="card-body p-2">
                            <p class="fa-4x font-weight-light m-0 text-center">{{ $users }}</p>
                        </div>
                        <i class="fas fa-info-circle position-absolute m-1 class_title"></i>
                    </div>
                </div>
                <div class="col mb-4 mb-md-0">
                    <div class="card h-100 bg-success position-relative">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold text-center w-100">Ausentismo</h5>
                        </div>
                        <div class="card-body p-2">
                            <p class="fa-4x font-weight-light m-0 text-center">{{ $incapacities }}</p>
                        </div>
                        <i class="fas fa-info-circle position-absolute m-1 class_title"></i>
                        <select class="border-0 form-control form-control-sm h-auto m-1 p-0 position-absolute text-success w-auto card-select-dashboard">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="all">Total</option>
                        </select>
                    </div>
                </div>
                <div class="col mb-4 mb-sm-0">
                    <div class="card h-100 bg-warning position-relative">
                        <div class="card-header text-white">
                            <h5 class="card-title font-weight-bold text-center w-100">Dx común</h5>
                        </div>
                        <div class="card-body p-2 text-white">
                            <p class="fa-4x font-weight-light m-0 text-center">U072</p>
                        </div>
                        <i class="fas fa-info-circle position-absolute m-1 text-white class_title" data-title="COVID-19 (VIRUS NO IDENTIFICADOS)"></i>
                        <select class="border-0 form-control form-control-sm h-auto m-1 p-0 position-absolute text-warning w-auto card-select-dashboard">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="all">Total</option>
                        </select>
                    </div>
                </div>
                <div class="col mb-md-0">
                    <div class="card h-100 bg-danger position-relative">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold text-center w-100">Pagado($)</h5>
                        </div>
                        <div class="card-body p-2">
                            <p class="fa-4x font-weight-light m-0 text-center">90 M</p>
                        </div>
                        <i class="fas fa-info-circle position-absolute m-1 class_title" data-title="K - Miles / M - Millones"></i>
                        <select class="border-0 form-control form-control-sm h-auto m-1 p-0 position-absolute text-danger w-auto card-select-dashboard">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="all">Total</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body"></div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/home.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
