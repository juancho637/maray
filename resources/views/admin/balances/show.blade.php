@extends('admin._layouts.main')

@section('title', config('app.name').' | Cajas')

@section('header', 'Cajas')

@section('description', 'Visualizar caja')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Caja #{{ $balance->id }}</h3>
        </div>
        <div class="box-body table-responsive">
            @if(count($balance->deposits) > 0)
                <h4>Depósitos:</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balance->deposits as $deposit)
                        <tr>
                            <td>{{ $deposit->id }}</td>
                            <td>{{ $deposit->created_at }}</td>
                            <td>{{ $deposit->client->full_name }}</td>
                            <td>${{ $deposit->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if(count($balance->purchaseOrders()->byType('purchaseOrder')) > 0)
                <hr>
                <h4>Ordenes de compra:</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Consecutivo</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balance->purchaseOrders()->byType('purchaseOrder') as $purchaseOrder)
                        <tr>
                            <td>{{ $purchaseOrder->id }}</td>
                            <td>{{ $purchaseOrder->consecutive }}</td>
                            <td>{{ $purchaseOrder->created_at }}</td>
                            <td>{{ $purchaseOrder->client->full_name }}</td>
                            <td>${{ $purchaseOrder->subtotal }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if(count($balance->purchaseOrders()->byType('invoice')) > 0)
                <hr>
                <h4>Facturas:</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Consecutivo</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balance->purchaseOrders()->byType('invoice') as $purchaseOrder)
                        <tr>
                            <td>{{ $purchaseOrder->id }}</td>
                            <td>{{ $purchaseOrder->consecutive }}</td>
                            <td>{{ $purchaseOrder->created_at }}</td>
                            <td>{{ $purchaseOrder->client->full_name }}</td>
                            <td>${{ $purchaseOrder->total_value }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if(count($balance->creditPayments) > 0)
                <hr>
                <h4>Pago créditos:</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Id crédito</th>
                        <th>Orden / Factura</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balance->creditPayments as $creditPayment)
                        <tr>
                            <td>{{ $creditPayment->id }}</td>
                            <td>{{ $creditPayment->created_at }}</td>
                            <td>{{ $creditPayment->credit->purchase_order->user->full_name }}</td>
                            <td>{{ $creditPayment->credit->id }}</td>
                            <td>
                                @if($creditPayment->credit->purchase_order->type === 'purchaseOrder')
                                    Orden de compra
                                @else
                                    Factura
                                @endif
                                 #{{ $creditPayment->credit->purchase_order->consecutive }}</td>
                            <td>${{ $creditPayment->value }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if(count($balance->depositsAssigned) > 0)
                <hr>
                <h4>Depositos Anteriores Asignados:</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Orden / Factura</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balance->depositsAssigned as $deposit)
                        <tr>
                            <td>{{ $deposit->id }}</td>
                            <td>{{ $deposit->created_at }}</td>
                            <td>{{ $deposit->client->full_name }}</td>
                            <td>
                                @if($deposit->purchaseOrder->type === 'purchaseOrder')
                                    Orden de compra
                                @else
                                    Factura
                                @endif
                                 #{{ $deposit->purchaseOrder->id }}
                            </td>
                            <td>${{ $deposit->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if(count($balance->expenses()->returns()->get()) > 0)
                <hr>
                <h4>Devoluciones:</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Orden / Factura</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balance->expenses()->returns()->get() as $expense)
                        <tr>
                            <td>{{ $expense->id }}</td>
                            <td>{{ $expense->created_at }}</td>
                            <td>
                                @if($expense->purchaseOrder->type === 'purchaseOrder')
                                    Orden de compra
                                @else
                                    Factura
                                @endif
                                 #{{ $expense->purchaseOrder->consecutive }}
                            </td>
                            <td>${{ $expense->value }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if(count($balance->expenses()->notReturns()->get()) > 0)
                <hr>
                <h4>Gastos:</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Dependencia</th>
                        <th>Descripción</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balance->expenses()->notReturns()->get() as $expense)
                        <tr>
                            <td>{{ $expense->id }}</td>
                            <td>{{ $expense->created_at }}</td>
                            <td>{{ $expense->expense_type->name }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>${{ $expense->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Entrega de dinero</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group {{ $errors->has('manual_invoice_cash') ? 'has-error' : '' }}">
                        <label for="manual_invoice_cash">Efectivo (factura):</label>
                        <input value="{{ old('manual_invoice_cash') }}" type="number" class="form-control" name="manual_invoice_cash" id="manual_invoice_cash">
                        {!! $errors->first('manual_invoice_cash', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group {{ $errors->has('manual_invoice_cheque') ? 'has-error' : '' }}">
                        <label for="manual_invoice_cheque">Cheque (factura):</label>
                        <input value="{{ old('manual_invoice_cheque') }}" type="number" class="form-control" name="manual_invoice_cheque" id="manual_invoice_cheque">
                        {!! $errors->first('manual_invoice_cheque', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group {{ $errors->has('manual_invoice_card') ? 'has-error' : '' }}">
                        <label for="manual_invoice_card">Tarjeta (factura):</label>
                        <input value="{{ old('manual_invoice_card') }}" type="number" class="form-control" name="manual_invoice_card" id="manual_invoice_card">
                        {!! $errors->first('manual_invoice_card', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group {{ $errors->has('manual_invoice_total') ? 'has-error' : '' }}">
                        <label for="manual_invoice_total">Total (factura):</label>
                        <input value="{{ old('manual_invoice_total') }}" type="number" class="form-control" name="manual_invoice_total" id="manual_invoice_total" disabled>
                        {!! $errors->first('manual_invoice_total', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group {{ $errors->has('manual_cash') ? 'has-error' : '' }}">
                        <label for="manual_cash">Efectivo:</label>
                        <input value="{{ old('manual_cash') }}" type="number" class="form-control" name="manual_cash" id="manual_cash">
                        {!! $errors->first('manual_cash', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group {{ $errors->has('manual_cheque') ? 'has-error' : '' }}">
                        <label for="manual_cheque">Cheque:</label>
                        <input value="{{ old('manual_cheque') }}" type="number" class="form-control" name="manual_cheque" id="manual_cheque">
                        {!! $errors->first('manual_cheque', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group {{ $errors->has('manual_card') ? 'has-error' : '' }}">
                        <label for="manual_card">Tarjeta:</label>
                        <input value="{{ old('manual_card') }}" type="number" class="form-control" name="manual_card" id="manual_card">
                        {!! $errors->first('manual_card', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group {{ $errors->has('manual_total') ? 'has-error' : '' }}">
                        <label for="manual_total">Total:</label>
                        <input value="{{ old('manual_total') }}" type="number" class="form-control" name="manual_total" id="manual_total" disabled>
                        {!! $errors->first('manual_total', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group {{ $errors->has('manual_expenditure') ? 'has-error' : '' }}">
                        <label for="manual_expenditure">Gastos y devoluciones:</label>
                        <input value="{{ old('manual_expenditure') }}" type="number" class="form-control" name="manual_expenditure" id="manual_expenditure">
                        {!! $errors->first('manual_expenditure', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
                        <label for="total">Dinero total:</label>
                        <input value="{{ old('total') }}" type="number" class="form-control" name="total" id="total" disabled>
                        {!! $errors->first('total', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block">Cerrar caja</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {

        });
    </script>
@endpush