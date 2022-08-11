@extends('adminlte::page')

@section('title', 'Incapacidad')

@section('content_header')
<div class="align-items-center d-flex justify-content-between">
    <h3>Gestión de ausentismo</h3>
    <div class="d-flex">
        <a href="{{ route('administrador.incapacities.create',['tipo'=> 'noreal']) }}" class="btn bg-navy btn-sm mx-1">
            <i class="fa-plus-circle fas "></i><span class="mx-1">Crear registro</span>
        </a>
        <a href="{{ route('administrador.incapacities.create',['tipo'=> 'real']) }}" class="btn bg-navy btn-sm">
            <i class="fa-plus-circle fas "></i><span class="mx-1">Crear registro en tiempo real</span>
        </a>
    </div>
</div>
@stop

@section('content')
    @include('sweetalert::alert')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm table-striped" id="incapacities">
                <thead class="bg-navy text-center">
                    <tr class='text-center'>
                        <th>Empleado</th>
                        <th>Tipo documento</th>
                        <th>Documento</th>
                        <th>Cargo</th>
                        <th>Eps</th>
                        <th>Salario</th>
                        <th>Salario día</th>
                        <th>Tipo incapacidad</th>
                        <th>Dx</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Días</th>
                        <th>Clasificación</th>
                        <th>Pago empresa</th>
                        <th>Pago EPS</th>
                        <th>Pago ARL</th>
                        <th>Pago AFP</th>
                        <th class="actions-th">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incapacities as $incapacity)
                        <tr>
                            <td>{{$incapacity->employee->full_name}}</td>
                            <td>{{$incapacity->employee->ti}}</td>
                            <td>{{$incapacity->employee->identification}}</td>
                            <td>{{$incapacity->employee->position}}</td>
                            <td>{{$incapacity->employee->eps}}</td>
                            <td>{{$incapacity->employee->salario}}</td>
                            <td>{{$incapacity->employee->salario_por_dia}}</td>
                            <td>{{$incapacity->incapacity_type->name}}</td>
                            <td>{{$incapacity->cie_10->code}}</td>
                            <td>{{$incapacity->start_date}}</td>
                            <td>{{$incapacity->end_date}}</td>
                            <td>{{$incapacity->total_dias}}</td>
                            <td>{{$incapacity->clasification}}</td>
                            <td>{{$incapacity->pago_empleador}}</td>
                            <td>{{$incapacity->pago_eps}}</td>
                            <td>{{$incapacity->pago_arl}}</td>
                            <td>{{$incapacity->pago_afp}}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('administrador.incapacities.edit', $incapacity) }}"
                                       class="btn btn-success btn-sm position-relative">
                                        <i class="fas fa-edit class_title" data-title="Editar"></i>
                                    </a>
                                    <form action="{{ route('administrador.incapacities.destroy', $incapacity) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm position-relative" type="submit">
                                            <i class="fas fa-trash-alt class_title" data-title="Eliminar"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}">
@stop

@section('js')
@stop

