<?php


namespace App\Helpers;


class Helper
{
    public static function getParent($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= ' <option value="' . $menu->id . '">' . $char . ' ' . $menu->name . '</option> ';
                unset($menus[$key]);
                $html .= self::getParent($menus, $menu->id, $char . '━');
            }
        }
        return $html;
    }

    public static function getParent_edit($menus, $id, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= ' <option value="' . $menu->id . '" ' . self::selected($menu->id, $id) .
                    ' >' . $char . $menu->name . '</option> ';
                unset($menus[$key]);
                $html .= self::getParent_edit($menus, $id, $menu->id, $char . '━');
            }
        }
//        foreach ($menus as $menu) {
//            $html .= ' <option value="' . $menu->id . '" ' . self::selected($menu->id, $parent_id) . ' > ' . $menu->name . '</option>';
//        }
        return $html;
    }

    public static function selected($id, $parent)
    {
        if ($id == $parent) {
            return 'selected';
        } else {
            return '';
        }
    }

    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                <tr>
                <td style="width: 50px">' . $menu->id . '</td>
                <td>' . $char . ' ' . $menu->name . '</td>
                <td>' . self::active($menu->active) . '</td>
                <td>' . $menu->updated_at . '</td>
                <td>
                    <a class = "btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a  href="#" class = "btn btn-danger btn-sm"
                        onclick="removeRow(' . $menu->id . ', \'/admin/menus/destroy\')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
                ';

                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id, $char . '━');
            }
        }
        return $html;
    }

    public static function active($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger">No</span>'
            : '<span class="btn btn-success">Yes</span>';
    }
}
