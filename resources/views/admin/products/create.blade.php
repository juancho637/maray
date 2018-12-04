@extends('admin._layouts.main')

@section('title', config('app.name').' | Productos y servicios')

@section('header', 'Productos y servicios')

@section('description', 'Crear producto o servicio')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ route('products.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Nombre:</label>
                                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" placeholder="Nombre del producto/servicio">
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                                    <label for="value">Precio:</label>
                                    <input value="{{ old('value') }}" type="number" min="0" class="form-control" name="value" id="value" placeholder="Precio del producto/servicio ($)">
                                    {!! $errors->first('value', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('tax_percentage') ? 'has-error' : '' }}">
                                    <label for="tax_percentage">Porcentaje de impuestos:</label>
                                    <input value="{{ old('tax_percentage') }}" type="number" min="0" max="100" class="form-control" name="tax_percentage" id="tax_percentage" placeholder="Porcentaje de impuestos (%)">
                                    {!! $errors->first('tax_percentage', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                                    <label for="type">Tipo:</label>
                                    <select name="type" id="type" class="form-control select2" style="width: 100%;">
                                        <option value="" selected="selected">Selecciona un tipo:</option>
                                        <option value="producto" @if (old('type') == "producto") {{ 'selected' }} @endif>Producto</option>
                                        <option value="servicio" @if (old('type') == "servicio") {{ 'selected' }} @endif>Servicio</option>
                                    </select>
                                    {!! $errors->first('type', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-3">
                                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                    <label for="category_id">Área:</label>
                                    <select class="form-control select2" name="category_id" id="category_id" data-placeholder="Seleccione una categoría"
                                            style="width: 100%;">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                    <label for="category_id">Categoría: (aun no esta)</label>
                                    <select class="form-control select2" name="category_id" id="category_id" data-placeholder="Seleccione una categoría"
                                            style="width: 100%;">
                                            <option>categoría</option>
                                    </select>
                                    {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group {{ $errors->has('providers') ? 'has-error' : '' }}">
                                    <label for="description">Proveedores:</label>
                                    <select class="form-control select2" multiple="multiple" name="providers[]" id="providers" data-placeholder="Seleccione por lo menos un proveedor"
                                            style="width: 100%;">
                                        @foreach($providers as $provider)
                                            <option {{ collect(old('providers'))->contains($provider->id) ? 'selected' : '' }} value="{{ $provider->id }}">{{ $provider->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('providers', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label for="description">Descripción:</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Descripción del producto/servicio">{{ old('description') }}</textarea>
                                    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Guardar producto/servicio</button>
                            </div>
                        </div>
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
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@endpush