<?php

namespace TCG\Voyager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Product;
use TCG\Voyager\Models\ProductCategory;
use TCG\Voyager\Models\ProductVariant;
use TCG\Voyager\Models\Variant;
use TCG\Voyager\Models\Property;
use TCG\Voyager\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VoyagerProductController extends Controller
{
    public function create(Request $request)
    {
        $dataType = Voyager::model('DataType')->where('slug', 'products')->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));
        $validatedData = $request->validate([
			'code' => 'required',
			'name' => 'required',
			'category' => 'required',
		]);

        $checkProductCode = $this->checkProductCode($request->input('code'));

        if ($checkProductCode == true) {
            $request->session()->flash('message', 'Product code is existed!');

            return redirect('admin/products/create');
        }
    

        $product = new Product;
        
        $product->code = $request->input('code');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        $product->save();

        $categories = $request->input('category');
        $productCategory = new ProductCategory;

        foreach ($categories as $key => $category) {
        	$productCategory->category_id = $category;
        	$productCategory->product_id = $product->id;
        	$productCategory->save();
        }

        return redirect('admin/edit-product/' . $product->id);
    }

    public function getEdit(Request $request, $id = 0)
    {
    	// GET THE DataType based on the slug
    	$dataTypeContent = array();
    	$dataType = Voyager::model('DataType')->where('slug', 'products')->first();
        $product = Product::find($id);
        $categories = DB::table('product_categories')->where('product_id', $id)->get();

    	return Voyager::view('voyager::products.edit-add', compact(
    		'dataType',
    		'dataTypeContent',
    		'product',
    		'categories',
    		'id'
    	)); 
    }
    public function postEdit(Request $request)
    {
    	$dataType = Voyager::model('DataType')->where('slug', 'products')->first();

        // Check permission	
        $this->authorize('edit', app($dataType->model_name));
        $validatedData = $request->validate([
			'name' => 'required',
			'category' => 'required',
		]);

		$productId = $request->input('id');

        $product = Product::find($productId);       
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        $product->save();
    
        $categories = $request->input('category');

        DB::table('product_categories')->where('product_id', $productId)->delete();

  	    foreach($categories as $key => $category)
    	{
    		$productCategory = new ProductCategory;
	        $productCategory->category_id = $category;
	        $productCategory->product_id = $productId;
	        $productCategory->save();
    	}

    	return redirect('admin/edit-product/' . $product->id);
	}


    public function editProductVariant(Request $request, $id)
    {
    	$variantId = null;
    	$productVariant = array();
    	$variantColorData = array();
    	$variantSizeData = array();
    	$variants = DB::table('variants')->where('product_id', $id)->get();
    	// GET THE DataType based on the slug
    	$sizes = DB::table('properties')->where('attribute_id', 2)->get();
    	$colors = DB::table('properties')->where('attribute_id', 1)->get();

    	return Voyager::view('voyager::products.edit-add-variant', compact('id', 'sizes', 'colors', 'variants', 'productVariant', 'variantColorData', 'variantSizeData', 'variantId'));
    }

    public function postProductVariant(Request $request)
    {
    	$variant = new Variant;

    	$validatedData = $request->validate([
			'price' => 'required',
			'stock' => 'required',
		]);

    	$id = $request->input('id');
    	$colorId = $request->input('color');
    	$sizeId = $request->input('size');
    	$colorData = DB::table('properties')->where('id', $colorId)->first();
    	$colorCode = $colorData->code;

    	$sizeData = DB::table('properties')->where('id', $sizeId)->first();
    	$sizeCode = $sizeData->code;

    	$productData = DB::table('products')->where('id', $id)->first();
    	$productCode = $productData->code;

    	$code = $productCode . '-' . $colorCode . '-' . $sizeCode;


    	$variant->product_id = $id;
    	$variant->code = $code;
    	$variant->stock = $request->input('stock');
    	$variant->price = $request->input('price');
    	$variant->discount = $request->input('discount') ? $request->input('discount') : 0;
    	$variant->status = $request->input('status') ? 'ACTIVE' : 'INACTIVE';
    	$variant->save();

    	$productVariant = new ProductVariant;
    	$productVariant->variant_id = $variant->id;
    	$productVariant->property_id = $colorId;
    	$productVariant->save();

    	$productVariant = new ProductVariant;
    	$productVariant->variant_id = $variant->id;
    	$productVariant->property_id = $sizeId;
    	$productVariant->save();

    	return redirect('admin/edit-product-variant/' . $id);
    }
    public function postDeleteVariant($variantId)
    {
    	$variants = new Variant;
	    $variants = Variant::destroy($variantId);
	    return back();
    }
    public function editProductImage(Request $request, $id)
    {
    	$images = DB::table('product_images')
        ->where('product_id', $id)
        ->get();
    	// GET THE DataType based on the slug
   

    	$colors = DB::table('properties')
            ->where('attribute_id', 1)
            ->whereRaw('id IN (SELECT pv.property_id FROM product_variants AS pv 
                LEFT JOIN variants AS v ON v.id = pv.variant_id WHERE v.product_id = ' . $id . ')')
            ->get();


        $imageData = [];

        foreach ($colors as $color) {
            if (empty($images)) {
                continue;
            }

            $imageData[$color->id]['name'] = $color->name;
            $i = 0;
     
            foreach ($images as $image) {
                if ($color->id != $image->property_id) {
                    continue;
                }

                $imageData[$color->id]['images'][$i] = $image;
                $i++;
            }
        }
        // echo "<pre>"; print_r($images); die();   
    	return Voyager::view('voyager::products.edit-add-product-image', compact('id', 'sizes', 'colors', 'imageData'));
    }
    public function postProductImage(Request $request){
    	$validatedData = $request->validate([
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'color' => 'required',
		]);

    	$id = $request->input('id');
    	$colorId = $request->input('color');
    	$product_id = $request->input('product_id');
    	$imageData = DB::table('product_images')
    	->selectRaw('MAX(ordering) AS max_ordering')
    	->where('product_id', $id)
    	->where('property_id', $colorId)
    	->first();


    	$imageOrdering = !empty($imageData) ? $imageData->max_ordering : 0;

    	if ($request->hasFile('image')) {
    		$file = $request->image;

    		$ext = $file->getClientOriginalExtension();
    		$fileName = $id . '_' . time() . '_' . $colorId . '_' . ($imageOrdering + 1) . '.' . $ext;

    		Storage::putFileAs('public/products', $file, $fileName);

    	}
    
    	$images = new ProductImage;

    	$images->product_id = $id;
    	$images->name = $fileName;
    	$images->property_id = $colorId;
    	$images->is_default = 0;
    	$images->ordering = $imageOrdering + 1;
    	$images->status = 'ACTIVE';
    	$images->save();
	
    	return redirect('admin/edit-product-images/' . $id);
    }
    public function postDeleteProductImage($id){
    	$Users = new ProductImage;
	    $Users = ProductImage::destroy($id);
	    return back();
    }

    public function editVariant(Request $request, $variantId)
    {
    	$productVariant = DB::table('variants')->where('id', $variantId)->first();
    	// GET THE DataType based on the slug
    	$sizes = DB::table('properties')->where('attribute_id', 2)->get();
    	$colors = DB::table('properties')->where('attribute_id', 1)->get();
    	
    	$id = $productVariant->product_id;

    	$variantColorData = DB::table('product_variants AS pv')
    	->leftJoin('properties AS p', 'pv.property_id', '=', 'p.id')
    	->where('pv.variant_id', $variantId)
    	->where('p.attribute_id', 1)
    	->first();

    	$variantSizeData = DB::table('product_variants AS pv')
    	->leftJoin('properties AS p', 'pv.property_id', '=', 'p.id')
    	->where('pv.variant_id', $variantId)
    	->where('p.attribute_id', 2)
    	->first();

    	return Voyager::view('voyager::products.edit-add-variant', compact('variantId', 'sizes', 'colors', 'productVariant', 'id', 'variantColorData', 'variantSizeData'));
    }

    public function postVariant(Request $request)
    {
    	$variantId = $request->input('variantId');
    	$validatedData = $request->validate([
			'price' => 'required',
			'stock' => 'required',
		]);

    	$variant = Variant::find($variantId);
    	$variant->stock = $request->input('stock');
    	$variant->price = $request->input('price');
    	$variant->discount = $request->input('discount') ? $request->input('discount') : 0;
    	$variant->status = $request->input('status');
    	$variant->save();

    	return redirect('admin/edit-variant/' . $variantId);
    }

    private function checkProductCode($productCode)
    {
        $data = DB::table('products')->where('code', $productCode)->first();

        if (!empty($data)) {
            return true;
        }

        return false;
    }
}