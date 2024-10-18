<?php

namespace App\Http\Controllers\Api\Auth;

use App\Constants\AuthConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Traits\HttpResponses;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use HttpResponses;
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('phone_number', 'password');
            if (auth()->attempt($credentials)) {
                $account = auth()->user();
                $token = $account->createToken('authToken')->plainTextToken;
                $cookie = cookie('jwt_auth', $token, 60 * 24, null, null, true, true, false, 'None');
                return $this
                    ->success($account, AuthConstants::LOGIN)
                    ->cookie($cookie);
            } else {
                return $this->error(null, AuthConstants::VALIDATION);
            }
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage(), 401);
        }
    }
    public function logout()
    {
        try {
            // delete the token
            auth()->user()->tokens()->delete();
            $cookie = cookie('jwt_auth', '', 0, null, null, true, true, false, 'None');
            return $this
                ->success(null, AuthConstants::LOGOUT, 204)
                ->cookie($cookie);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), AuthConstants::LOGOUT_FAILED);
        }
    }
    public function check()
    {
        return $this->success(auth()->user());
    }
}
