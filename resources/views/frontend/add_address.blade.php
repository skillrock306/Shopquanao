@extends('ftontend.master')
@section('title','Thêm địa chỉ khách hàng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">		
</section>
<div class="flex-w flex-tr">
	<?php require_once 'account_sidebar.php'; ?>
	<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="width: 100%;" >
		<div class="wrap-table-shopping-cart" >
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 80%;" >
				<form name="User-form" method="POST" action="index.php?view=myaccount&action=addAddress">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Thêm địa chỉ
					</h4>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" placeholder="Địa chỉ" name="diachi_thanhvien">
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
					  	<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="macdinh">
					    	<option class="bor8 m-b-20 how-pos4-parent" value="1" >Có</option>
					    	<option class="bor8 m-b-20 how-pos4-parent" value="0" >Không</option>
						</select>
					</div>
					<div align="center">
						<button type="submit" name="save"  class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer"  style="width: 40%;">
							Thêm địa chỉ
						</button>
					</div>
					<?php  if (!empty($error)) { echo $error; } ?>						
				</form>
			</div>
		</div>
	</div>
</div>
@stop