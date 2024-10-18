<?php

namespace App\Http\Controllers\Api\Auth;

use App\Constants\AuthConstants;
use App\Events\AccountRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Traits\HttpResponses;
use App\Models\Account;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    use HttpResponses;
    public function __invoke(RegisterRequest $request)
    {

        try {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['role_id'] = 2;

            $account = Account::create($input)->refresh();
            $token = $account->createToken('authToken')->plainTextToken;
            $cookie = cookie('jwt_auth', $token, 60 * 24, null, null, true, true, false, 'None');

            return $this
                ->success($account, AuthConstants::REGISTER, 201)
                ->cookie($cookie);
        } catch (Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage());
            return $this->error(null, $e->getMessage());
        }
    }
}
