@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <h3>Gestión de usuarios</h3>
    <a href="{{route('administrador.users.create')}}" class="btn btn-primary btn-sm float-right">Crear usuario</a>
@stop

@section('content')
    @include('sweetalert::alert')
    <!--<p>Contenido en construcción</p>-->
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th colspan-"2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{route('administrador.users.edit',$user)}}" class="btn btn-success btn-sm">Editar</td>
                        <td>
                            <form action="{{route('administrador.users.destroy',$user)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>    
                    </tr>
                @endforeach    
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop