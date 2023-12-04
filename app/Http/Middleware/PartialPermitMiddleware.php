<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PartialPermissionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->name !== 'admin') {
            // Allow access for users who are not admins
            return $next($request);
        }

        return redirect('/message')->with('message', 'You do not have permission to access this page');
    }
}

?>