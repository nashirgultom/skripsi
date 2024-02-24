<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $role = intval($role);

        if ($request->user()->role !== $role) {

            if ($request->user()->role == 1) {
                return redirect()->to(route('admin.dashboard.index'));
            } else if ($request->user()->role == 2) {
                return redirect()->to(route('dosen.dashboard.index'));
            } else if ($request->user()->role == 3) {
                return redirect()->to(route('student.dashboard.index'));
            } else {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
