<?php

namespace App\Http\Controllers\Api\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AccountResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $model;

    use HttpResponses;
    use Access;

    public function __construct(Account $model) {
        $this->model = $model;
    }

    public function index(Request $request) {
        $accounts = $this->model->query()->with(['role'])->paginate($request->per_page ?? 12);

        // Kiểm tra nếu không có tài khoản nào
        if($accounts->isEmpty()) {
            return $this->error(null, 'No accounts found', 404);
        }

        return $this->success(AccountResource::collection($accounts)); 
    }

    public function show($id) {
        $account = $this->model->with(['role'])->find($id);

        // Kiểm tra nếu không tìm thấy tài khoản
        if(!$account) {
            return $this->error(null, 'Account not found', 404);
        }

        return $this->success(new AccountResource($account));
    }

    public function store(RegisterRequest $request) {
        // kiểm tra tài khoản đã tồn tại chưa
        $account = $this->model->where('email', $request->email)->orWhere('phone_number', $request->phone_number)->first();

        if($account) {
            return response()->json([
                'message' => 'Account already exists'
            ], 400);
        }

        $account = $this->model->create($request->all());

        return response()->json($account, 201);
    }

    public function update(Request $request, $id) {
        $account = $this->model->find($id);

        // Kiểm tra nếu không tìm thấy tài khoản
        if(!$account) {
            return response()->json([
                'message' => 'Account not found'
            ], 404);
        }

        $account->update($request->all());

        return response()->json($account);
    }

    public function destroy($id) {
        $account = $this->model->find($id);

        // Kiểm tra nếu không tìm thấy tài khoản
        if(!$account) {
            return response()->json([
                'message' => 'Account not found'
            ], 404);
        }

        $account->delete();

        return response()->json([
            'message' => 'Account deleted successfully'
        ]);
    }
}
