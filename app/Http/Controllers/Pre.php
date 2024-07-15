<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prepresult;
use Illuminate\Support\Facades\Auth;

class Pre extends Controller
{
    public function prep(Request $request)
    {
        // Retrieve the current authenticated teacher
        $teacher = Auth::guard('teachers')->user();

        // Validate the request data
        $request->validate([
            'student_id' => 'required|array',
            'student_id.*' => 'required|integer|exists:students,id',
            'subject' => 'required|array',
            'subject.*' => 'required|integer|exists:subjects,id',
            'term1' => 'required|array',
            'term1.*' => 'required|integer|min:0|max:10',
            'term2' => 'required|array',
            'term2.*' => 'required|integer|min:0|max:20',
            'exam' => 'required|array',
            'exam.*' => 'required|integer|min:0|max:70',
        ]);

        // Loop through each student's data and save to the database
        foreach ($request->student_id as $key => $student_id) {
            Prepresult::updateOrCreate([
                'student_id' => $student_id,
                'subject_id' => $request->subject[$key],
                'teacher_id' => $teacher->id,
                'term1' => $request->term1[$key],
                'term2' => $request->term2[$key],
                'exam' => $request->exam[$key],
            ]);
        }

        // Flash success message to session
        session()->flash('message', 'Subjects added successfully.');

        // Redirect to a specific route or back
        return redirect()->route('tdashboard');
    }
}
