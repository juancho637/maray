@if(count($deposits) > 0)
    <hr>
    <h4>Depositos:</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deposits as $deposit)
                <tr>
                    <td>
                        <input type="checkbox" class="deposits" name="deposits[]" value="{{ $deposit->id }}" data-total="{{ $deposit->total }}">
                    </td>
                    <td>{{ $deposit->created_at }}</td>
                    <td>{{ $deposit->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif