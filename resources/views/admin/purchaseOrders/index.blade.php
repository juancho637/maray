@extends('admin._layouts.main')

@section('title', config('app.name').' | Ordenes y cotizaciones')

@section('header', 'Ordenes y cotizaciones')

@section('description', 'Página para gestión de las ordenes y cotizaciones')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de ordenes y cotizaciones</h3>
            <div class="box-tools pull-right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('purchaseOrders.create') }}">
                    <i class="fa fa-plus"></i> Nueva orden o cotización
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="purchaseOrder" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Consecutivo</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- moment -->
    <script src="{{ asset('/plugins/moment/moment-with-locales.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function () {
            $('#purchaseOrder').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.purchaseOrders.index') }}",
                columns: [
                    {data: 'id'},
                    {data: 'created_at'},
                    {data: 'type'},
                    {data: 'consecutive'},
                    {data: 'client.full_name'},
                    {data: 'total_value'},
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