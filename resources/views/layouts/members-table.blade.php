<table>
    <tr>
        <th>Receipt ID</th>
        <th>Name</th>
        <th>Committee</th>
        <th>Country</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Amount Paid</th>
        <th>Payment Type</th>
        <th>Townscript ID</th>
        <th>OC Member Name</th>
    </tr>
    @foreach( $members as $member )
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->committee }}</td>
            <td>{{ $member->country }}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->amount_paid }}</td>
            <td>{{ $member->payment_type }}</td>
            <td>{{ $member->townscript_id }}</td>
            <td>{{ $member->oc_member_name }}</td>
        </tr>
    @endforeach
</table>