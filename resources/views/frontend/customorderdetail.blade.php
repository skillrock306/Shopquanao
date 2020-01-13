@extends('frontend.master')
@section('title','Thông tin chi tiết đơn hàng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			
		</h2>
	</section>
<div class="flex-w flex-tr">
	<div style="width: 100%;" >
	@if(!empty($orders))
		 @if(!empty($orderdetail))
			<h4 class="mtext-105 cl2 txt-center p-b-30">
				Đơn hàng {{ $orders->id}} ({{ $orders->code}})
			</h4>
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Ảnh</th>
								<th class="column-2">Tên sản phẩm</th>
								<th class="column-3">Giá</th>
								<th class="column-4">Số lượng</th>
								<th class="column-5">Tổng</th>
							</tr>
							@foreach ($orderdetail as $key => $item)
							<tr class="table_row">
								<td class="column-1">
									<div class="how-itemcart1">
										<img src="{{asset('storage/products/'.$item->nameimg)}}" alt="IMG">
									</div>
								</td>
								<td class="column-2">
									<strong>{{ $item->name}}</strong><br>
									{{ $item->code}}<br>
									
								</td>
								<td class="column-3">
									{{ Helper::Numberformat($item->price) }}
								</td>
								<td class="column-4">
									{{ $item->quantity }}
								</td>
								<td class="column-5">{{ Helper::Numberformat($item->total) }}</td>
							</tr>
							 @endforeach	
						</table>
					</div>
				</div>
			</div>

			@endif
			@endif
	</div>
</div>
@stop