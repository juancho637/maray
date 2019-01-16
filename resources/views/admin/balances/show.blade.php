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
            @if(count($balance->purchaseOrders()->byType('purchaseOrder')) > 0)
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
                            <td>{{ $purchaseOrder->created_at->format('d-m-Y') }}</td>
                            <td>{{ $purchaseOrder->client->full_name }}</td>
                            <td>${{ number_format($purchaseOrder->subtotal) }}</td>
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
                            <td>{{ $purchaseOrder->created_at->format('d-m-Y') }}</td>
                            <td>{{ $purchaseOrder->client->full_name }}</td>
                            <td>${{ number_format($purchaseOrder->total_value) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if(count($balance->credits) > 0)
                <hr>
                <h4>Créditos:</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Tipo</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balance->credits as $credit)
                        <tr>
                            <td>{{ $credit->id }}</td>
                            <td>{{ $credit->created_at->format('d-m-Y') }}</td>
                            <td>{{ $credit->purchase_order->user->full_name }}</td>
                            <td>
                                @if($credit->purchase_order->type === 'purchaseOrder')
                                    Orden de compra
                                @else
                                    Factura
                                @endif
                                #{{ $credit->purchase_order->consecutive }}
                            </td>
                            <td>${{ number_format($credit->value) }}</td>
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
                        <th>Crédito No.</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balance->creditPayments as $creditPayment)
                        <tr>
                            <td>{{ $creditPayment->id }}</td>
                            <td>{{ $creditPayment->created_at->format('d-m-Y') }}</td>
                            <td>{{ $creditPayment->credit->purchase_order->user->full_name }}</td>
                            <td>{{ $creditPayment->credit->id }}</td>
                            <td>${{ number_format($creditPayment->value) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if(count($balance->deposits) > 0)
                <hr>
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
                            <td>{{ $deposit->created_at->format('d-m-Y') }}</td>
                            <td>{{ $deposit->client->full_name }}</td>
                            <td>${{ number_format($deposit->total) }}</td>
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
                            <td>{{ $deposit->created_at->format('d-m-Y') }}</td>
                            <td>{{ $deposit->client->full_name }}</td>
                            <td>
                                @if($deposit->purchaseOrder->type === 'purchaseOrder')
                                    Orden de compra
                                @else
                                    Factura
                                @endif
                                 #{{ $deposit->purchaseOrder->consecutive }}
                            </td>
                            <td>${{ number_format($deposit->total) }}</td>
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
                            <td>{{ $expense->created_at->format('d-m-Y') }}</td>
                            <td>
                                @if($expense->purchaseOrder->type === 'purchaseOrder')
                                    Orden de compra
                                @else
                                    Factura
                                @endif
                                 #{{ $expense->purchaseOrder->consecutive }}
                            </td>
                            <td>${{ number_format($expense->value) }}</td>
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
                            <td>{{ $expense->created_at->format('d-m-Y') }}</td>
                            <td>{{ $expense->expense_type->name }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>${{ number_format($expense->total) }}</td>
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
            <form action="{{ route('balances.update', [$balance]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="form-group {{ $errors->has('manual_invoice_cash') ? 'has-error' : '' }}">
                            <label for="manual_invoice_cash">*Efectivo (factura):</label>
                            <input value="{{ old('manual_invoice_cash') }}" type="number" class="form-control" name="manual_invoice_cash" id="manual_invoice_cash">
                            {!! $errors->first('manual_invoice_cash', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="form-group {{ $errors->has('manual_invoice_cheque') ? 'has-error' : '' }}">
                            <label for="manual_invoice_cheque">*Cheque (factura):</label>
                            <input value="{{ old('manual_invoice_cheque') }}" type="number" class="form-control" name="manual_invoice_cheque" id="manual_invoice_cheque">
                            {!! $errors->first('manual_invoice_cheque', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="form-group {{ $errors->has('manual_invoice_card') ? 'has-error' : '' }}">
                            <label for="manual_invoice_card">*Tarjeta (factura):</label>
                            <input value="{{ old('manual_invoice_card') }}" type="number" class="form-control" name="manual_invoice_card" id="manual_invoice_card">
                            {!! $errors->first('manual_invoice_card', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group {{ $errors->has('manual_invoice_total') ? 'has-error' : '' }}">
                            <label for="manual_invoice_total">Total (factura):</label>
                            <input value="{{ old('manual_invoice_total') }}" type="number" class="form-control" name="manual_invoice_total" id="manual_invoice_total" readonly>
                            {!! $errors->first('manual_invoice_total', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group {{ $errors->has('manual_cash') ? 'has-error' : '' }}">
                            <label for="manual_cash">*Efectivo:</label>
                            <input value="{{ old('manual_cash') }}" type="number" class="form-control" name="manual_cash" id="manual_cash">
                            {!! $errors->first('manual_cash', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group {{ $errors->has('manual_cheque') ? 'has-error' : '' }}">
                            <label for="manual_cheque">*Cheque:</label>
                            <input value="{{ old('manual_cheque') }}" type="number" class="form-control" name="manual_cheque" id="manual_cheque">
                            {!! $errors->first('manual_cheque', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group {{ $errors->has('manual_card') ? 'has-error' : '' }}">
                            <label for="manual_card">*Tarjeta:</label>
                            <input value="{{ old('manual_card') }}" type="number" class="form-control" name="manual_card" id="manual_card">
                            {!! $errors->first('manual_card', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group {{ $errors->has('manual_expenditure') ? 'has-error' : '' }}">
                            <label for="manual_expenditure">*Gastos y devoluciones:</label>
                            <input value="{{ old('manual_expenditure') }}" type="number" class="form-control" name="manual_expenditure" id="manual_expenditure">
                            {!! $errors->first('manual_expenditure', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group {{ $errors->has('manual_total') ? 'has-error' : '' }}">
                            <label for="manual_total">Dinero total:</label>
                            <input value="{{ old('manual_total') }}" type="number" class="form-control" name="manual_total" id="manual_total" readonly>
                            {!! $errors->first('manual_total', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group {{ $errors->has('delivery_balance_to') ? 'has-error' : '' }}">
                            <label for="delivery_balance_to">Entrega de caja a:</label>
                            <select name="delivery_balance_to" id="gender" class="form-control select2" style="width: 100%;">
                                <option value="Marta Naranjo">Marta Naranjo</option>
                                <option value="Aicardo Aristizabal">Aicardo Aristizabal</option>
                            </select>
                            {!! $errors->first('delivery_balance_to', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('¿Estas seguro de querer cerrar la caja?')">
                            Cerrar caja
                        </button>
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

            //let manual_cash = 0, manual_card = 0, manual_cheque = 0, manual_expenditure = 0;
            let manual_cash = 0, manual_card = 0, manual_cheque = 0;
            let manual_invoice_cash = 0, manual_invoice_cheque = 0, manual_invoice_card = 0;

            $('#manual_cash').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    manual_cash = 0;
                } else {
                    manual_cash = _val;
                }

                calculateTotalBalance();
            });
            /*$('#manual_expenditure').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    manual_expenditure = 0;
                } else {
                    manual_expenditure = _val;
                }

                calculateTotalBalance();
            });*/
            $('#manual_card').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    manual_card = 0;
                } else {
                    manual_card = _val;
                }

                calculateTotalBalance();
            });
            $('#manual_cheque').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    manual_cheque = 0;
                } else {
                    manual_cheque = _val;
                }

                calculateTotalBalance();
            });
            function calculateTotalBalance() {
                //let _manual_balance = (manual_cash + manual_cheque + manual_card) - manual_expenditure;
                let _manual_balance = manual_cash + manual_cheque + manual_card;

                $('#manual_total').val(_manual_balance);
            }

            $('#manual_invoice_cash').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    manual_invoice_cash = 0;
                } else {
                    manual_invoice_cash = _val;
                }

                calculateInvoiceBalance();
            });
            $('#manual_invoice_cheque').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    manual_invoice_cheque = 0;
                } else {
                    manual_invoice_cheque = _val;
                }

                calculateInvoiceBalance();
            });
            $('#manual_invoice_card').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    manual_invoice_card = 0;
                } else {
                    manual_invoice_card = _val;
                }

                calculateInvoiceBalance();
            });
            function calculateInvoiceBalance() {
                let _manual_invoice_balance = manual_invoice_cash + manual_invoice_cheque + manual_invoice_card;

                $('#manual_invoice_total').val(_manual_invoice_balance);
            }
        });
    </script>
@endpush