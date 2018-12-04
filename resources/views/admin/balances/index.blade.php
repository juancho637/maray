@extends('admin._layouts.main')

@section('title', config('app.name').' | Cajas')

@section('header', 'Cajas')

@section('description', 'Página para la gestión de las cajas')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de cajas</h3>
            <div class="box-tools pull-right">
                @if (count($balances) === 0)
                    <form method="post" action="{{ route('balances.store') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Nueva caja
                        </button>
                    </form>
                @else
                    @foreach ($balances as $balance)
                        @if ($loop->first)
                            @if($balance->state->abbreviation === 'balance-closed')
                                <form method="post" action="{{ route('balances.store') }}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i> Nueva caja
                                    </button>
                                </form>
                            @else
                                <a type="button" class="btn btn-primary btn-sm" href="{{ route('balances.show', $balance) }}">
                                    <i class="fa fa-sign-out"></i> Cerrar caja
                                </a>
                            @endif
                            @break
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="balances" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
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
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- moment -->
    <script src="{{ asset('/plugins/moment/moment-with-locales.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function () {
            $('#balances').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.balances.index') }}",
                columns: [
                    {data: 'id'},
                    {data: 'created_at'},
                    {data: 'user.full_name'},
                    {data: 'state.name'},
                    {data: 'actions'},
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