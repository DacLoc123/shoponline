<?php


namespace App\Http\Services;


use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\UploadImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    use UploadImage;


    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if (
            $request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) {
            return false;
        }
        try {

            $product = Product::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'menu_id' => $request->input('menu_id'),
                'price_sale' => $request->input('price_sale'),
                'thumb' => $request->input('thumb'),
                'active' => $request->input('active')
            ]);


            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $item) {
                    $data = $this->upimage($item, 'products');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $data['path'],
                        'image_name' => $data['name']
                    ]);
                }
            }


            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function get()
    {
        return Product::with('menu')->paginate(6);
    }

    public function update($request, $product): bool
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) {
            return false;
        }


        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $name = $request->input('name');
        $menu_id = $request->input('menu_id');
        $price = $request->input('price');
        $thumb = $request->input('thumb');
        $price_sale = $request->input('price_sale');
        $active = $request->input('active');
        $quantity = $request->input('quantity');
        $description = $request->input('description');
        $content = $request->input('content');
        if ($request->hasFile('image_path')) {
            $image_multiple = $request->file('image_path');
            foreach ($image_multiple as $item) {
                $data_file_multiple = $this->upimage($item, 'products');
                $product->images()->create([
                    'image' => $data_file_multiple['path'],
                    'image_name' => $data_file_multiple['name'],
                    'created_at' => $date,
                    'updated_at' => $date
                ]);
            }
        }

        $product->name = $name;
        $product->menu_id = $menu_id;
        $product->active = $active;
        $product->price = $price;
        $product->price_sale = $price_sale;
        $product->quantity = $quantity;
        $product->description = $description;
        $product->content = $content;
        $product->thumb = $thumb;
        $product->updated_at = $date;
        $product->save();

        Session::flash('success', 'Cập nhật thành công sản phẩm');
        return true;
    }

    public function delete($request)
    {

        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            ProductImage::where('product_id', $request->input('id'))->delete();
            return true;
        }
        return false;
    }
}
