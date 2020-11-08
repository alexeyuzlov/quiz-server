<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->tokens()->delete();
            $token = $user->createToken('user-token');

            return Response::success(array(
                'token' => $token->plainTextToken,
                'info' => $user
            ));
        }

        throw ValidationException::withMessages([
            '_form' => ['Incorrect credentials']
        ]);
    }
}
