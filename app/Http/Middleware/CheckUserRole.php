<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleChangeRequest;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/'); 
        }

        $roleChangeRequest = RoleChangeRequest::where('userid', $user->id)->first();

        if (!$roleChangeRequest || $roleChangeRequest->requested_role !== $role) {
            return redirect('/'); 
        }

        return $next($request);
    }
}
