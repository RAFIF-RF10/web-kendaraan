<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid field', 'errors' => $validator->errors()]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['message' => 'Berhasil buat akun baru', 'data' => $user, 'token' => $token], 200);
        return redirect()->intended('/');

    }

    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid field', 'errors' => $validator->errors()]);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Email or password incorrect'], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json(['data' => $user, 'token' => $token], 200);
        return redirect()->intended('admin/dashboard')->with('success', 'Selamat Datang');
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user->currentAccessToken()) {
            $user->tokens()->delete();
            return response()->json(['message' => 'Logged out successfully'], 200);
        }

        return response()->json(['message' => 'No token found for this user'], 404);
    }
}
