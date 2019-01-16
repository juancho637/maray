@extends('admin._layouts.main')

@section('title', config('app.name').' | Clientes y mascotas')

@section('header', 'Clientes y mascotas')

@section('description', 'Visualizar cliente')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label for="name">Nombre completo:</label>
                            <input value="{{ $client->full_name }}" type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Tipo de identificación:</label>
                            <input value="{{ $client->type_identification === 'CC' ? 'Cédula de ciudadania' : (($client->type_identification === 'CE') ? 'Cédula extranjera' : 'Tarjeta de identidad') }}" type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Numero de identificación:</label>
                            <input value="{{ $client->identification }}" type="number" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Género:</label>
                            <input value="{{ $client->gender === 'M' ? 'Masculino' : 'Femenino'}}" type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-5">
                        <div class="form-group">
                            <label for="address">Dirección:</label>
                            <input value="{{ $client->address }}" type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label for="email">Correo electrónico:</label>
                            <input value="{{ $client->email }}" type="email" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label for="birth_date">Fecha de nacimiento:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input value="{{ $client->birth_date }}" type="text" class="form-control pull-right" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="cell_phone">Celular:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-mobile"></i>
                                </div>
                                <input value="{{ $client->cell_phone }}" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>Telefono:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input value="{{ $client->phone }}" type="text" class="form-control" data-inputmask='"mask": "999-9999"' data-mask disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-block">Editar cliente</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Listado de mascotas asociadas</h3>

                <div class="pull-right box-tools">
                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('clients.pets.create', $client) }}">
                        <i class="fa fa-plus"></i> Nueva mascota
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="pets" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Sexo</th>
                            <th>Peso</th>
                            <th>Fecha de nacimiento</th>
                            <th>Estado reproductivo</th>
                            <th>Especie</th>
                            <th>Raza</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
@endsection

@push('scripts')
    <!-- InputMask -->
    <script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('/plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function () {
            //Initialize Datemask2 Elements
            $('[data-mask]').inputmask();

            //Initialize Select2 Elements
            $('.select2').select2();

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true,
                language: 'es',
                format: 'yyyy-mm-dd'
            });

            $('#pets').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.clients.pets.index', $client) }}",
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'gender'},
                    {data: 'weight'},
                    {data: 'birth_date'},
                    {data: 'reproductive_status'},
                    {data: 'breed.species.name'},
                    {data: 'breed.name'},
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