<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::with(['role', 'dosen', 'mahasiswa'])
            ->where('username', $request->username)
            ->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['Kredensial login yang Anda masukkan salah.'],
            ]);
        }

        if (! $user->is_active) {
            return response()->json([
                'status' => 'error',
                'message' => 'Akun Anda sedang dinonaktifkan. Hubungi Admin Prodi.'
            ], 403);
        }

        // Hapus token lama jika ada
        $user->tokens()->delete();

        // Buat token Sanctum baru
        $token = $user->createToken('auth_token_obe')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil.',
            'data' => [
                'token' => $token,
                'token_type' => 'Bearer',
                'user' => new UserResource($user),
            ]
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        $user = $request->user()->load(['role', 'dosen', 'mahasiswa']);

        return response()->json([
            'status' => 'success',
            'data' => new UserResource($user),
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout berhasil.',
        ]);
    }
}