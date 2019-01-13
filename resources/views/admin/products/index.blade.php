@extends('admin._layouts.main')

@section('title', config('app.name').' | Productos y servicios')

@section('header', 'Productos y servicios')

@section('description', 'Página para gestión de productos y servicios')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de productos y servicios</h3>
            <div class="box-tools pull-right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('products.create') }}">
                    <i class="fa fa-plus"></i> Nuevo producto o servicio
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-striped" id="products" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Impuestos</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
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
            $('#products').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.products.index') }}",
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'value'},
                    {data: 'tax_percentage'},
                    {data: 'type'},
                    {data: 'description'},
                    {data: 'state.name'},
                    {data: 'actions'},
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