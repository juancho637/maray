@extends('admin._layouts.main')

@section('title', config('app.name').' | Áreas y categorías')

@section('header', 'Áreas y categorías')

@section('description', 'Página para gestión de áreas')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de áreas</h3>
            <div class="box-tools pull-right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('areas.create') }}">
                    <i class="fa fa-plus"></i> Nueva área
                </a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-striped" id="areas">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
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
            $('#areas').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.areas.index') }}",
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'description'},
                    {data: 'state.name'},
                    {data: 'actions'}
                ],
                "language": {
                    "info": "_TOTAL_ registros",
                    "search": "Buscar",
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