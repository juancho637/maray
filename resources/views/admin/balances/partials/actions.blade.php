@if($state_id !== 1)
    <div class="btn-group">
        <button type="button" class="btn btn-xs bg-navy dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-print"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="{{ route('balances.print_order', $id) }}" target="_blank">Orden de compra</a></li>
            <li><a href="{{ route('balances.print_invoice', $id) }}" target="_blank">Factura</a></li>
        </ul>
    </div>
@else
    <a href="{{ route('balances.show', $id) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
@endif