@extends('frontend.master')
@section('title','Thông tin địa chỉ khách hàng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			
		</h2>
	</section>
<div class="flex-w flex-tr">
	@include('frontend.account_sidebar')
	<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="width: 100%;" >
		<h4 class="mtext-105 cl2 txt-center p-b-30">
		Số địa chỉ
		</h4>
		<div class="wrap-table-shopping-cart" >
			<table class="table-shopping-cart" >
				<tbody>
				<tr class="table_head">
					<th class="column-1">#</th>
					<th class="column-2">Mặc định</th>
					<th class="column-3">Địa chỉ</th>
					<th class="column-4"></th>
					<th class="column-5"></th>
				</tr>
				@foreach ($addresses as $key => $address)
				<tr class="table_row">
					<td class="column-1">
						{{ $key + 1 }}
					</td>
					<td class="column-2">
						{{ $address->is_default == 1 ? 'Mặc định' : '' }}
					</td>
					<td class="column-3">
						{{ $address->customer_address }}
					</td>
					<td class="column-4">
						<a href="/edit-address/{{ $address->id }}" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Chỉnh sửa</a>
					</td>
					<td class="column-5">
						<a href="/delete-address/{{ $address->id }}" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Xóa</a>
					</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="5">
						<a href="/add-address" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Thêm địa chỉ mới
						</a>
					</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>
@stop