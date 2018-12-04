@foreach($details as $detail)
    <tr class="ref-{{ $detail->id }}">
        <td>{{ $detail->product->name }}</td>
        <td>{{ $detail->quantity }}</td>
        <td>{{ $detail->value }}</td>
        <td>{{ $detail->tax_percentage }}%</td>
        <td>{{ $detail->unit_value }}</td>
        <td>{{ $detail->total_value }}</td>
        <td>
            <button data-product="{{ $detail->product_id }}" data-detail="{{ $detail->id }}" data-quantity="{{ $detail->quantity }}" class="btn btn-xs btn-warning edit-purchase-detail"><i class="fa fa-pencil"></i></button>
            <button data-detail="{{ $detail->id }}" class="btn btn-xs btn-danger delete-purchase-detail"><i class="fa fa-times"></i></button>
        </td>
    </tr>
@endforeach