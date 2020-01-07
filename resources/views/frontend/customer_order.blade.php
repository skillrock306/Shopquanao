@extends('ftontend.master')
@section('title','Thông tin đặt hàng khách hàng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			
		</h2>
	</section>
<div class="flex-w flex-tr">
	<?php require_once 'account_sidebar.php'; ?>
	<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="width: 100%;" >
		<h4 class="mtext-105 cl2 txt-center p-b-30">
			Đơn hàng
		</h4>
		<?php if (!empty($orderData)) : ?>
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
				<?php foreach ($orderData as $key => $order) : ?>
				<tr class="table_row">
					<td class="column-1">
						<?php echo $order['Madonhang'] ?>
					</td>
					<td class="column-4">
						<?php echo $order['giamgia']; ?>
					</td>
					<td class="column-5">
						<?php echo $db->formatPrice($order['tongtien']); ?>
					</td>
					<td class="column-6">
						<?php echo $db->formatPrice($order['tongtien_sanpham']); ?>
					</td>
					<td class="column-7">
						<?php echo $order['ngaytao']; ?>
					</td>
					<td class="column-8">
						<?php echo $db->getOrderStatus($order['trangthai']); ?>
					</td>
					<td class="column-9">
						<a href="index.php?view=myaccount&action=orderDetail&order_id=<?php echo $order['id']; ?>" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Chi tiết</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
		<?php else: ?>
			<p>Hiện tại chưa có đơn hàng nào</p>
		<?php endif;?>
	</div>
</div>
@stop