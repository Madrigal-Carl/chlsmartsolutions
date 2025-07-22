<table>
    <thead>
        <tr>
            <th>Category</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($expenses as $expense)
            <tr>
                <td>{{ $expense->date }}</td>
                <td>{{ ucfirst($expense->category) }}</td>
                <td>{{ $expense->amount }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
