@extends('admin._layouts.main')

@section('title', config('app.name').' | Pago de créditos')

@section('header', 'Pago de créditos')

@section('description', 'Página para el pago de créditos')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de créditos</h3>
        </div>
        <div class="box-body table-responsive">
            <table id="credits" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Orden</th>
                    <th>Cliente</th>
                    <th>Valor pendiente</th>
                    <th>Total</th>
                    <th>Usuario</th>
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
            $('#credits').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.credits.index') }}",
                columns: [
                    {data: 'id'},
                    {data: 'created_at'},
                    {data: 'purchase_order_type'},
                    {data: 'purchase_order.client.full_name'},
                    {data: 'outstanding_balance'},
                    {data: 'value'},
                    {data: 'purchase_order.user.full_name'},
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