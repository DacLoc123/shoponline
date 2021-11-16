<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuFormRequest;
use App\Http\Services\MenuService;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục mới nhất',
            'menus' => $this->menuService->getAll()
        ]);
    }


    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(MenuFormRequest $request)
    {
        $this->menuService->create($request);
        return redirect()->back();
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function update(Menu $menu, MenuFormRequest $request)
    {
        $this->menuService->update($request, $menu);
        return redirect('/admin/menus/list');
    }


    /*
     * Xoá danh mục
     */
    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }
        return response()->json([
            'error' => true

        ]);
    }
}
