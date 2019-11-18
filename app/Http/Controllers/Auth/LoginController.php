<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login;
use Illuminate\Http\Request;
use \Illuminate\Auth\Events\Login as LoginEvent;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Login $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->errorResponse('Invalid credentials.', 401);
        }

        event(new LoginEvent('jwt', auth()->user(), 'false'));

        return $this->dataResponse([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
