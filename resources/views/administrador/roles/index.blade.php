@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <div class="align-items-center d-flex justify-content-between">
        <h1>Gestion de roles</h1>
        <a href="{{route('administrador.roles.create')}}" class="btn bg-navy btn-sm">
            <i class="fa-plus-circle fas "></i><span class="mx-1">Crear rol</span>
        </a>
    </div>
@stop

@section('content')
    @include('sweetalert::alert')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm table-striped" id="roles">
                <thead class="bg-navy text-center">
                    <tr>
                        <th class="number-th">ID</th>
                        <th>Rol</th>
                        <th class="actions-th">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('administrador.roles.edit',$role) }}"
                                       class="btn btn-success btn-sm position-relative">
                                        <i class="fas fa-edit class_title" data-title="Editar"></i>
                                    </a>
                                    <form action="{{ route('administrador.roles.destroy', $role) }}" method="POST">
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

@push('js')
    <script>
        $(document).ready(function () {
            let printCounter = 0;
            $('#roles thead tr').clone(true).addClass('filters bg-white').appendTo('#roles thead');
            $('#roles').DataTable({
                'dom': 'B<"float-left"l><"float-right"f>rt<"float-left"i><"d-flex justify-content-end"p><"clearfix">',
                'responsive': true,
                'autoWidth': false,
                'order': [[1, 'asc']],
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
                                'title': 'Roles',
                                'text': '<i class="fas fa-lg fa-file-excel"></i>',
                                'autoFilter': true,
                                'sheetName': 'Usuarios',
                                'titleAttr': 'Exportar a Excel',
                                'className': 'bg-success rounded w-auto',
                                'exportOptions': {
                                    'columns': ':visible',
                                }
                            },
                            {
                                'extend': 'pdfHtml5',
                                'title': 'Roles',
                                'text': '<i class="fas fa-lg fa-file-pdf"></i>',
                                'titleAttr': 'Exportar a PDF',
                                'orientation': 'portrait',
                                'pageSize': 'LETTER',
                                'className': 'bg-danger rounded w-auto',
                                'exportOptions': {
                                    'columns': ':visible'
                                },
                                'download': 'open',
                            },
                            {
                                'extend': 'copyHtml5',
                                'title': 'Roles',
                                'text': '<i class="fas fa-lg fa-copy"></i>',
                                'titleAttr': 'Copiar',
                                'className': 'bg-primary rounded w-auto',
                                'exportOptions': {
                                    'columns': ':visible'
                                }
                            },
                            {
                                'extend': 'print',
                                'title': 'Roles',
                                'text': '<i class="fas fa-lg fa-print"></i>',
                                'titleAttr': 'Imprimir',
                                'className': 'bg-secondary rounded w-auto',
                                'exportOptions': {
                                    'columns': ':visible',
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
                                'title': 'Roles',
                                'text': '<i class="fas fa-lg fa-file-csv"></i>',
                                'titleAttr': 'Exportar a CSV',
                                'className': 'bg-success rounded w-auto',
                                'bom': true,
                                // 'fieldBoundary':"'",
                                // 'header': false,
                                'exportOptions': {
                                    'columns': ':visible',
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
                        'targets': [2]
                    },
                ],
                'displayLength': 10,
                'lengthMenu': [
                    [5, 10, 15, 30, 50, 100, 200, 500, 1000, -1],
                    [5, 10, 15, 30, 50, 100, 200, 500, 1000, "Todo"]
                ],
                'orderCellsTop': true,
                'fixedHeader': true,
                'initComplete': function () {
                    const api = this.api();
                    // For each column
                    api.columns().eq(0).each(function (colIdx) {
                        // Set the header cell to contain the input element
                        const cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                        const title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '">');
                        // On every keypress in this input
                        $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                            .off('keyup change')
                            .on('keyup change', function (e) {
                                e.stopPropagation();
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                const regexr = '({search})'; //$(this).parents('th').find('select').val();
                                const cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search((this.value !== "") ? regexr.replace('{search}', '(((' + this.value + ')))') : "", this.value !== "", this.value === "")
                                    .draw();
                                $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
                },
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


