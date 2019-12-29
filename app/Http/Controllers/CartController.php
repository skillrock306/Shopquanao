<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Product;
use TCG\Voyager\Models\ProductCategory;
use TCG\Voyager\Models\ProductVariant;
use TCG\Voyager\Models\Variant;
use TCG\Voyager\Models\Property;
use TCG\Voyager\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Cart;
use Auth;	

class CartController extends Controller
{
    //
    public function index()
    {
        $carts = \Cart::getContent();

        return view('frontend.shopingcart', compact('carts'));
    }

    public function addCart(Request $request)
    {	
        $id = $request->input('variantId');
        $quantity = $request->input('quantity');
        $carts = $this->cartData($id, $quantity);

        \Cart::add($carts);

        return back()->with('thongbao', 'Đã mua hàng Thành công');
    }

    public function updateCart(Request $request)
    {
        $action = $request->input('action');
        $id = $request->input('index');
        $quantity = $request->input('quantity');

        switch ($action) {
            case 'delete':
                \Cart::remove($id);

                break;
            
            case 'update':
            default:
                $carts = $this->cartData($id, $quantity);
                \Cart::remove($id);
                \Cart::add($carts);

                break;
        }

        return redirect('cart');
    }

    protected function cartData($id, $quantity)
    {
        $variants =  DB::table('variants AS var')
            ->leftJoin('products AS p', 'var.product_id', '=', 'p.id')
            ->leftJoin('product_images AS pi', 'p.id', '=', 'pi.product_id')
            ->select('var.id', 'var.product_id', 'var.code', 'var.stock', 'var.price', 'var.discount','p.name AS product_name', 'p.code AS product_code', 'pi.name AS product_image')
            ->where('var.id', $id)
            ->where('pi.is_default', 1)
            ->first();

        if ($variants->discount < $variants->price) {
            $price = $variants->discount;
            
        } else {
            $price = $variants->price;
        }

        return [
            'id' => $variants->id,
            'name' => $variants->product_name,
            'quantity'=> $quantity,
            'price'=> $price,
            'attributes' => [
                'product_id' => $variants->product_id,
                'image' => $variants->product_image
            ]
        ];
    }
}
