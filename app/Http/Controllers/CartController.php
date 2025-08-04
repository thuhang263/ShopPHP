<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Cart\CartService;
use Illuminate\Support\Facades\Session; 
class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    
    // Hiển thị giỏ hàng
    public function show()
    {
        $products = $this->cartService->getProduct();
            return view('products.list_cart', [
            'title' => 'Giỏ hàng của bạn',
            'products' => $products,
            'total' => $this->cartService->getTotal(),
            'cart' => Session::get('cart', [])  
        ]);


    }

    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request)
    {
        $result = $this->cartService->create($request);

        if ($result) {
            return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công');
        }

        return redirect()->back()->with('error', 'Thêm vào giỏ hàng thất bại');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove(Request $request)
    {
        $result = $this->cartService->remove($request);

        if ($result) {
            return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng');
        }

        return redirect()->back()->with('error', 'Không thể xóa sản phẩm');
    }
}
