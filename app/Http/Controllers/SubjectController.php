<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function addSubject(Request $request)
    {
        // Retrieve the current authenticated teacher
        $teacher = Auth::guard('teachers')->user();

        // Validate the request data
        $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        // Create the subject record
        Subject::create([
            'subject' => $request->subject,
            'teacher_id' => $teacher->id,
        ]);

        // Flash success message to session
        session()->flash('success', 'Subject added successfully.');

        // Redirect to a specific route or back
        return redirect()->route('tdashboard'); // Change 'dashboard' to your desired route name
    }
}
