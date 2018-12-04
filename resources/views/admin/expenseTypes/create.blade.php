@extends('admin._layouts.main')

@section('title', config('app.name').' | Tipos de gasto')

@section('header', 'Tipos de gasto')

@section('description', 'Crear tipo de gasto')

@push('styles')

@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Crear tipo de gasto</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('expenseTypes.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label>Nombre:</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required/>
                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label>Descripción:</label>
                            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
                            {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
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
    <script>

    </script>
@endpush