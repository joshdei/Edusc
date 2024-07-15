<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backdoor;
use App\Http\Controllers\RoleChangeController;
use App\Http\Controllers\SchoolOwnerController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\UserController;
use App\Models\School;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('process', [Backdoor::class, 'process'])->name('process');
    Route::get('dashboard', [Backdoor::class, 'process'])->name('dashboard');
    Route::post('saveSchool', [Backdoor::class, 'saveSchool'])->name('saveSchool');
    Route::get('profile', [Profile::class, 'showProfile'])->name('profile');

    Route::middleware(['auth'])->group(function () {

       
                // Routes for school owner
                Route::get('add-teachers', [SchoolOwnerController::class, 'addTeacherForm'])->name('add-teachers');
                Route::post('add-teachers', [SchoolOwnerController::class, 'storeTeacher'])->name('add-teachers');

                Route::put('/password/update', [SchoolOwnerController::class, 'updatepassword'])->name('password.update');
                Route::get('manage-teachers', [SchoolOwnerController::class, 'manageTeachers'])->name('manage-teachers');
                Route::put('/school/update', [SchoolOwnerController::class, 'update'])->name('school.update');
                Route::post('add-teacher', [SchoolOwnerController::class, 'storeTeacher'])->name('add-teacher');
                Route::get('edit-teacher/{id}', [SchoolOwnerController::class, 'editTeacher'])->name('edit-teacher');
                Route::put('update-teacher/{id}', [SchoolOwnerController::class, 'updateTeacher'])->name('update-teacher');
                Route::delete('delete-teacher/{id}', [SchoolOwnerController::class, 'deleteTeacher'])->name('delete-teacher');

                // Student management
                Route::get('add-students', [SchoolOwnerController::class, 'addStudentForm'])->name('add-students');
                Route::post('add-students', [SchoolOwnerController::class, 'addStudent']);
                Route::get('manage-students', [SchoolOwnerController::class, 'manageStudents'])->name('manage-students');
                Route::get('view-student-profiles', [SchoolOwnerController::class, 'viewStudentProfiles'])->name('view-student-profiles');

                // Class management
                Route::get('create-classes', [SchoolOwnerController::class, 'createClassForm'])->name('create-classes');
                Route::post('create-classes', [SchoolOwnerController::class, 'createClass']);
                Route::get('manage-classes', [SchoolOwnerController::class, 'manageClasses'])->name('manage-classes');

                // Reports
                Route::get('view-reports', [SchoolOwnerController::class, 'viewReports'])->name('view-reports');
                Route::get('attendance-reports', [SchoolOwnerController::class, 'attendanceReports'])->name('attendance-reports');

                // School information
                Route::get('edit-school-info', [SchoolOwnerController::class, 'editSchoolInfoForm'])->name('edit-school-info');
                Route::post('edit-school-info', [SchoolOwnerController::class, 'editSchoolInfo']);
                Route::get('manage-policies', [SchoolOwnerController::class, 'managePoliciesForm'])->name('manage-policies');
                Route::post('manage-policies', [SchoolOwnerController::class, 'managePolicies']);

                // User management
                Route::get('manage-user-roles', [SchoolOwnerController::class, 'manageUserRolesForm'])->name('manage-user-roles');
                Route::post('manage-user-roles', [SchoolOwnerController::class, 'manageUserRoles']);
                Route::get('deactivate-users', [SchoolOwnerController::class, 'deactivateUsersForm'])->name('deactivate-users');
                Route::post('deactivate-users', [SchoolOwnerController::class, 'deactivateUsers']);

                // Events
                Route::get('create-events', [SchoolOwnerController::class, 'createEventForm'])->name('create-events');
                Route::post('create-events', [SchoolOwnerController::class, 'createEvent']);
                Route::get('manage-events', [SchoolOwnerController::class, 'manageEvents'])->name('manage-events');
                Route::get('event-calendar', [SchoolOwnerController::class, 'eventCalendar'])->name('event-calendar');

                // Communication
                Route::get('send-notifications', [SchoolOwnerController::class, 'sendNotificationsForm'])->name('send-notifications');
                Route::post('send-notifications', [SchoolOwnerController::class, 'sendNotifications']);
                Route::get('manage-messages', [SchoolOwnerController::class, 'manageMessages'])->name('manage-messages');
      
    });

    // Routes for teachers
    Route::middleware(['role:teacher'])->group(function () {
        // Teacher-specific routes
        Route::get('teacher-dashboard', [TeacherController::class, 'dashboard'])->name('teacher-dashboard');
        Route::get('teacher-classes', [TeacherController::class, 'classes'])->name('teacher-classes');
        Route::post('add-grade', [TeacherController::class, 'addGrade'])->name('add-grade');
        // Add other teacher routes as needed
    });

    // Routes for normal users
    Route::middleware(['role:user'])->group(function () {
        // User-specific routes
        Route::get('user-dashboard', [UserController::class, 'dashboard'])->name('user-dashboard');
        Route::get('user-classes', [UserController::class, 'classes'])->name('user-classes');
        // Add other user routes as needed
    });

    // Role change requests
    Route::middleware(['role:owner'])->group(function () {
        Route::get('handle-role-requests', [RoleChangeController::class, 'handleRequests'])->name('handle-role-requests');
        Route::post('approve-role-request/{id}', [RoleChangeController::class, 'approveRequest'])->name('approve-role-request');
        Route::post('reject-role-request/{id}', [RoleChangeController::class, 'rejectRequest'])->name('reject-role-request');
    });

    Route::post('/submit-role-change', [RoleChangeController::class, 'submitRequest'])->name('submit-role-change');
    Route::get('request-role-change', [RoleChangeController::class, 'showRequestForm'])->name('request-role-change-form');
    Route::post('request-role-change', [RoleChangeController::class, 'submitRequest'])->name('request-role-change');
});
