@extends('adminlte::page')

@section('title', 'Incapacidad')

@section('content_header')
<a href="{{route('administrador.incapacities.create',['tipo'=> 'real'])}}" class="btn btn-primary btn-sm float-right" style="margin-left: 20px"><i
    class="fa-plus-circle fas "></i><span class="mx-1">Crear registro en tiempo real</span></a>
<a href="{{route('administrador.incapacities.create',['tipo'=> 'noreal'])}}" class="btn btn-primary btn-sm float-right"><i
    class="fa-plus-circle fas "></i><span class="mx-1">Crear registro</span></a>
<h3>Gestión de ausentismos</h3>
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
                        <th>Tipo de documento</th>
                        <th>Número de documento</th>
                        <th>Tipo de incapacidad</th>
                        <th>Código CIE10</th>
                        <th>Cargo</th>
                        <th>Eps</th>
                        <th>Salario</th>
                        <th>Salario por día</th>
                        <th>Fecha inicio Incapacidad</th>
                        <th>Fecha finalización Incapacidad</th>
                        <th>Total de días</th>
                        <th>Clasificación</th>
                        <th>Valor asumido empresa</th>
                        <th>Valor asumido EPS</th>
                        <th>Valor asumido ARL</th>
                        <th>Valor asumido AFP</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incapacities as $incapacity)
                        <tr>
                            <td>{{$incapacity->employee->full_name}}</td>
                            <td>{{$incapacity->employee->ti}}</td>
                            <td>{{$incapacity->employee->identification}}</td>
                            <td>{{$incapacity->incapacity_type->name}}</td>
                            <td>{{$incapacity->cie_10->code}}</td>
                            <td>{{$incapacity->employee->position}}</td>
                            <td>{{$incapacity->employee->eps}}</td>
                            <td>{{$incapacity->employee->salario}}</td>
                            <td>{{$incapacity->employee->salario_por_dia}}</td>
                            <td>{{$incapacity->start_date}}</td>
                            <td>{{$incapacity->end_date}}</td>
                            <td>{{$incapacity->total_dias}}</td>
                            <td>{{$incapacity->clasification}}</td>
                            <td>{{$incapacity->pago_empleador}}</td>
                            <td>{{$incapacity->pago_eps}}</td>
                            <td>{{$incapacity->pago_arl}}</td>
                            <td>{{$incapacity->pago_afp}}</td>

                            <td width="10px"><a href="{{route('administrador.incapacities.edit',$incapacity)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></td>
                            <td width="10px">
                                <form action="{{route('administrador.incapacities.destroy',$incapacity)}}" method="POST">
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
            $('#incapacities').DataTable({
                responsive:true,
                autoWidth:false,
                scrollx: true,
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