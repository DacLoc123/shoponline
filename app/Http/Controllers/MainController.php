<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductClientService;
use App\Http\Services\SliderService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $slider;
    protected $product;
    public function __construct(SliderService $slider,  ProductClientService $product)
    {
        $this->slider = $slider;
        $this->product = $product;
    }

    public function index()
    {
        return view('home', [
            'title' => 'Shop thời trang',
            'sliders' => $this->slider->show(),
            'products_sale' => $this->product->get('sale'),
            'products_new' => $this->product->get('new')
        ]);
    }
}
