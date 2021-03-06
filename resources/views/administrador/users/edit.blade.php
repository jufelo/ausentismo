@extends('adminlte::page')

@section('title', 'inicio')

@section('content_header')
    <h3>Editar Usuario</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                <p class="form-control ">{{$user->name}}</p>

                {!! Form::model($user, ['route' => ['administrador.users.update', $user], 'method' => 'put']) !!}
                @include('administrador.users.partials.form')
            
                <p class="h5">Listado de roles</p>

                @foreach ($listaRoles as $listaRole)
                    <div>
                        <label>
                            {!! Form::checkbox('listaRoles[]', $listaRole->id, null, ['class' => 'mr-1']) !!}
                            {{$listaRole->name}}
                        </label>
                    </div>
                
                @endforeach

                {!! Form::submit('Actualizar usuario',['class' => 'btn btn-primary btn-sm']) !!}
                   
            
                {!! Form::close() !!}
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