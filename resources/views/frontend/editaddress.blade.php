@extends('frontend.master')
@section('title','Sữa địa chỉ khách hàng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">		
</section>
<div class="flex-w flex-tr">
	@include('frontend.account_sidebar')
	<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="width: 100%;" >
		<div class="wrap-table-shopping-cart" >
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 80%;" >
				<form name="User-form" method="POST" action="/post-edit-address">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Thông tin địa chỉ
					</h4>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="customer_address" value="{{ $data->customer_address }}" placeholder="Địa chỉ">
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
					  	<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="is_default">
					    	<option class="bor8 m-b-20 how-pos4-parent" value="1" {{ $data->is_default == 1 ? 'selected' : '' }}>Có</option>
					    	<option class="bor8 m-b-20 how-pos4-parent" value="0" {{ $data->is_default == 0 ? 'selected' : '' }}>Không</option>
						</select>
					</div>
					<div align="center">
						<input type="hidden" name="id" value="{{ $data->id }}">
						<button type="submit" name="save"  class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer"  style="width: 40%;">
							Cập nhật
						</button>
					</div>		
					{{ csrf_field() }}			
				</form>
			</div>
		</div>
	</div>
</div>
@stop