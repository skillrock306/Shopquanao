@extends('ftontend.master')
@section('title','Đăng ký khách hàng')
@section('main')
<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="container"  align="center">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 60%;" >
					<form name="User-form" method="POST" action="index.php?view=register">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Đăng ký thành viên
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="ten" placeholder="Họ và tên">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="date" name="ngaysinh" placeholder="Ngày sinh">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
						  	<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="gioitinh">
						    	<option class="bor8 m-b-20 how-pos4-parent"  value="1">Nam</option>
						    	<option class="bor8 m-b-20 how-pos4-parent" value="0">Nữ</option>
							</select>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="sdt" placeholder="Số điện thoại">
							
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="diachi" placeholder="Địa chỉ">
							
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email">
							
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="matkhau" placeholder="Mật khẩu">
							
						</div>

						<button type="submit" name="save"  class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="width: 40%;">
							Đăng ký
						</button>
						
							<?php  if (!empty($error)) { echo $error; } ?>
													
					</form>
				</div>
			</div>
				
			</div>
		</div>
	</section>
	@stop