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
    	
    	return view('frontend.shopingcart', compact('cart'));
    }
    public function addCart(Request $request,$id)
    {	
    	$variants =  DB::table('variants AS var')
        ->leftJoin('products AS p', 'var.product_id', '=', 'p.id')
        ->leftJoin('product_images AS img', 'img.product_id', '=', 'p.id')
        ->select('img.*','var.*','p.name As ProductName','p.code As ProductCode','p.description As ProductDescription')
        ->groupBy('var.product_id')
        ->where('p.id', $id)
        ->first();
   
    	if($request->qty)
    	{
    		$qty = $request->qty;
    	}
    	else
    	{
    		$qty = 1;
    	}
    	if( $variants->discount < $variants->price )
    	{
    		$price = $variants->discount;
    		
    	}
    	else{
    		$price = $variants->price;
    	}
    	$carts = ['id' => $id,'name' => $variants->ProductName,'quantity'=> $qty,'price'=> $price,'img' => $variants->name];
    	\Cart::add($carts);
    echo "<pre>";
    print_r($carts);
    die();
    	return back()->with('thongbao','Đã mua hàng'.$variants->ProductName.'Thành công');
    }
}
