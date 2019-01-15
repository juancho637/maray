@extends('admin._layouts.main')

@section('title', config('app.name').' | Áreas y categorías')

@section('header', 'Áreas y categorías')

@section('description', 'Visualizar área')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input value="{{ old('name', $area->name) }}" type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea class="form-control" disabled>{{ old('description', $area->description) }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <a href="{{ route('areas.edit', $area) }}" class="btn btn-warning btn-block">Editar área</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de categorías asociadas</h3>
            <div class="box-tools pull-right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('areas.categories.create', $area) }}">
                    <i class="fa fa-plus"></i> Nueva categoría
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="categories" class="table table-striped" style="width:100%">
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
            $('#categories').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.areas.categories.index', $area) }}",
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