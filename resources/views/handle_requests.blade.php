
<div class="container">
    <h1>Pending Role Change Requests</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Requested Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->userid }}</td>
                <td>{{ $request->requested_role }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    <a href="{{ route('approve-role-change', $request->id) }}" class="btn btn-success">Approve</a>
                    <a href="{{ route('reject-role-change', $request->id) }}" class="btn btn-danger">Reject</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

