@extends('adminlte::page')

@section('title', 'Incapacidad')

@section('content_header')
<a href="{{route('administrador.incapacities.create')}}" class="btn btn-primary btn-sm float-right">Crear incapacidad</a>
<h3>Gestión de incapacidades</h3>
@stop

@section('content')
    @include('sweetalert::alert')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="incapacities">
                <thead>
                    <tr class='text-center'>
                        <th>Empleado</th>
                        <th>Tipo de incapacidad</th>
                        <th>Fecha inicio Incapacidad</th>
                        <th>Fecha finalización Incapacidad</th>
                        <th>Clasificación</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incapacities as $incapacity)
                        <tr>
                            @foreach($employees as $employee)
                            @if($incapacity->employee_id == $employee->id)
                            <td>{{$employee->full_name}}</td>
                            @endif
                            @endforeach
                            @foreach($incapacity_types as $incapacity_type)
                            @if($incapacity->incapacity_type_id == $incapacity_type->id)
                            <td>{{$incapacity_type->name}}</td>
                            @endif
                            @endforeach
                            <td>{{$incapacity->start_date}}</td>
                            <td>{{$incapacity->end_date}}</td>
                            <td>{{$incapacity->clasification}}</td>
                            </td>
                            <td width="10px"><a href="{{route('administrador.incapacities.edit',$incapacity)}}" class="btn btn-success btn-sm">Editar</td>
                            <td width="10px">
                                <form action="{{route('administrador.incapacities.destroy',$incapacity)}}" method="POST">
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
            $('#incapacities').DataTable({
                responsive:true,
                autoWidth:false,
                columnDefs: [{ orderable: false, targets: [5,6] }],
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