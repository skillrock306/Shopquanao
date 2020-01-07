@extends('frontend.master')
@section('title','Sửa người dùng')
@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">		
</section>
<div class="flex-w flex-tr">
	@include('frontend.account_sidebar')
	<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="width: 100%;" >
		<div class="wrap-table-shopping-cart" >
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 80%;" >
				<form name="User-form" method="POST" action="/post-edit-user">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Thông tin tài khoản
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" value="{{ $data->name }}" placeholder="Họ và tên" required="">
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="date" name="date" value="{{ $data->date }}"  placeholder="Ngày sinh" required="">
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
					  	<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="sex" required="">
					    	<option class="bor8 m-b-20 how-pos4-parent" value="1" {{ $data->sex == 1 ? 'selected' : '' }}>Nam</option>
					    	<option class="bor8 m-b-20 how-pos4-parent" value="0" {{ $data->sex == 0 ? 'selected' : '' }}>Nữ</option>
						</select>
					</div>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone_number" value="{{ $data->phone_number }}" placeholder="Số điện thoại" required="">
						
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" disabled="" value="{{ $data->email }}" placeholder="Email">
						
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="matkhau" placeholder="Mật khẩu">
					</div>
					<div align="center">
						<button type="submit" name="save"  class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer"  style="width: 40%;">
							Cập nhật
						</button>
					</div>
					{{ csrf_field() }}						
				</form>
			</div>
		</div>
	</div>
</div>
@stop