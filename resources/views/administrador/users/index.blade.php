@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <div class="align-items-center d-flex justify-content-between">
        <h3>Gestión de usuarios</h3>
        <a href="{{route('administrador.users.create')}}" class="btn bg-navy btn-sm">
            <i class="fa-plus-circle fas "></i><span class="mx-1">Crear usuario</span>
        </a>
    </div>
@stop

@section('content')
    @include('sweetalert::alert')
    <!--<p>Contenido en construcción</p>-->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm table-striped" id="users">
                <thead class="bg-navy text-center">
                    <tr>
                        <th class="number-th">#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th class="roles-th">Rol Asignado</th>
                        <th class="actions-th">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $key=>$user)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-nowrap">
                                @foreach ($user->roles as $role)
                                    <span class="badge badge-{{$role->name === 'Administrador' ? 'danger' : 'info'}}">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('administrador.users.edit', $user) }}"
                                       class="btn btn-success btn-sm position-relative">
                                        <i class="fas fa-edit class_title" data-title="Editar"></i>
                                    </a>
                                    <form action="{{ route('administrador.users.destroy',$user) }}" method="POST">
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
    <link rel="stylesheet" href="{{ asset('resources/css/users.css') }}">
@stop

@section('js')
@stop

@push('js')
    <script>
        $(document).ready(function () {
            let printCounter = 0;
            $('#users').DataTable({
                'dom': 'B<"float-left"l><"float-right"f>rt<"float-left"i><"d-flex justify-content-end"p><"clearfix">',
                responsive: true,
                autoWidth: false,
                //order: [[1, 'asc']],
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
                                'title': 'Usuarios',
                                'text': '<i class="fas fa-lg fa-file-excel"></input>',
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
                                'title': 'Usuarios',
                                'text': '<i class="fas fa-lg fa-file-pdf"></input>',
                                'titleAttr': 'Exportar a Excel',
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
                                'title': 'Usuarios',
                                'text': '<i class="fas fa-lg fa-copy"></i>',
                                'titleAttr': 'Copiar',
                                'className': 'bg-primary rounded w-auto',
                                'exportOptions': {
                                    'columns': ':visible'
                                }
                            },
                            {
                                'extend': 'print',
                                'title': 'Usuarios',
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
                                'title': 'Usuarios',
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
                        'targets': [3, 4]
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
