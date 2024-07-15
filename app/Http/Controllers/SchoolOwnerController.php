<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use App\Models\Teacher;
use App\Models\RoleChangeRequest;

class SchoolOwnerController extends Controller
{
    public function updatepassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $hasSchool = School::where('userid', $userid)->first();
            $pendingRequest = RoleChangeRequest::where('userid', $userid)->where('status', 'pending')->first();

            if ($pendingRequest) {
                return view('role-change-pending', ['requested_role' => $pendingRequest->requested_role]);
            }

            $currentRoleRequest = RoleChangeRequest::where('userid', $userid)->where('status', 'approved')->first();
            if ($currentRoleRequest && $currentRoleRequest->requested_role == 'owner') {
                if ($hasSchool) {
                    $request->validate([
                        'school_name' => 'required|string|max:255',
                        'school_motto' => 'nullable|string|max:255',
                        'school_address' => 'required|string|max:255',
                        'school_city' => 'required|string|max:255',
                        'school_state' => 'required|string|max:255',
                        'school_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $school = School::where('userid', Auth::id())->firstOrFail();
                    $school->school_name = $request->school_name;
                    $school->school_motto = $request->school_motto;
                    $school->school_address = $request->school_address;
                    $school->school_city = $request->school_city;
                    $school->school_state = $request->school_state;

                    if ($request->hasFile('school_logo')) {
                        $imageName = time() . '.' . $request->school_logo->extension();
                        $request->school_logo->move(public_path('logos'), $imageName);
                        $school->school_logo = $imageName;
                    }

                    $school->save();

                    return redirect()->route('profile')->with('success', 'School information updated successfully.');
                }
            }
        }

        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }

    public function addTeacherForm(){
        return view('owner.addteacher');
    }

    public function manageTeachers()
    {
        $teachers = Teacher::where('userid', Auth::user()->id)->get();
        return view('owner.manage-teachers', compact('teachers'));
    }

    public function deleteTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('manage-teachers')->with('success', 'Teacher deleted successfully.');
    }


    public function editTeacher($id)
{
    $teacher = Teacher::findOrFail($id);
    return view('owner.edit-teacher', compact('teacher'));
}

public function updateTeacher(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'class' => 'required|string|max:255',
        'email' => 'required|email|unique:teachers,email,' . $id,
    ]);

    $teacher = Teacher::findOrFail($id);
    $teacher->name = $request->name;
    $teacher->class = $request->class;
    $teacher->email = $request->email;

    if ($request->password) {
        $request->validate(['password' => 'string|min:8|confirmed']);
        $teacher->password = Hash::make($request->password);
    }

    $teacher->save();

    return redirect()->route('manage-teachers')->with('success', 'Teacher updated successfully.');
}



    public function storeTeacher(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new Teacher instance and save the data
        $teacher = new Teacher();
        $teacher->userid = Auth::user()->id;
        $teacher->name = $request->name;
        $teacher->class = $request->class;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->save();

        // Redirect to the profile route with a success message
        return redirect()->route('profile')->with('success', 'Teacher added successfully.');
    }

    public function addStudentForm(){
        return view('owner.addStudentForm');
    }
}
