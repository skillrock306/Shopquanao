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
use Darryldecode\Cart\Facades\CartFacade;

class FrontendController extends Controller
{
    //
    public function getHome()
    {
    	$Products = DB::table('products AS p')
    	->leftJoin('variants AS va', 'va.product_id', '=', 'p.id') 
    	->leftJoin('product_images AS img', 'img.product_id', '=', 'p.id')
    	->select('p.id as productId','p.name AS productname','p.code as productcode' ,'img.name as nameimg','va.*', 'img.*')
		->groupBy('va.product_id')
    	->where('img.is_default', '=', 1)
    	->orderBy('p.id','desc')->limit(10)
    	->get();
      
    	return view('frontend.homepage', compact('Products'));
    }
    public function getCategory($id)
    {   
    	$Products = DB::table('products AS p')
    	->leftJoin('product_categories AS procate', 'procate.product_id', '=', 'p.id') 
    	->leftJoin('categories AS cate', 'cate.id', '=', 'procate.category_id')
    	->leftJoin('variants AS va', 'va.product_id', '=', 'p.id') 
    	->leftJoin('product_images AS img', 'img.product_id', '=', 'p.id')
    	->select('p.id as productId','p.name AS productname','p.code as productcode' ,'img.name as nameimg','va.*', 'img.*','procate.*')
		->groupBy('va.product_id')
    	->where('cate.id',$id)
    	->orderBy('cate.id','desc')->take(8)
    	->get();
        
    	return view('frontend.list', compact('Products'));
    }
    public function getAllProducts()
    {
        $Products = DB::table('products AS p')
        ->leftJoin('product_categories AS procate', 'procate.product_id', '=', 'p.id') 
        ->leftJoin('categories AS cate', 'cate.id', '=', 'procate.category_id')
        ->leftJoin('variants AS va', 'va.product_id', '=', 'p.id') 
        ->leftJoin('product_images AS img', 'img.product_id', '=', 'p.id')
        ->select('p.id as productId','p.name AS productname','p.code as productcode' ,'img.name as nameimg','va.*', 'img.*','procate.*')
        ->groupBy('va.product_id')->take(10)
        ->get();
        return view('frontend.list', compact('Products'));
    }
    public function getDetail($id){
    	$productDetail = DB::table('products')->where('id', $id)->first();
        $categories = DB::table('product_categories AS pc')
            ->leftJoin('categories AS c', 'c.id', '=', 'pc.category_id')
            ->where('pc.product_id', $id)
            ->get();
        $variants =  DB::table('variants AS var')
        ->leftJoin('products AS p', 'var.product_id', '=', 'p.id')
        ->groupBy('var.product_id')
        ->where('p.id', $id)
        ->get();

        $productImage = DB::table('products AS p')
        ->leftJoin('product_images AS img', 'img.product_id', '=', 'p.id')
        ->where('img.product_id', $id)
        ->get();
        $categoryName = [];
        foreach ($categories as $category) {
            $categoryName[] = $category->name;
        }

        $categoryName = implode(', ', $categoryName);
        $sizes = DB::table('properties')->where('attribute_id', 2)->get();
        $colors = DB::table('properties')->where('attribute_id', 1)->get();
    	    	
    	return view(
            'frontend.detail', 
            compact(
                'productDetail',
                'categoryName',
                'sizes',
                'colors',
                'variants',
                'productImage'
            )
        );	
    }

    public function ajaxProductVariant(Request $request)
    {
        $sizeId = $request->input('size');
        $colorId = $request->input('color');
        $productId = $request->input('id');

        $colorData = DB::table('properties')->where('id', $colorId)->first();
        $colorCode = $colorData->code;

        $sizeData = DB::table('properties')->where('id', $sizeId)->first();
        $sizeCode = $sizeData->code;

        $productData = DB::table('products')->where('id', $productId)->first();
        $productCode = $productData->code;

        $code = $productCode . '-' . $colorCode . '-' . $sizeCode;

        $variant = DB::table('variants')->where('code', $code)->first();
        $data = [];

        if (!isset($variant)) {
            $data['msg'] = 'error';
            $data['data'] = [];
        } else {
            $data['msg'] = 'success';
            $variant->price = Helper::Numberformat($variant->price);
            $data['data'] = $variant;
        }

        echo json_encode($data);
        exit();
    }

    public function getAbout()
    {
        return view('frontend.about');
    }
    public function getContact()
    {
        return view('frontend.contact');
    }
}
