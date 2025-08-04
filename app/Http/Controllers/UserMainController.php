<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
class UserMainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider,MenuService $menu, ProductService $product)

    {

        $this ->slider = $slider;
        $this ->menu = $menu;
        $this ->product = $product;
    }
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalItems = array_sum(array_column($cart, 'qty'));
        return view('home',[
            'title'=>'Shop thu hang',
            'sliders'=>$this -> slider ->show(),
            'menus'=>$this->menu->show(),
            'products'=>$this->product->get(),
            'totalItems' => $totalItems
        ]);
    }
    public function loadProduct(Request $request) {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) !== 0) {
            $html = view('products.list', ['products' => $result])->render();
            return response()->json(['html' => $html]);
        }
        return response()->json(['html' => '']);
    }
    



}
