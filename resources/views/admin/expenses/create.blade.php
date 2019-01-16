@extends('admin._layouts.main')

@section('title', config('app.name').' | Gastos')

@section('header', 'Gastos')

@section('description', 'Página para la creación de un gasto')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
    @include('admin._layouts.partials.warningBalance')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Crear gasto</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('expenses.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>Fecha depósito:</label>
                            <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control" disabled required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-8">
                        <div class="form-group">
                            <label>Dependencia:</label>
                            <select class="form-control select2" name="expense_type_id" style="width: 100%">
                                @foreach($expenseTypes as $expenseType)
                                    <option value="{{ $expenseType->id }}" {{ old('expense_type_id') == $expenseType->id ? 'selected' : '' }}>{{ $expenseType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group {{ $errors->has('cash') ? 'has-error' : '' }}">
                            <label>Efectivo:</label>
                            <input type="number" min="0" name="cash" value="{{ old('cash') }}" class="form-control"/>
                            {!! $errors->first('cash', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group {{ $errors->has('card') ? 'has-error' : '' }}">
                            <label>Tarjeta:</label>
                            <input type="number" min="0" name="card" value="{{ old('card') }}" class="form-control"/>
                            {!! $errors->first('card', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group {{ $errors->has('cheque') ? 'has-error' : '' }}">
                            <label>Cheque:</label>
                            <input type="number" min="0" name="cheque" value="{{ old('cheque') }}" class="form-control"/>
                            {!! $errors->first('cheque', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label>Descripción:</label>
                            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <button class="btn btn-success btn-block fixed-bottom">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
    </script>
@endpush