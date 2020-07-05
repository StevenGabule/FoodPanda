<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
   use AuthenticatesUsers;
    public function attemptLogin(Request $request)
    {
        $token = $this->guard()->attempt($this->credentials($request));
        if (!$token) {
            return false;
        }

        // check if the user is verify his email

        // set the user's token
        $this->guard()->setToken($token);
        return true;
    }

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);
        // get the token from the authentication guard(jwt)
        $token = (string)$this->guard()->getToken();

        // extract the expiry date of the token
        $expiration = $this->guard()->getPayload()->get('exp');

        return response()->json([
            'token' =>$token,
            'token_type' => 'bearer',
            'expires_in' => $expiration,
            'user' => auth()->user()->name
        ]);
    }

    protected function sendFailedLoginResponse()
    {
        $user = $this->guard()->user();
        if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {
            return response()->json(['errors' => [
                'verification' => 'You need to verify your email account'
            ]], 422);
        }
        throw ValidationException::withMessages([
            $this->username() => 'Invalid Credentials'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'logged out successfully']);
    }
}
