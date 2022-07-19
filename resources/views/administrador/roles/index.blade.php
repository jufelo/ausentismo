@extends('adminlte::page')

@section('title', 'Rol')

@section('content_header')
<a href="{{route('administrador.roles.create')}}" class="btn btn-primary btn-sm float-right">Crear rol</a>
<h1>Gestion de roles</h1>
@stop

@section('content')
@include('sweetalert::alert')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="roles">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px"><a href="{{route('administrador.roles.edit',$role)}}" class="btn btn-success btn-sm">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('administrador.roles.destroy',$role)}}" method="POST">
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@push('js')
<script>
    $(document).ready(function () {
        $('#roles').DataTable({
            responsive:true,
            autoWidth:false,
            columnDefs: [{ orderable: false, targets: [2,3] }],
            "language":{
                "lengthMenu":"Mostrar "+
            `<select class="custom-select custom-select-sm form-control form-control-sm">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="-1">Todos</option>
                </select>`
                +" registros por página",
                "zeroRecords":"Nada encontrado",
                "info":"Mostrando la página _PAGE_ de _PAGES_",
                "search":"Buscar:",
                "paginate":{
                    'next':'Siguiente',
                    'previous':'Anterior'
                }
            }
        });
    });
</script>
@endpush


