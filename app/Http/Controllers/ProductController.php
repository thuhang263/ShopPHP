<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }
    //tất cả sp
    public function index($id='',$slug='')
    {
        $product = $this->productService-> show($id);
        return view('products.content',[
            'title'=>$product->name,
            'product'=>$product
        ]);

    }
    //chi tiết 1 sản phẩm
    public function show_detail($id = '', $slug = '')
    {
    $product = $this->productService->show($id);
    return view('products.product_detail', [
        'title' => $product->name,
        'product' => $product
    ]);
    }

}
