<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (! $user || ! $user->role) {
            return response()->json([
                'status' => 'error',
                'message' => 'Akses ditolak. Pengguna tidak memiliki otorisasi.'
            ], 401);
        }

        if (! in_array($user->role->nama_role, $roles)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak memiliki hak akses untuk fitur ini.'
            ], 403);
        }

        return $next($request);
    }
}