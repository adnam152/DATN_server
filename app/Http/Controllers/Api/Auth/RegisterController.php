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

            $account = Account::create($input);

            $success['token'] = $account->createToken('authToken')->plainTextToken;
            $success['full_name'] = $account->full_name;

            return $this->success($success, AuthConstants::REGISTER);
        } catch (Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage());
            return $this->error($e->getMessage(), AuthConstants::UNREGISTER);
        }
    }
}
