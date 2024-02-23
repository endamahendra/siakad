<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckBagian
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$bagians
     */
    public function handle(Request $request, Closure $next, ...$bagians): Response
    {
        $user = Auth::user();

        if ($user && in_array($user->bagian, $bagians)) {
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}
