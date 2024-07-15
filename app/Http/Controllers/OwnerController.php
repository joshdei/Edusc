<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleChangeRequest;
use App\Models\School;

class OwnerController extends Controller
{
    public function showProfile(Request $request)
    {
        return view('profile');
    }

}
