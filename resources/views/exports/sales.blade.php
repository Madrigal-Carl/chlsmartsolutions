<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Total Amount</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->date }}</td>
                <td>{{ ucfirst($order->type) }}</td>
                <td>{{ $order->total_amount }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
