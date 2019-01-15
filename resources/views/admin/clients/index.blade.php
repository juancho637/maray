@extends('admin._layouts.main')

@section('title', config('app.name').' | Clientes y mascotas')

@section('header', 'Clientes y mascotas')

@section('description', 'Página para gestión de clientes y mascotas')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de clientes</h3>
            <div class="box-tools pull-right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('clients.create') }}">
                    <i class="fa fa-plus"></i> Nuevo cliente
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="clients" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Identificación</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono celular</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <!-- Code -->
    <script>
        $(function () {
            $('#clients').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.clients.index') }}",
                columns: [
                    {data: 'id'},
                    {data: 'full_name'},
                    {data: 'identification'},
                    {data: 'email'},
                    {data: 'cell_phone'},
                    {data: 'state.name'},
                    {data: 'actions'}
                ],
                "language": {
                    "info": "_TOTAL_ registros",
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "zeroRecords": "No hay coinsidencias",
                    "infoEmpty": "",
                    "infoFiltered": ""
                }
            });
        });
    </script>
@endpush