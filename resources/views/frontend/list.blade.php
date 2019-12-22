@extends('frontend.master')
@section('title','Danh sách sản phẩm')
@section('main')
<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<a href="index.php?view=product_list" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
						All Products
					</a>
					@foreach(Voyager::model('Category')::all() as $category)
					<a href="{{asset('category/'.$category->id.'/'.$category->slug.'.html')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
						{{ $category->name }}
					</a>
					@endforeach
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15" style="display: none;">
					<form method="GET" action="index.php?view=product_list">
					<div class="bor8 dis-flex p-l-15">
						<input type="hidden" name="view" value="product_list">
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="keyword" id="keyword" placeholder="Search" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
 						<button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						
					</div>
					</form>	
				</div>


		</div>
		<div class="row isotope-grid">
			@if(!empty($Products))
			@foreach($Products as $item)
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('storage/products/'.$item->nameimg)}}" alt="" width="315" height="390">
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="{{asset('detail/'.$item->productId.'/'.$item->productcode.'.html')}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								{{$item->productname}}
							</a>

							<span class="stext-105 cl3" style="text-decoration: line-through;">
								{{Helper::Numberformat($item->price)}} 
							</span>
								@if($item->price > $item->discount)
							<span class="stext-105 cl3" style="color: red">
								{{Helper::Numberformat($item->discount)}} 
							</span>
							@endif	
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@else
				<h1>Không có sản phẩm</h1>
			@endif
		</div>
	</div>
</div>
@stop