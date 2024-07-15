
<div class="container">
    <form action="{{ route('request-role-change') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="requested_role">Requested Role:</label>
            <select name="requested_role" id="requested_role" class="form-control" required>
                <option value="owner">Owner</option>
                <option value="teacher">Teacher</option>
                <option value="user">User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit Request</button>
    </form>
</div>