@push('js')
    <script>
        $(document).ready(function () {
            let printCounter = 0;
            $('#incapacities').DataTable({
                'dom': 'B<"float-left"l><"float-right"f>rt<"float-left"i><"d-flex justify-content-end"p><"clearfix">',
                'responsive': true,
                'autoWidth': false,
                'order': [[0, 'asc']],
                'rowId': function (data) {
                    return 'tr_' + data.id;
                },
                'buttons': [
                    {
                        'extend': 'collection',
                        'text': 'Exportar',
                        'autoClose': true,
                        'className': 'bg-navy font-weight-lighter p-1 rounded',
                        'buttons': [
                            {
                                'extend': 'excelHtml5',
                                'title': 'Ausentismo',
                                'text': '<i class="fas fa-lg fa-file-excel"></i>',
                                'autoFilter': true,
                                'sheetName': 'Ausentismo',
                                'titleAttr': 'Exportar a Excel',
                                'className': 'bg-success rounded w-auto',
                                'exportOptions': {
                                    'columns': function(column, data, node) {
                                        return column < 17;
                                    }
                                }
                            },
                            {
                                'extend': 'pdfHtml5',
                                'title': 'Ausentismo',
                                'text': '<i class="fas fa-lg fa-file-pdf"></i>',
                                'titleAttr': 'Exportar a PDF',
                                'orientation': 'landscape',
                                'pageSize': 'LEGAL',
                                'className': 'bg-danger rounded w-auto',
                                'exportOptions': {
                                    'columns': function(column, data, node) {
                                        return column < 17;
                                    }
                                },
                                'download': 'open',
                            },
                            {
                                'extend': 'copyHtml5',
                                'title': 'Ausentismo',
                                'text': '<i class="fas fa-lg fa-copy"></i>',
                                'titleAttr': 'Copiar',
                                'className': 'bg-primary rounded w-auto',
                                'exportOptions': {
                                    'columns': function(column, data, node) {
                                        return column < 17;
                                    }
                                }
                            },
                            {
                                'extend': 'print',
                                'title': 'Ausentismo',
                                'text': '<i class="fas fa-lg fa-print"></i>',
                                'titleAttr': 'Imprimir',
                                'className': 'bg-secondary rounded w-auto',
                                'exportOptions': {
                                    'columns': function(column, data, node) {
                                        return column < 17;
                                    }
                                },
                                'customize': function (win) {
                                    $(win.document.body)
                                        .css('font-size', '10pt')
                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                },
                                'messageTop': function () {
                                    printCounter++;
                                    if (printCounter === 1) {
                                        return 'Primera impresión.';
                                    } else {
                                        return 'Has impreso este documento ' + printCounter + ' veces';
                                    }
                                },
                                'messageBottom': null
                            },
                            {
                                'extend': 'csvHtml5',
                                'title': 'Ausentismo',
                                'text': '<i class="fas fa-lg fa-file-csv"></i>',
                                'titleAttr': 'Exportar a CSV',
                                'className': 'bg-success rounded w-auto',
                                'bom': true,
                                // 'fieldBoundary':"'",
                                // 'header': false,
                                'exportOptions': {
                                    'columns': function(column, data, node) {
                                        return column < 17;
                                    }
                                },
                            },
                        ],
                    },
                    {
                        'extend': 'colvis',
                        'text': '<i class="fas fa-eye"></i>',
                        'titleAttr': 'Mostrar / ocultar columnas',
                        'className': 'bg-navy font-weight-lighter p-1 rounded',
                        'collectionTitle': 'Ver/Ocultar',
                        'postfixButtons': ['colvisRestore'],
                        // Mostrar el número de columna
                        /*'columnText': function ( dt, idx, title ) {
                            return (idx+1)+': '+title;
                        }*/
                    },
                ],
                'columnDefs': [
                    {
                        'sortable': false,
                        'targets': [17]
                    },
                ],
                'displayLength': 10,
                'lengthMenu': [
                    [5, 10, 15, 30, 50, 100, 200, 500, 1000, -1],
                    [5, 10, 15, 30, 50, 100, 200, 500, 1000, "Todo"]
                ],
                'language': {
                    'sProcessing': "Procesando...",
                    'sLengthMenu': "  _MENU_ registros",
                    'sZeroRecords': "No se encontraron resultados",
                    'sEmptyTable': "Ningún dato disponible en esta tabla",
                    'sInfo': "Mostrando del _START_ al _END_ de _TOTAL_ registros",
                    'sInfoEmpty': "No hay registros para mostrar",
                    'sInfoFiltered': "(filtrado de un total de _MAX_ registros)",
                    'sInfoPostFix': "",
                    'sSearch': "Buscar:",
                    'sInfoThousands': ".",
                    'sLoadingRecords': "Cargando...",
                    'oPaginate': {
                        'sFirst': "Primero",
                        'sLast': "Último",
                        'sNext': "<i class='fas fa-chevron-right fw-bold text-navy'></i>",
                        'sPrevious': "<i class='fas fa-chevron-left fw-bold text-navy'></i>",
                    },
                    'oAria': {
                        'sSortAscending': ": Activar para ordenar la columna de manera ascendente",
                        'sSortDescending': ": Activar para ordenar la columna de manera descendente",
                    },
                    'buttons': {
                        'copyTitle': 'Copiar al portapapeles',
                        'copyKeys': 'Presiona <i>ctrl</i> o <i>\u2318</i> + <i>C</i> para copiar la tabla<br>al portapapeles.<br><br>Para cancelar, click aquí o presiona esc.',
                        'copySuccess': {
                            1: "1 fila copiada",
                            _: "%d filas copiadas"
                        },
                        'colvisRestore': 'Restaurar',
                    },
                },
            });
        });
    </script>
@endpush
