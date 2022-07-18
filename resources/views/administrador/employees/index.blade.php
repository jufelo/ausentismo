@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
<h3>Gestión de empleados<a href="{{route('administrador.employees.create')}}" class="btn btn-primary btn-sm float-right">Crear empleado</a>
</h3>
@stop

@section('content')
    @include('sweetalert::alert')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="employees">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>ti</th>
                        <th>Identificación</th>
                        <th>Salario</th>
                        <th>Cargo</th>
                        <th>Area de trabajo</th>
                        <th>Eps</th>
                        <th>Arl</th>
                        <th>Afp</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->ti}}</td>
                            <td>{{$employee->identification}}</td>
                            <td>{{$employee->salary}}</td>
                            <td>{{$employee->position}}</td>
                            <td>{{$employee->work_area}}</td>
                            <td>{{$employee->eps}}</td>
                            <td>{{$employee->arl}}</td>
                            <td>{{$employee->afp}}</td>
                            <td width="10px"><a href="{{route('administrador.employees.edit',$employee)}}" class="btn btn-success btn-sm">Editar</td>
                            <td width="10px">
                                <form action="{{route('administrador.employees.destroy',$employee)}}" method="POST">
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

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@push('js')
    <script>
        $(document).ready(function () {
            $('#employees').DataTable({
                responsive:true,
                autoWidth:false,
                columnDefs: [{ orderable: false, targets: [9,10] }],
                order: [[2, 'asc']],
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