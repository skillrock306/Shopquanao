@extends('ftontend.master')
@section('title','Thông tin chi tiết đơn hàng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			
		</h2>
	</section>
<div class="flex-w flex-tr">
	<div style="width: 100%;" >
		<?php if (!empty($orderData)): ?>
			<h4 class="mtext-105 cl2 txt-center p-b-30">
				Đơn hàng <?php echo $order['id']; ?> (<?php echo $order['Madonhang']; ?>)
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
							<?php foreach ($orderData as $key => $item): ?>
							<?php if (is_numeric($key)): ?>
							<tr class="table_row">
								<td class="column-1">
									<div class="how-itemcart1">
										<img src="<?php echo PRODUCT_IMAGE_PATH . $item['image']['tenhinh']; ?>" alt="IMG">
									</div>
								</td>
								<td class="column-2">
									<strong><?php echo $item['ten']; ?></strong><br>
									<?php foreach ($item['attribute'] as $idx => $attribute) : ?>
										<?php echo $attribute['tenthuoctinh']; ?>: <?php echo $attribute['tendactinh']; ?><br>
									<?php endforeach; ?>
								</td>
								<td class="column-3">
									<?php echo $db->formatPrice($item['gia']); ?>
								</td>
								<td class="column-4">
									<?php echo $item['quantity']; ?>
								</td>
								<td class="column-5"><?php echo $db->formatPrice($item['gia'] * $item['quantity']); ?></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>	
						</table>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Order Totals
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Trạng thái: 
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<strong><?php echo $db->getOrderStatus($order['trangthai']); ?></strong>
							</span>
						</div>
					</div>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Tổng:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?php echo $db->formatPrice($orderData['subtotal']); ?>
							</span>
						</div>
					</div>
			
					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Tổng cộng:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								<?php echo $db->formatPrice($orderData['total']); ?>
							</span>
						</div>
					</div>
				</div>
				<a href="index.php?view=myaccount&action=order" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Quay lại</a>
				
			</div>
			<?php else: ?>
				<h1>
					Không có sản phẩm trong giỏ hàng
				</h1>
			<?php endif; ?>
	</div>
</div>
@stop