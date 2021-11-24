<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductClientService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductClientService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
        $productsImage = $this->productService->images($id);

        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore,
            'productImages' => $productsImage
        ]);
    }
}
