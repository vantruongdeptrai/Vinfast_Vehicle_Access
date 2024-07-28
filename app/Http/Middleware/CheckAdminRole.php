<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {   
        if (!$request->user()) {
            return redirect()->route('login');
        }
    
        if ($request->user()->role !== $role) {
            if ($request->user()->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/basic_admin/dashboard');
            }
        }
        return $next($request);
        
    }
}
