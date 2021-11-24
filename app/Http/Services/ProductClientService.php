<?php


namespace App\Http\Services;


use App\Models\Product;
use App\Models\ProductImage;

class ProductClientService
{
    public function get($value)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("m");
        $products = '';
        if ($value == 'sale') {
            $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb', 'quantity')
                ->where('active', 1)->inRandomOrder()->whereNotNull('price_sale')->take(7)->get();
        } elseif ($value == 'new') {
            $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb', 'quantity')
                ->where('active', 1)->inRandomOrder()->whereMonth('created_at', $date)->take(7)->get();
        }
        return $products;
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }

    public function images($id)
    {
        return ProductImage::select('image', 'image_name')->where('product_id', $id)->inRandomOrder()->take(3)->get();
    }
}
