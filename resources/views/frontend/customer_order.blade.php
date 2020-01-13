@extends('frontend.master')
@section('title','Thông tin đặt hàng khách hàng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			
		</h2>
	</section>
<div class="flex-w flex-tr">
	@include('frontend.account_sidebar')
	<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="width: 100%;" >
		<h4 class="mtext-105 cl2 txt-center p-b-30">
			Đơn hàng
		</h4>
		<div class="wrap-table-shopping-cart" >
			<table class="table-shopping-cart" >
				<tbody>
				<tr class="table_head">
					<th class="column-1">Mã đơn hàng</th>
					<th class="column-4">Giảm giá</th>
					<th class="column-5">Tổng tiền</th>
					<th class="column-6">Tổng cộng</th>
					<th class="column-7">Ngày tạo</th>
					<th class="column-8">Trạng thái</th>
				</tr>
				@if(!empty($orders))
				@foreach ($orders as $key => $order)
				<tr class="table_row">
					<td class="column-1">
						{{ $order->code }}
					</td>
					<td class="column-4">
						{{Helper::Numberformat($order->discount) }}
					</td>
					<td class="column-5">
						{{ Helper::Numberformat($order->total) }}
					</td>
					<td class="column-6">
						{{ Helper::Numberformat($order->product_total) }}
					</td>
					<td class="column-7">
						{{ $order->created_at }}
					</td>
					<td class="column-8">
						{{ $order->status }}
					</td>
					<td class="column-9">
						<a href="/orderdetail/{{ $order->id }}" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Chi tiết</a>
					</td>
				</tr>
				 @endforeach
			</tbody>
			</table>
		</div>
		@else
			<p>Hiện tại chưa có đơn hàng nào</p>
			@endif
	</div>
</div>
@stop