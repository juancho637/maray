@extends('admin._layouts.main')

@section('title', config('app.name').' | Depósitos')

@section('header', 'Depósitos')

@section('description', 'Crear depósito')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
    @include('admin._layouts.partials.warningBalance')
    <div class="box box-primary">
        <div class="box-body">
            <form action="{{ route('deposits.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Fecha depósito:</label>
                            <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                            <label for="client_id">Cliente:</label>
                            <select name="client_id" id="client_id" class="form-control" style="width: 100%;"></select>
                            {!! $errors->first('client_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Identificación:</label>
                            <input type="text" id="identification" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Usuario:</label>
                            <input type="text" id="identification" value="{{ \Illuminate\Support\Facades\Auth::user()->full_name }}" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group {{ $errors->has('cash') ? 'has-error' : '' }}">
                            <label for="cash">Efectivo:</label>
                            <input type="number" id="cash" name="cash" class="form-control"/>
                            {!! $errors->first('cash', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group {{ $errors->has('cheque') ? 'has-error' : '' }}">
                            <label for="cheque">Cheque:</label>
                            <input type="number" id="cheque" name="cheque" class="form-control"/>
                            {!! $errors->first('cheque', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group {{ $errors->has('card') ? 'has-error' : '' }}">
                            <label for="card">Tarjeta:</label>
                            <input type="number" id="card" name="card" class="form-control"/>
                            {!! $errors->first('card', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <button class="btn btn-success btn-block fixed-bottom">crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- moment -->
    <script src="{{ asset('/plugins/moment/moment-with-locales.min.js') }}"></script>

    <script>
        $(function () {
            moment.locale("es");
            let client_id = '{{ old('client_id') }}', clients = [];

            //Initialize Select2 Elements
            $('.select2').select2();

            $('#client_id').select2({
                minimumInputLength: 2,
                language: {
                    inputTooShort: function () {
                        return "Por favor ingrese 2 o más letras para realizar la busqueda.";
                    }
                },
                ajax: {
                    url: "{{ route('api.clients.index') }}",
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data, params) {
                        clients = data;
                        return {
                            results: data
                        };
                    },
                }
            });

            //Code
            $('#client_id').change(function() {
                clients.map((client)=>{
                    if(client.id === parseInt($(this).val())){
                        $('#identification').val(client.type_identification+'. '+client.identification);
                    }
                });
            });

            if(client_id){
                $.get('{{ route('api.clients.show', old('client_id')) }}', function(client) {
                    $('#client_id').append(`<option value="{{ old('client_id') }}" selected>${client.text}</option>`);
                    $('#identification').val(client.type_identification+'. '+client.identification);
                });
            }
        });
    </script>
@endpush