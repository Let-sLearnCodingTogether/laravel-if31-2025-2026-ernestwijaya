<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $validated = $request -> safe()->all();
            if (!Auth::attempt($validated)){
                return response()->json([
                    'message' => "Email Atau Password Salah",
                    'date' => null
                ], 401);
            }

            $user = $request-> user();
            $token = $user->create_token('laravel_api', ['*'])-> plainTextToken;
            
        } catch (Exception $e) {
            return response()->json([
                    'message' => $e ->getMessage(),
                    'date' => null
                ], 201);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $validated = $request->safe()->all();
            $passwordhash = Hash::make($validated['password']);
            $validated['password'] = $passwordhash;
            $response = User::create($validated);

            if($response) {
                return response()->json([
                    'message' => 'register berhasil',
                    'date' => null
                ], 201);
            }
        } catch (Exception $e) {
            return response()->json([
                    'message' => $e ->getMessage(),
                    'date' => null
                ], 201);
        }
    }

    public function logout()
    {
        try {

        } catch (Exception $e) {
            //
        }
    }
}
