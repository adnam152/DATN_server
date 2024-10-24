<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\Controller;
use App\Http\Traits\HttpResponses;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use HttpResponses;
    protected $cartModel;
    protected $cartItemsModel;

    public function __construct()
    {
        $this->cartModel = new Cart();
        $this->cartItemsModel = new CartItem();
    }

    public function index(Request $request)
    {
        // dd($this->model);
        $carts = $this->cartModel->where('account_id', $request->user()->id)->get();
        if ($carts->isEmpty()) {
            return $this->error($request, 'Giỏ hàng của bạn đang trống', 404);
        }
        return $this->success($carts, 'Giỏ hàng lấy thành công');
    }
    public function store(Request $request)
    {
        // kiểm tra đã có giỏ hàng thì không tạo nữa
        $cart = $this->cartModel->where('account_id', $request->user()->id)->first();

        if(!$cart) {
            $cart = $this->cartModel->create([
                'account_id' => $request->user()->id,
            ]);
        }

        if(!$cart) {
            return $this->error($request, 'Không thể tạo giỏ hàng', 500);
        }
        
        // kiểm tra đã có biến thể thì sửa số lượng biến thể trong cartItem
        $cartItem = $this->cartItemsModel->where('cart_id', $cart->id)->where('variant_id', $request->variant_id)->first();
        if($cartItem) {
            $cartItem->update([
                'quantity' => $request->quantity,
            ]);
            return $this->success($cart, 'Cập nhật số lượng sản phẩm trong giỏ hàng thành công');
        }

        $cartItem = $this->cartItemsModel->create([
            'cart_id' => $cart->id,
            'variant_id' => $request->variant_id,
            'quantity' => $request->quantity,
        ]);
      
        if(!$cartItem) {
            return $this->error($request, 'Không thể thêm sản phẩm vào giỏ hàng', 500);
        }
        

        return $this->success($cart, 'Thêm sản phẩm vào giỏ hàng thành công');
    }
}
