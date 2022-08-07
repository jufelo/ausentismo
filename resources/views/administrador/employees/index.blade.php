@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
<a href="{{route('administrador.employees.create')}}" class="btn btn-primary btn-sm float-right"><i
    class="fa-plus-circle fas "></i><span class="mx-1">Crear empleado</span></a>
<h3>Gestión de empleados</h3>
@stop

@section('content')
    @include('sweetalert::alert')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="employees">
                <thead>
                    <tr class='text-center'>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Tipo de identificación</th>
                        <th>Identificación</th>
                        <th>Salario</th>
                        <th>Cargo</th>
                        <th>Area de trabajo</th>
                        <th>EPS</th>
                        <th>ARL</th>
                        <th>AFP</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->lastname}}</td>
                            <td>{{$employee->ti}}</td>
                            <td>{{$employee->identification}}</td>
                            <td>{{$employee->salario}}</td>
                            <td>{{$employee->position}}</td>
                            <td>{{$employee->work_area}}</td>
                            <td>{{$employee->eps}}</td>
                            <td>{{$employee->arl}}</td>
                            <td>{{$employee->afp}}</td>
                            <td width="10px"><a href="{{route('administrador.employees.edit',$employee)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></td>
                            <td width="10px">
                                <form action="{{route('administrador.employees.destroy',$employee)}}" method="POST">
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
            $('#employees').DataTable({
                responsive:true,
                autoWidth:false,
                //scrollX: true,
                columnDefs: [{ orderable: false, targets: [10,11] }],
                //order: [[2, 'asc']],
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