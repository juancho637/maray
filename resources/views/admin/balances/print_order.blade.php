<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Caja #{{ $balance->id.' / '.$balance->updated_at->format('d-m-Y h:i:s A') }}</title>
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('/css/appointment-style.css') }}" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{ asset('/images/logo.png') }}">
    </div>
    <div id="company">
        <h2 class="name">Maray</h2>
        <div>Calle 5C # 40-27, Barrio Tequendama, Cali.</div>
        <div>(+57) 2 485 4066 / (+57) 310 389 8625</div>
        <div>recepcion@maraymedvet.com</div>
    </div>
</header>
<main>
    <div id="details" class="clearfix">
        <div id="client">
            <div class="to">Cuadre de caja No. <span class="pet">{{ $balance->id }}</span></div>
            <div class="to">{{ $balance->user->full_name }}</div>
        </div>
        <div id="invoice">
            <h2 class="name">Fecha: {{ $balance->updated_at->format('j \\d\\e F \\d\\e\\l Y') }}</h2>
        </div>
    </div>
    <br>
    @if(count($balance->purchaseOrders()->byType('purchaseOrder')) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="5" style="text-align: center;"><h4>Ordenes de compra</h4></th>
            </tr>
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
        <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="5" style="text-align: center;"><h4>Facturas</h4></th>
            </tr>
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
        <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="5" style="text-align: center;"><h4>Créditos</h4></th>
            </tr>
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
        <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="6" style="text-align: center;"><h4>Pago créditos</h4></th>
            </tr>
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
        <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="4" style="text-align: center;"><h4>Depósitos</h4></th>
            </tr>
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
        <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="5" style="text-align: center;"><h4>Depositos Anteriores Asignados</h4></th>
            </tr>
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
        <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="4" style="text-align: center;"><h4>Devoluciones</h4></th>
            </tr>
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
        <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="5" style="text-align: center;"><h4>Gastos</h4></th>
            </tr>
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
    <table class="table table-striped">
        <thead>
        <tr>
            <th colspan="5" style="text-align: center;"><h4>Entrega de dinero</h4></th>
        </tr>
        <tr>
            <th>Descripción</th>
            <th colspan="2">Valor manual</th>
            <th colspan="2">Valor del sistema</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Efectivo</td>
            <td colspan="2">${{ number_format($balance->manual_cash) }}</td>
            <td colspan="2">${{ number_format($balance->system_real_cash) }}</td>
        </tr>
        <tr>
            <td>Cheque</td>
            <td colspan="2">${{ number_format($balance->manual_cheque) }}</td>
            <td colspan="2">${{ number_format($balance->system_real_cheque) }}</td>
        </tr>
        <tr>
            <td>T. débito / T. crédito</td>
            <td colspan="2">${{ number_format($balance->manual_card) }}</td>
            <td colspan="2">${{ number_format($balance->system_real_card) }}</td>
        </tr>
        <tr>
            <td>Gastos y devoluciones</td>
            <td colspan="2">${{ number_format($balance->manual_expenditure) }}</td>
            <td colspan="2">${{ number_format($balance->system_real_expenditure) }}</td>
        </tr>
        <tr class="warning">
            <td>Total</td>
            <td colspan="2">${{ number_format($balance->manual_total) }}</td>
            <td colspan="2">${{ number_format($balance->system_real_total) }}</td>
        </tr>
        </tbody>
    </table>
    <br>
    <div class="row">
        <div class="col-xs-6">
            <div class="clearfix notices">
                <div class="notice">Entrega: {{ $balance->user->full_name }}</div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="clearfix notices">
                <div class="notice">Recibe: {{ $balance->delivery_balance_to }}</div>
            </div>
        </div>
    </div>
</main>
<!-- jQuery 3 -->
<script src="{{ asset('/plugins/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>