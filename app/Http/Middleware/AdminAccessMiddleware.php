<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\GerantAdmin;

use Illuminate\Support\Facades\Auth;

class AdminAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        if (Auth::guard('gerants')->check() && (Auth::guard('gerants')->user()->isAdmin() || Auth::guard('gerants')->user()->isGerant())) {
          
            return $next($request);
        }
 
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    
    }
}
