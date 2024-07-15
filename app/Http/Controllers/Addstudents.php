<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddStudents extends Controller
{
    public function saveStudent(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
        ]);

        // Retrieve the current authenticated teacher using the 'teachers' guard
        $teacher = Auth::guard('teachers')->user();

        // Create the student record
        Students::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'teacher_id' => $teacher->id,  // Assign the teacher's ID
            'teacher_class' => $teacher->class,  // Assign the teacher's class
        ]);

        session()->flash('success', 'Student added successfully.');
        return redirect()->route('tdashboard');
    }
}
