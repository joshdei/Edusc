<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleChangeRequest;
use Illuminate\Support\Facades\Auth;

class RoleChangeController extends Controller
{
     // Display the form for requesting a role change
     public function showRequestForm()
     {
         return view('role_request');
     }
 
     // Handle the submission of the role change request
     public function submitRequest(Request $request)
     {
         $request->validate([
             'requested_role' => 'required|string|in:owner,teacher,user',
         ]);
 
         RoleChangeRequest::create([
             'userid' => Auth::id(),
             'requested_role' => $request->requested_role,
             'status' => 'pending',
         ]);
 
         return redirect()->back()->with('status', 'Role change request submitted successfully.');
     }
 
     // Display the list of pending role change requests
     public function handleRequests()
     {
         $requests = RoleChangeRequest::where('status', 'pending')->get();
         return view('handle_requests', compact('requests'));
     }
 
     // Approve a role change request
     public function approveRequest($id)
     {
         $request = RoleChangeRequest::findOrFail($id);
         $user = User::findOrFail($request->userid);
         $user->role = $request->requested_role;
         $user->save();
 
         $request->status = 'approved';
         $request->save();
 
         return redirect()->back()->with('status', 'Role change request approved.');
     }
 
     // Reject a role change request
     public function rejectRequest($id)
     {
         $request = RoleChangeRequest::findOrFail($id);
         $request->status = 'rejected';
         $request->save();
 
         return redirect()->back()->with('status', 'Role change request rejected.');
     }
}
