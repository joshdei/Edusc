<!-- Sidebar -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        @php
            use App\Models\RoleChangeRequest;

            $userid = Auth::user()->id;
            $currentRoleRequest = RoleChangeRequest::where('userid', $userid)
                                  ->where('status', 'approved')
                                  ->first();
        @endphp

        @if($currentRoleRequest)
            @if($currentRoleRequest->requested_role == 'owner')
           
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('add-teachers') }}">
                        <i class="bi bi-person-plus"></i>
                        <span>Add Teachers</span>
                    </a>
                </li><!-- End Add Teachers Nav -->
               
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('manage-teachers') }}">
                        <i class="bi bi-pencil-square"></i>
                        <span>Manage Teachers</span>
                    </a>
                </li><!-- End Manage Teachers Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('add-students') }}">
                        <i class="bi bi-person-plus"></i>
                        <span>Add Students</span>
                    </a>
                </li><!-- End Add Students Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('manage-students') }}">
                        <i class="bi bi-pencil-square"></i>
                        <span>Manage Students</span>
                    </a>
                </li><!-- End Manage Students Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('view-student-profiles') }}">
                        <i class="bi bi-file-person"></i>
                        <span>View Student Profiles</span>
                    </a>
                </li><!-- End View Student Profiles Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('create-classes') }}">
                        <i class="bi bi-plus-square"></i>
                        <span>Create Classes</span>
                    </a>
                </li><!-- End Create Classes Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('manage-classes') }}">
                        <i class="bi bi-pencil-square"></i>
                        <span>Manage Classes</span>
                    </a>
                </li><!-- End Manage Classes Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('view-reports') }}">
                        <i class="bi bi-bar-chart"></i>
                        <span>View Reports</span>
                    </a>
                </li><!-- End View Reports Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('attendance-reports') }}">
                        <i class="bi bi-calendar-check"></i>
                        <span>Attendance Reports</span>
                    </a>
                </li><!-- End Attendance Reports Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('edit-school-info') }}">
                        <i class="bi bi-building"></i>
                        <span>Edit School Info</span>
                    </a>
                </li><!-- End Edit School Info Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('manage-policies') }}">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Manage Policies</span>
                    </a>
                </li><!-- End Manage Policies Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('manage-user-roles') }}">
                        <i class="bi bi-people"></i>
                        <span>Manage User Roles</span>
                    </a>
                </li><!-- End Manage User Roles Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('deactivate-users') }}">
                        <i class="bi bi-x-circle"></i>
                        <span>Deactivate Users</span>
                    </a>
                </li><!-- End Deactivate Users Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('create-events') }}">
                        <i class="bi bi-calendar-plus"></i>
                        <span>Create Events</span>
                    </a>
                </li><!-- End Create Events Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('manage-events') }}">
                        <i class="bi bi-pencil-square"></i>
                        <span>Manage Events</span>
                    </a>
                </li><!-- End Manage Events Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('event-calendar') }}">
                        <i class="bi bi-calendar"></i>
                        <span>Event Calendar</span>
                    </a>
                </li><!-- End Event Calendar Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('send-notifications') }}">
                        <i class="bi bi-bell"></i>
                        <span>Send Notifications</span>
                    </a>
                </li><!-- End Send Notifications Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('manage-messages') }}">
                        <i class="bi bi-chat-dots"></i>
                        <span>Manage Messages</span>
                    </a>
                </li><!-- End Manage Messages Nav -->

            @elseif($currentRoleRequest->requested_role == 'teacher')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('teacher-dashboard') }}">
                        <i class="bi bi-house-door"></i>
                        <span>Teacher Dashboard</span>
                    </a>
                </li><!-- End Teacher Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('teacher-classes') }}">
                        <i class="bi bi-journal-bookmark"></i>
                        <span>Manage Classes</span>
                    </a>
                </li><!-- End Manage Classes Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('teacher-students') }}">
                        <i class="bi bi-people"></i>
                        <span>Manage Students</span>
                    </a>
                </li><!-- End Manage Students Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('teacher-reports') }}">
                        <i class="bi bi-file-earmark"></i>
                        <span>View Reports</span>
                    </a>
                </li><!-- End View Reports Nav -->

            @elseif($currentRoleRequest->requested_role == 'user')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user-dashboard') }}">
                        <i class="bi bi-house-door"></i>
                        <span>User Dashboard</span>
                    </a>
                </li><!-- End User Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user-classes') }}">
                        <i class="bi bi-journal-bookmark"></i>
                        <span>User Classes</span>
                    </a>
                </li><!-- End User Classes Nav -->
            @endif
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('request-role-change-form') }}">
                <i class="bi bi-person-lines-fill"></i>
                <span>Request Role Change</span>
            </a>
        </li><!-- End Role Change Request Nav -->

    </ul>
</aside><!-- End Sidebar -->
