<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show()
    {
        $user = User::find(1);
        return view('login', compact('user'));
    }

    public function make(LoginRequest $request)
    {
        $credentials = $request->validated();
        Auth::attempt($credentials);
        return $this->show();
    }

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

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
