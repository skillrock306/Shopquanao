@extends('frontend.master')
@section('title','Thông tin khách hàng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">
</section>
<div class="flex-w flex-tr">
	@include('frontend.account_sidebar')
	<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="width: 100%;">
		<h4 class="mtext-105 cl2 txt-center p-b-30">
			Thông tin người dùng
		</h4>
		<div class="wrap-table-shopping-cart" >
			<table class="table-shopping-cart" >
				<tbody>
				<tr class="table_head">
					<th class="column-1">Tên: </th>
					<td class="column-2">{{ $data->name }}</td>
				</tr>
				<tr class="table_head">
					<th class="column-1">Số điện thoại</th>
					<td class="column-2">{{ $data->phone_number }}</td>
				</tr>
				<tr class="table_head">
					<th class="column-1">Email</th>
					<td class="column-2">{{ $data->email }}</td>
				</tr>
				<tr class="table_head">
					<th class="column-1">Giới tính</th>
					<td class="column-2">{{ $data->sex == 1 ? 'Nam' : 'Nữ' }}</td>
				</tr>
				<tr class="table_head">
					<th class="column-1">Ngày sinh</th>
					<td class="column-2">{{ $data->date }}</td>
				</tr>
				<tr>
					<td colspan="2"><a href="/edit-user" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Cập nhật thông tin</a></td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>
@stop