@extends('admin._layouts.main')

@section('title', config('app.name').' | Gastos')

@section('header', 'Gastos')

@section('description', 'Página para gestión de gastos')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de gastos</h3>
            <div class="box-tools pull-right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('expenses.create') }}">
                    <i class="fa fa-plus"></i> Nuevo gasto
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="expenses" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Descripción</th>
                    <th>Total</th>
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
                ajax: "{{ route('datatable.expenses.index') }}",
                columns: [
                    {data: 'id'},
                    {data: 'created_at'},
                    {data: 'user.full_name'},
                    {data: 'state.name'},
                    {data: 'description'},
                    {data: 'total'},
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