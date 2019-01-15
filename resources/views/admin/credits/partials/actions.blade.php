@if($outstanding_balance > 0)
    <a href="{{ route('credits.edit', $id) }}" style="padding: 1px 7px;" class="btn btn-xs btn-warning"><i class="fa fa-usd"></i></a>
@endif
<a href="#" class="btn btn-xs bg-navy" target="_blank"><i class="fa fa-print"></i></a>
