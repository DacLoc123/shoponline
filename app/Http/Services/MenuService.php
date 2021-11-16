<?php


namespace App\Http\Services;


use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent()
    {
        return Menu::where('active', 1)->get();
    }

    public function getAll()
    {
        return Menu::orderby('id')->get();
    }

    public function create($request)
    {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date_default_timezone_get();
            Menu::create([
                'name' => $request->input('name'),
                'parent_id' => $request->input('parent_id'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'slug' => Str::slug((string)$request->input('name'), '-'),
                'active' => $request->input('active'),
                'created_at' => $date,
                'updated_at' => $date
            ]);
            Session::flash('success', 'Thêm Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Danh Mục Lỗi: ' . $err->getMessage());
            return false;
        }
        return true;
    }


    public function update($request, $menu): bool
    {
        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = $request->input('parent_id');
        }
        $menu->name = $request->input('name');

        $menu->description = $request->input('description');
        $menu->slug = Str::slug((string)$request->input('name'), '-');
        $menu->content = $request->input('content');
        $menu->active = $request->input('active');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date_default_timezone_get();
        $menu->updated_at = $date;

        $menu->content = $request->input('content');
        $menu->active = $request->input('active');

        $menu->save();

        Session::flash('success', 'Cập Nhập Danh Mục Thành Công');
        return true;
    }

    public function destroy($request)
    {

        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function show()
    {
        return Menu::where('active', 1)->orderBy('id')->get();
    }
}
