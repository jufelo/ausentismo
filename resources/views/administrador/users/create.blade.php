@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <h3>Crear usuario</h3>
@stop

@section('content')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'administrador.users.store']) !!}
            <div class="form-row">
                <div class="form-group col-md-6">
                    {!! Form::label('employee', 'Empleado') !!}
                    <select name="employee" id="employee_id" class="form-control">
                        <option value="">Seleccione un empleado...</option>
                        @foreach ($employees as $employee)
                            <option value="{{$employee->id}} ">{{$employee->name}} {{$employee->lastname}}</option>
                        @endforeach
                    </select>
                </div>
                @include('administrador.users.partials.form')
                <div class="form-group col-sm-8 col-md-4">
                    {!! Form::label('roles', 'Rol') !!}
                    {!! Form::select('roles', $listaRoles, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un rol...']) !!}
                </div>
                <div class="form-group align-items-end col-sm-4 d-flex justify-content-center justify-content-sm-end mb-0 mb-sm-3">
                    {!! Form::submit('Crear usuario',['class' => 'btn bg-navy btn.sm']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
