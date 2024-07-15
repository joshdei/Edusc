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
class Profile extends Controller
{

    public function showProfile(Request $request)
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
    
            // Check if the user has a school associated
            $hasSchool = School::where('userid', $userid)->first();
    
            // Check if there's any pending role change request
            $pendingRequest = RoleChangeRequest::where('userid', $userid)->where('status', 'pending')->first();
    
            if ($pendingRequest) {
                // Return a view indicating that a role change request is pending
                return view('role-change-pending', ['requested_role' => $pendingRequest->requested_role]);
            }
    
            // Fetch the user's current role from RoleChangeRequest model
            $currentRoleRequest = RoleChangeRequest::where('userid', $userid)->where('status', 'approved')->first();
    
            if ($currentRoleRequest && $currentRoleRequest->requested_role == 'owner') {
                // Fetch the owner's information from the User model
                $owner = User::findOrFail($userid); // Assuming User model has id as primary key
    
                // Pass the owner's information to the view
                return view('owner.profile', compact('owner','hasSchool'));
            } elseif (!$hasSchool) {
                // If no school associated, redirect to add school view
                return view('addschool');
            } else {
                // Otherwise, default owner dashboard
                return view('dashboard');
            }
        } else {
            return view('board');
        }
    }
    

    // Update profile method as before
}