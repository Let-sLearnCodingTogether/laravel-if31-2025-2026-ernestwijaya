<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Exception;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {

        } catch (Exception $e) {
            //
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $validated = $request->safe()->all();
            $passwordhash = Hash::make($validated['password']);
            $validated['password'] = $psswordhash;
            $response = User::create($validated);

            if($response) {
                return response()->json([
                    'message' => 'register berhasil',
                    'date' => null
                ], 201);
            }
        } catch (Exception $e) {
            //
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
