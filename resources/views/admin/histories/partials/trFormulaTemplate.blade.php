@foreach($details as $detail)
    <tr class="formula-detail-{{ $detail->id }}">
        <td>{{ $detail->product->name }}</td>
        <td>{{ $detail->presentation }}</td>
        <td>{{ $detail->quantity }}</td>
        <td>{{ $detail->recommendation }}</td>
        <td>
            <button data-detail="{{ $detail->id }}" data-quantity="{{ $detail->quantity }}" class="btn btn-xs btn-warning edit-formula-detail"><i class="fa fa-pencil"></i></button>
            <button data-detail="{{ $detail->id }}" class="btn btn-xs btn-danger delete-formula-detail"><i class="fa fa-times"></i></button>
        </td>
    </tr>
@endforeach