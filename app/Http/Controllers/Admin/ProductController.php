<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\MenuService;
use App\Http\Services\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $menu;
    protected $productService;

    public function __construct(ProductAdminService $productService, MenuService $menu)
    {
        $this->productService = $productService;
        $this->menu = $menu;
    }


    public function index()
    {
        return view('admin.product.list', [
            'title' => "Danh Sách Sản Phẩm",
            'products' => $this->productService->get()
        ]);
    }


    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Thêm Sản Phẩm',
            'menus' => $this->productService->getMenu()
        ]);
    }

    public function store(Request $request)
    {
        $product = $this->productService->insert($request);

        return redirect()->back();

    }


    public function show(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Chỉnh sửa sản phẩm',
            'product' => $product,
            'menus' => $this->menu->getParent()
        ]);
    }

    public function update(Product $product, Request $request)
    {
        $this->productService->update($request, $product);

        return redirect('/admin/products/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa Thành Công Sản Phẩm'
            ]);
        }
        return response()->json(['error' => true]);
    }
}
