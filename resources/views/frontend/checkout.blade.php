@extends('ftontend.master')
@section('title','Checkout')
@section('main')
<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="row">
				<?php if (!empty($Carts)): ?>
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
								<?php foreach ($Carts as $key => $cart): ?>
									<?php if (is_numeric($key)) : ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?php echo PRODUCT_IMAGE_PATH . $cart['tenhinh']; ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2">
										<strong><?php echo $cart['ten']; ?></strong><br>
										<?php foreach ($cart['attribute'] as $idx => $attribute) : ?>
											<?php echo $attribute['tenthuoctinh']; ?>: <?php echo $attribute['tendactinh']; ?><br>
										<?php endforeach; ?>
									</td>
									<td class="column-3">
										<?php echo $db->formatPrice($cart['giamgia']); ?>
									</td>
									<td class="column-4">
										<?php echo $cart['quantity']; ?>
									</td>
									<td class="column-5"><?php echo $db->formatPrice($cart['giamgia']*$cart['quantity']); ?></td>
								</tr>
									<?php endif ?>
								<?php endforeach; ?>	
							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Tổng:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $db->formatPrice($Carts['subtotal']); ?>
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
									<?php echo $db->formatPrice($Carts['total']); ?>
								</span>
							</div>
						</div>
					</div>
				</div>
				<?php else: ?>
					<h1>
						Không có sản phẩm trong giỏ hàng
					</h1>
				<?php endif; ?>
			</div>

			<form method="POST" action="index.php?view=checkout&action=saveOrder">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Địa chỉ thanh toán
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="address">
							<?php foreach ($userAddresses as $address) : ?>
								<option value="<?php echo $address['id']; ?>"><?php echo $address['diachi_thanhvien']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input readonly="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Họ và tên" value="<?php echo $userData['ten']; ?>">
						<img class="how-pos4 pointer-none" src="../LayoutWeb/images/icons/icon-people.png" alt="ICON" width="22px" height="18px" >
					</div>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input readonly="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone" placeholder="Số liên lạc" value="<?php echo $userData['sdt']; ?>">
						<img class="how-pos4 pointer-none" src="../LayoutWeb/images/icons/icon-phone.png" alt="ICON" width="22px" height="18px">
					</div>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input readonly="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email" value="<?php echo $userData['email']; ?>">
						<img class="how-pos4 pointer-none" src="../LayoutWeb/images/icons/icon-email.png" alt="ICON">
					</div>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Phương thức thanh toán
					</h4> 	
					<div class="bor8 m-b-20 how-pos4-parent">
						<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
							<option value="1">Thanh toán tiền mặt khi nhận hàng</option>
							<option value="2">ATM</option>
						</select>
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="submit" name="order" value="Đặt hàng">
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>
	@stop