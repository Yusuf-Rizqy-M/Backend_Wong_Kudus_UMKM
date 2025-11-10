<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\User;

class UserController extends Controller
{
    // === LOGIN (SUDAH ADA) ===
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'remember' => 'nullable|boolean',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors(),
            ], 422);
        }
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => false,
                'message' => 'Email atau password salah',
                'data' => null,
            ], 401);
        }
        $user = Auth::user();
        $expiresAt = Carbon::now()->addMonth(1);
        $token = $user->createToken('auth_token', ['*'], $expiresAt)->plainTextToken;
        $baseUrl = $user->foto_profil ? url('/storage/' . $user->foto_profil) : null;

        return response()->json([
            'status' => true,
            'message' => 'Login berhasil',
            'data' => [
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'foto_profil' => $baseUrl,
                ],
                'expired_at' => $expiresAt->toDateTimeString(),
            ],
        ], 200);
    }

    // === LOGOUT (SUDAH ADA) ===
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Logout berhasil',
        ], 200);
    }

    // === INFO PROFIL (BARU) ===
    public function info(Request $request)
    {
        $user = $request->user();
        $baseUrl = $user->foto_profil ? url('/storage/' . $user->foto_profil) : null;

        return response()->json([
            'status' => true,
            'message' => 'Data profil berhasil diambil',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'foto_profil' => $baseUrl,
            ],
        ], 200);
    }

    // === UPDATE PROFIL (BARU) ===
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $rules = [
            'name' => 'required|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // 5MB
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors(),
            ], 422);
        }

        // Update nama
        $user->name = $request->name;

        // Update foto profil
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($user->foto_profil) {
                Storage::delete('public/' . $user->foto_profil);
            }

            // Simpan foto baru
            $path = $request->file('foto_profil')->store('profile', 'public');
            $user->foto_profil = $path;
        }

        $user->save();

        $baseUrl = $user->foto_profil ? url('/storage/' . $user->foto_profil) : null;

        return response()->json([
            'status' => true,
            'message' => 'Profil berhasil diperbarui',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'foto_profil' => $baseUrl,
            ],
        ], 200);
    }
}