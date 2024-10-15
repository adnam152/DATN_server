<?php

namespace App\Http\Controllers\Api\Auth;

use App\Constants\AuthConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Traits\HttpResponses;
use Exception;

class LoginController extends Controller
{
    use HttpResponses;
    public function login(AccountRequest $request)
    {

        try {
            $credentials = $request->only('phone_number', 'password');
            if (auth()->attempt($credentials)) {
                $token = auth()->user()->createToken('authToken')->plainTextToken;
                return $this->success(['token' => $token], AuthConstants::LOGIN);
            } else {
                return $this->error('Unauthorized', AuthConstants::VALIDATION);
            }
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), AuthConstants::LOGIN_FAILED);
        }
    }
}
