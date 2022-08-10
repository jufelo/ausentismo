:::qi:qw
ii::i:aa::q:::q::::::::::::.:::::eeeeeeeee















:qw
@extends('adminlte::page')

@section('title', 'inicio')

@section('content_header')
    <div>
        <div class="align-items-center d-flex justify-content-between">
            <h3 class="mb-1">Editar usuario</h3>
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
            {!! Form::model($user, ['route' => ['administrador.users.update', $user], 'method' => 'put']) !!}
            <div class="form-row">
                <div class="form-group col-sm-6 col-md-4 order-1">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control', 'readonly']) !!}
                    {{--<p class="form-control ">{{ $user->name }}</p>--}}
                </div>

                @include('administrador.users.partials.form')

                <div class="col-12 order-4 order-md-4 order-sm-5">
                    <p class="h5">Listado de roles</p>
                    @foreach ($listaRoles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('listaRoles[]', $role->id, null, ['class' => 'mr-1', (in_array($role->name, $userRoles, true) ? 'checked' : null)]) !!}
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group col-12 col-md-12 col-sm-5 d-flex align-items-end justify-content-center justify-content-sm-end justify-content-md-start order-5 order-md-5 order-sm-4">
                    <div>
                        {!! Form::submit('Actualizar usuario',['class' => 'btn bg-navy']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/users.css') }}">
@stop
:a:q:a:aaaaaa:q:
:a:q:qq:
@section('js')dd::..q:a:
@stop
