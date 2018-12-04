<a href="#" class="btn btn-xs btn-primary" target="_blank"><i class="fa fa-print"></i></a>
@if($type === 'quotation')
    <a href="{{ route('purchaseOrders.edit', $id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
@endif