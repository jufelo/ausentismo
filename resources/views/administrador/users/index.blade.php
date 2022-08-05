@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
<a href="{{route('administrador.users.create')}}" class="btn btn-primary btn-sm float-right"><i
    class="fa-plus-circle fas "></i><span class="mx-1">Crear usuario</span></a>
<h3>Gestión de usuarios</h3>
    
@stop

@section('content')
    @include('sweetalert::alert')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="users">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol Asignado</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge badge-info">{{ $role->name}}</span>
                                @endforeach
                            </td>
                            <td width="10px"><a href="{{route('administrador.users.edit',$user)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></td>
                            <td width="10px">
                                <form action="{{route('administrador.users.destroy',$user)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>    
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@push('js')
    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                responsive:true,
                autoWidth:false,
                columnDefs: [{ orderable: false, targets: [3,4] }],
                //order: [[1, 'asc']],
                "language":{
                    "lengthMenu":"Mostrar "+
                `<select class="custom-select custom-select-sm form-control form-control-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="-1">Todos</option>
                    </select>`
                    +" Registros por página",
                    "zeroRecords":"Nada encontrado",
                    "info":"Mostrando la página _PAGE_ de _PAGES_",
                    "search":"Buscar:",
                    "paginate":{
                        'next':"siguiente",
                        'previous':"Anterior"
                    }
                }
            });
        });
    </script>
@endpush