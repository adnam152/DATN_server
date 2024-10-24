<?php

namespace App\Http\Controllers\Api\Wishlists;

use App\Http\Controllers\Controller;
use App\Http\Traits\HttpResponses;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishlistsController extends Controller
{
    use HttpResponses;
    protected $model;

    public function __construct()
    {
        $this->model = new WishList();
    }
    public function getAllWishlists(Request $request)
    {
        $wishlists = $this->model->where('account_id', $request->user()->id)->get();
        if($wishlists->isEmpty()) {
            return $this->error($request, 'Danh sách yêu thích của bạn đang trống', 404);
        }
        return $this->success($wishlists, 'Danh sách yêu thích lấy thành công');
    }
}
