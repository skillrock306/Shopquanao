@extends('ftontend.master')
@section('title','Thông tin khách hàng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">
</section>
<div class="flex-w flex-tr">
	<?php require_once 'account_sidebar.php'; ?>
	<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="width: 100%;">
		<h4 class="mtext-105 cl2 txt-center p-b-30">
			Thông tin người dùng
		</h4>
		<div class="wrap-table-shopping-cart" >
			<table class="table-shopping-cart" >
				<tbody>
				<tr class="table_head">
					<th class="column-1">Tên: </th>
					<td class="column-2"><?php echo $data['ten']; ?></td>
				</tr>
				<tr class="table_head">
					<th class="column-1">Số điện thoại</th>
					<td class="column-2"><?php echo $data['sdt']; ?></td>
				</tr>
				<tr class="table_head">
					<th class="column-1">Email</th>
					<td class="column-2"><?php echo $data['email']; ?></td>
				</tr>
				<tr class="table_head">
					<th class="column-1">Giới tính</th>
					<td class="column-2"><?php echo $db->getGenderName($data['gioitinh']); ?></td>
				</tr>
				<tr class="table_head">
					<th class="column-1">Ngày sinh</th>
					<td class="column-2"><?php echo date('d/m/Y', strtotime($data['ngaysinh'])); ?></td>
				</tr>
				<tr class="table_head">
					<th class="column-1">Ngày tạo</th>
					<td class="column-2"><?php echo date('d/m/Y', strtotime($data['ngaytao'])); ?></td>
				</tr>
				<tr>
					<td colspan="2"><a href="index.php?view=myaccount&action=editUser" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Cập nhật thông tin</a></td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>
@stop