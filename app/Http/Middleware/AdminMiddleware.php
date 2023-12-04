<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->name === 'admin') {
            return $next($request);
        }

        return redirect('/message')->with('message', 'You are not an admin!');
    }
}
?>