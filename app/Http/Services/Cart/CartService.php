<?php

namespace App\Http\Services\Cart;

use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartService
{
    
    public function create($request)
    {
        $product_id = (int) $request->input('product_id');
        $qty = (int) $request->input('num-product', 1);

        $product = Product::select('id', 'name', 'price', 'price_sale', 'thumb', 'size', 'color')
            ->where('active', 1)
            ->where('id', $product_id)
            ->first();

        if (!$product) {
            return false;
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['qty'] += $qty;
        } else {
            $cart[$product_id] = [
                'id' => $product->id,
                'name' => $product->name,
                'thumb' => $product->thumb,
                'price' => $product->price,
                'price_sale' => $product->price_sale,
                'size' => $product->size,
                'color' => $product->color,
                'qty' => $qty,
            ];
        }

        Session::put('cart', $cart);
        return true;
    }

    public function getProduct()
    {
        return Session::get('cart', []);
    }

    public function getTotal()
    {
        $cart = Session::get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $price = $item['price_sale'] > 0 ? $item['price_sale'] : $item['price'];
            $total += $price * $item['qty'];
        }

        return $total;
    }

    public function remove($request)
    {
        $product_id = (int) $request->input('product_id');
        $cart = Session::get('cart', []);

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            Session::put('cart', $cart);
            return true;
        }

        return false;
    }

    public function clear()
    {
        Session::forget('cart');
    }
}
