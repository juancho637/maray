@extends('admin._layouts.main')

@section('title', config('app.name').' | Tipos de gasto')

@section('header', 'Tipos de gasto')

@section('description', 'Página para gestión de tipos de gasto')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de tipos de gasto</h3>
            <div class="box-tools pull-right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('expenseTypes.create') }}">
                    <i class="fa fa-plus"></i> Nuevo tipo de gasto
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="expenses" class="table table-striped" style="width:100%">
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

    <script>
        $(function () {
            $('#expenses').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.expenseTypes.index') }}",
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