<?php


namespace App\Helpers;


use Illuminate\Support\Str;

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

    public static function product($products)
    {
        $html = '';

        foreach ($products as $key => $product) {

            $html .= '
                    <tr>
                        <td id="id" class="text-center">' . $product->id . '</td>
                        <td  style="width: 150px;">' . $product->name . '</td>
                        <td class="text-center">' . number_format($product->price) . '</td>
                        <td class="text-center"><a href="' . $product->thumb . '"  target="_blank"><img src="' . $product->thumb . '" width="100px"></a></td>
                        <td class="text-center">' . self::active($product->active) . '</td>
                        <td class="text-center">' . $product->updated_at . '</td>
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="/admin/products/edit/' . $product->id . '">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $product->id . ', \'/admin/products/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';
        }
        return $html;
    }

    #Menu mainpage
    public static function menus($menus, $parent_id = 0): string
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li class="dropdown">
                        <a class="nav-link"  href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . $menu->name . '
                        </a>';

                unset($menus[$key]);

                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="dropdown-menu">';
                    $html .= self::menus($menus, $menu->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isChild($menus, $id): bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }

    public static function checkprice($price, $price_sale)
    {
        if ($price_sale != 0) {
            return '<span class="text-left text-danger nav-link" style="font-size: 18px; font-weight: 600;">' .
                number_format($price_sale)
                . '<span style="font-size:4px !important;">&ensp;đ</span></span>
                <span class="text-right ml-4" style="font-size: 18px; font-weight: 600; text-decoration: line-through;">
                    ' . number_format($price) . '<span style="font-size:4px !important;">&ensp;đ</span>
                </span>';
        } elseif ($price == 0 && $price_sale == 0) {
            return '<span class="text-dark nav-link" style="font-size: 18px;">Liên hệ</span>';
        } else {
            return '<span class="text-dark nav-link" style="font-size: 18px;">' .
                number_format($price) . '<span style="font-size:4px !important;">&ensp;đ</span></span>';
        }
    }

    public static function pricesa($price, $price_sale)
    {
        if ($price_sale != 0) {
            return '<span class="text-danger nav-link">' .
                number_format($price_sale) . '<span style="font-size:4px !important;">&ensp;đ</span><del class="text-dark ml-1">' .
                number_format($price) . '<span style="font-size:4px !important;">&ensp;đ</span></del>';
        } elseif ($price == 0 && $price_sale == 0) {
            return '<span class="text-dark nav-link" style="font-size: 18px;">Liên hệ</span>';
        } else {
            return '<span class="nav-link">' . number_format($price) . '<span class="font-size:4px !important;">&ensp;đ</span></span>';
        }

    }

    public static function productbycate_grid($products)
    {
        $html = '';
        foreach ($products as $item) {
            $html .= '<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <div class="products-single fix">
                                            <div class="box-img-hover">
                                                <div class="type-lb">
                                                    <p class="sale">Sale</p>
                                                </div>
                                                <img src="' . $item->thumb . '" style="max-height:480px;max-width:360px;" class="img-fluid" alt="' . $item->name . '">
                                                <div class="mask-icon">
                                                    <ul>
                                                    <li>
                                                        <a href="/san-pham/' . $item->id . '-' . Str::slug($item->name, '-') . '.html" data-toggle="tooltip" data-placement="right"
                                                                   title="Xem chi tiết">
                                                                   <i class="fas fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    </ul>
                                                    <a class="cart" href="#">Thêm vào giỏ hàng</a>
                                                </div>
                                            </div>
                                            <div class="why-text">
                                                <h4 class="text-lg-left"><a href="/san-pham/' . $item->id . '-' . Str::slug($item->name, '-') . '.html" class="nav-link">' . $item->name . '<a/></h4>
                                                   <h4>' . self::pricesa($item->price, $item->price_sale) . '</h4>
                                            </div>
                                        </div>
                                    </div>';
        }
        return $html;
    }

    public static function productbycate_list($products)
    {
        $html = '';
        foreach ($products as $item) {
            $html .= '<div class="list-view-box">
                         <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <div class="type-lb">
                                            <p class="new">New</p>
                                        </div>
                                        <img src="' . $item->thumb . '" class="img-fluid"
                                             alt="' . $item->name . '">
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a href="/san-pham/' . $item->id . '-' . Str::slug($item->name, '-') . '.html" data-toggle="tooltip"
                                                       data-placement="right" title="Xem chi tiết"><i
                                                            class="fas fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                <div class="why-text full-width">
                                    <h4><a href="/san-pham/' . $item->id . '-' . Str::slug($item->name, '-') . '.html" class="nav-link text-dark">' . $item->name . '</a></h4>
                                    ' . self::pricesa($item->price, $item->price_sale) . '
                                    <p>' . $item->content . '</p>
                                    <a class="btn hvr-hover" href="#">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $html;
    }
}
