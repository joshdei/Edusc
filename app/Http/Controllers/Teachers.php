<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use Illuminate\Http\Request;

class Teachers extends Controller
{
    public function loginTeacher(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

  
        if (Auth::guard('teachers')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('tdashboard'));
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
}
