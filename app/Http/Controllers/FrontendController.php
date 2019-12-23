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
    	->select('p.id as productId','p.name AS productname','p.code as productcode' ,'img.name as nameimg','va.*', 'img.*')
		->groupBy('va.product_id')
    	->where('img.is_default', '=', 1)
    	->orderBy('p.id','desc')->limit(10)
    	->get();

    	return view('frontend.list', compact('Products'));

    }
    public function getDetail($id){
    	$ProductDetail = DB::table('products AS p')
    	->leftJoin('product_images AS img', 'img.product_id', '=', 'p.id')
    	->leftJoin('variants AS va', 'va.product_id', '=', 'p.id') 
    	->leftJoin('product_variants AS prova', 'prova.variant_id', '=', 'va.id')
    	->leftJoin('properties AS pro', 'pro.id', '=', 'prova.property_id')
    	->select('p.id as productId','p.name AS productname','p.code as productcode' ,
    		'img.name as nameimg','va.*', 'img.*','pro.name As nameProperties')
    	->first($id);
    	    	
    	return view('frontend.detail',compact('ProductDetail'));	
    }
}
