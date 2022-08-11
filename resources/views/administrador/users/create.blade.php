@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <div>
        <div class="align-items-center d-flex justify-content-between">
            <h3 class="mb-1">Crear usuario</h3>
            <div class="d-flex align-items-center">
                <a href="{{ route('administrador.users.index') }}" class="position-relative">
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
            {!! Form::open(['route' => 'administrador.users.store']) !!}
            <div class="form-row">
                <div class="form-group col-sm-6 col-md-4 order-1">
                    {!! Form::label('employee', 'Empleado') !!}
                    <select name="employee" id="employee_id" class="form-control {{ $errors->has('employee') ? 'is-invalid' : null  }}">
                        <option value="">Seleccione un empleado...</option>
                        @foreach ($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->name}} {{$employee->lastname}}</option>
                        @endforeach
                    </select>
                    @error('employee')
                        <span class="font-weight-bold invalid-feedback" role="alert">*{{ $message }}</span>
                    @enderror
                </div>

                @include('administrador.users.partials.form')

                <div class="form-group col-sm-5 col-md-4 order-4">
                    {!! Form::label('roles', 'Rol') !!}
                    {!! Form::select('roles', $listaRoles, null, ['class' => 'form-control ' . ($errors->has('roles') ? 'is-invalid' : null), 'placeholder' => 'Seleccione un rol...']) !!}
                    @error('roles')
                    <span class ="font-weight-bold invalid-feedback" role="alert">*{{ $message }}</span>
                    @enderror
                </div>
                <div
                    class="form-group align-items-end col-md-4 d-flex justify-content-center justify-content-md-end mb-0 mb-sm-3 order-5">
                    {!! Form::submit('Crear usuario', ['class' => 'btn bg-navy btn.sm']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}">
@stop

@section('js')

@stop
