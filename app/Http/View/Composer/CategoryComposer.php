<?php


namespace App\Http\View\Composer;


use App\Models\Menu;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $menus = Menu::select('id', 'name', 'parent_id')->where('active', 1)->orderByDesc('id')->get();
        $view->with('menus', $menus);
    }
}
