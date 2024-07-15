<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use BaconQrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\School;
use App\Models\RoleChangeRequest;
class Backdoor extends Controller
{


public function process(Request $request)
{
    if (Auth::check()) {
        $userid = Auth::user()->id;
        $hasSchool = School::where('userid', $userid)->exists();
        $pendingRequest = RoleChangeRequest::where('userid', $userid)->where('status', 'pending')->first();
        if ($pendingRequest) {
            return view('role-change-pending', ['requested_role' => $pendingRequest->requested_role]);
        }
        $currentRoleRequest = RoleChangeRequest::where('userid', $userid)->where('status', 'approved')->first();
        if ($currentRoleRequest && $currentRoleRequest->requested_role == 'owner') {
            return view('dashboard');
        } elseif (!$hasSchool) {
            return view('addschool');
        } else {
            return view('dashbboard');
        }
    } else {
        return view('board');
    }
}


        // Method to save school information
        public function saveSchool(Request $request)
        {
            $request->validate([
                'school_name' => 'required|string|max:255',
                'school_motto' => 'nullable|string|max:255',
                'school_logo' => 'nullable|image|max:1024',
                'school_address' => 'required|string|max:255',
                'school_city' => 'required|string|max:255',
                'school_state' => 'required|string|max:255',
            ]);
    
            $school_name = $request->input('school_name');
            $school_motto = $request->input('school_motto');
            $school_address = $request->input('school_address');
            $school_city = $request->input('school_city');
            $school_state = $request->input('school_state');
    
            $current_user = Auth::id();
    
            $existingSchool = School::where('userid', $current_user)->first();
            if ($existingSchool) {
                session()->flash('error', 'You already have school information saved.');
                return redirect()->route('dashboard');
            }
    
            $school = new School();
            $school->userid = $current_user;
            $school->school_name = $school_name;
            $school->school_motto = $school_motto;
            $school->school_address = $school_address;
            $school->school_city = $school_city;
            $school->school_state = $school_state;
    
            if ($request->hasFile('school_logo')) {
                $filePath = $request->file('school_logo')->store('logos', 'public');
                $school->school_logo = $filePath;
            }
    
            $school->save();
    
            return redirect()->route('dashboard')->with('success', 'School information saved successfully.');
        }
    
        // Method to save student information
        public function saveStudent(Request $request)
        {
            $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'gender' => 'required|in:male,female',
            ]);
    
            Students::create([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'gender' => $request->input('gender'),
            ]);
    
            session()->flash('success', 'Student added successfully.');
            return redirect()->route('dashboard');
        }
    
        // Method to view all teachers
        public function viewTeachers()
        {
            $teachers = Teacher::all();
            return view('livewire.view-teachers', ['teachers' => $teachers]);
        }
    
        // Method to delete a teacher
        public function deleteTeacher($teacherId)
        {
            $teacher = Teacher::findOrFail($teacherId);
            $teacher->delete();
    
            session()->flash('message', 'Teacher deleted successfully.');
            return redirect()->route('view_teachers');
        }
    
        // Method to save teacher information
        public function saveTeacher(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'class' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|string|max:255',
            ]);
    
            Teacher::create([
                'userid' => Auth::id(),
                'name' => $request->input('name'),
                'class' => $request->input('class'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
    
            session()->flash('success', 'Teacher information saved successfully.');
            return redirect()->route('view_teacher');
        }


        public function addTeacherForm()
    {
        return view('school_owner.add_teacher');
    }

    public function addTeacher(Request $request)
    {
        // Logic to add a teacher
    }

    public function manageTeachers()
    {
        return view('school_owner.manage_teachers');
    }

    public function addStudentForm()
    {
        return view('school_owner.add_student');
    }

    public function addStudent(Request $request)
    {
        // Logic to add a student
    }

    public function manageStudents()
    {
        return view('school_owner.manage_students');
    }

    public function viewStudentProfiles()
    {
        return view('school_owner.view_student_profiles');
    }

    public function createClassForm()
    {
        return view('school_owner.create_class');
    }

    public function createClass(Request $request)
    {
        // Logic to create a class
    }

    public function manageClasses()
    {
        return view('school_owner.manage_classes');
    }

    public function viewReports()
    {
        return view('school_owner.view_reports');
    }

    public function attendanceReports()
    {
        return view('school_owner.attendance_reports');
    }

    public function editSchoolInfoForm()
    {
        return view('school_owner.edit_school_info');
    }

    public function editSchoolInfo(Request $request)
    {
        // Logic to edit school information
    }

    public function managePoliciesForm()
    {
        return view('school_owner.manage_policies');
    }

    public function managePolicies(Request $request)
    {
        // Logic to manage school policies
    }

    public function manageUserRolesForm()
    {
        return view('school_owner.manage_user_roles');
    }

    public function manageUserRoles(Request $request)
    {
        // Logic to manage user roles
    }

    public function deactivateUsersForm()
    {
        return view('school_owner.deactivate_users');
    }

    public function deactivateUsers(Request $request)
    {
        // Logic to deactivate users
    }

    public function createEventForm()
    {
        return view('school_owner.create_event');
    }

    public function createEvent(Request $request)
    {
        // Logic to create an event
    }

    public function manageEvents()
    {
        return view('school_owner.manage_events');
    }

    public function eventCalendar()
    {
        return view('school_owner.event_calendar');
    }

    public function sendNotificationsForm()
    {
        return view('school_owner.send_notifications');
    }

    public function sendNotifications(Request $request)
    {
        // Logic to send notifications
    }

    public function manageMessages()
    {
        return view('school_owner.manage_messages');
    }

    }
    