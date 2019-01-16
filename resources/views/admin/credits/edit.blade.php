@extends('admin._layouts.main')

@section('title', config('app.name').' | Pago de créditos')

@section('header', 'Pago de créditos')

@section('description', 'Página para el pago de un crédito')

@push('styles')

@endpush

@section('content')
    @include('admin._layouts.partials.warningBalance')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Cliente:</label>
                        <input value="{{ $credit->purchase_order->client->full_name }}" type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Valor total:</label>
                        <input value="${{ $credit->value }}" type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Valor pendiente:</label>
                        <input value="${{ $credit->outstanding_balance }}" type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Orden / Factura:</label>
                        <input value="{{ $credit->purchase_order->spanishType($credit->purchase_order->type) }} #{{ $credit->purchase_order_id }}" type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <form action="{{ route('credits.update', $credit) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Efectivo:</label>
                            <input type="number" value="{{ old('cash') }}" id="cash" name="cash" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Cheque:</label>
                            <input type="number" value="{{ old('cheque') }}" id="cheque" name="cheque" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Tarjeta:</label>
                            <input type="number" value="{{ old('card') }}" id="card" name="card" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Saldo pendiente:</label>
                            <input type="text" id="outstandingBalance" name="outstandingBalance" class="form-control" readonly/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group {{ $errors->has('positiveBalance') ? 'has-error' : '' }}">
                            <label>Saldo a favor:</label>
                            <input type="text" id="positiveBalance" name="positiveBalance" class="form-control" readonly/>
                            {!! $errors->first('positiveBalance', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Crear pago</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(count($credit->creditPayments) > 0)
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Pagos asociados</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($credit->creditPayments as $creditPayment)
                        <tr>
                            <td>{{ $creditPayment->created_at }}</td>
                            <td>{{ $creditPayment->user->full_name }}</td>
                            <td>{{ $creditPayment->value }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        $(function () {
            let cash = parseInt('{{ old("cash") ?: 0 }}');
            let card = parseInt('{{ old("card") ?: 0 }}');
            let cheque = parseInt('{{ old("cheque") ?: 0 }}');
            const total = parseInt('{{ $credit->outstanding_balance }}');
            //let subtotal = total;
            calculateBalance();

            $('#cash').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    cash = 0;
                } else {
                    cash = _val;
                    //subtotal = total - (cash + cheque + card);
                }

                /*if(subtotal < 0){
                    subtotal = 0;
                    cash = total;
                    $(this).val(total);
                }*/

                calculateBalance();
            });
            $('#cheque').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    cheque = 0;
                } else {
                    cheque = _val;
                }

                calculateBalance();
            });
            $('#card').bind('keyup', function() {
                let _val = parseInt($(this).val());

                if (isNaN(_val)) {
                    card = 0;
                } else {
                    card = _val;
                    //subtotal = total - (cash + cheque + card);
                }

                /*if(subtotal < 0){
                    subtotal = 0;
                    card = total;
                    $(this).val(total);
                }*/

                calculateBalance();
            });

            function calculateBalance() {
                let _balance = cash + cheque + card;

                if (_balance > total) {
                    $('#positiveBalance').val(_balance - total);
                    $('#outstandingBalance').val(0);
                } else {
                    $('#outstandingBalance').val(total - _balance);
                    $('#positiveBalance').val(0);
                }
            }
        });
    </script>
@endpush