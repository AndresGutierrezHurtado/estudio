<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleWare
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userSession = Auth::user()->with('role')->first();
        $role = $userSession->role_id;

        if (in_array($role, $roles)) {
            return $next($request);
        }

        if ($role === 1) return redirect('/calls');
        if ($role === 2) return redirect('/admin/calls');
    }
}
