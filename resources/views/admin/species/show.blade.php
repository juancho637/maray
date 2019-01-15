@extends('admin._layouts.main')

@section('title', config('app.name').' | Especies y razas')

@section('header', 'Especies y razas')

@section('description', 'Visualizar especie')

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
                        <input value="{{ $species->name }}" type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea class="form-control" disabled>{{ $species->description }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <a href="{{ route('species.edit', $species) }}" class="btn btn-warning btn-block">Editar especie</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de razas asociadas</h3>

            <div class="pull-right box-tools">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('species.breeds.create', $species) }}">
                    <i class="fa fa-plus"></i> Nueva raza
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="breeds" class="table table-striped">
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
            $('#breeds').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.species.breeds.index', $species) }}",
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