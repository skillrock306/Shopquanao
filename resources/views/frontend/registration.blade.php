@extends('frontend.master')
@section('title','Đăng ký khách hàng')
@section('main')
<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="container"  align="center">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 60%;" >
					<form method="post" action="{{URL::to('/register')}}" role="form">
					{{csrf_field()}}
					<fieldset>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Đăng ký thành viên
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Họ và tên">
						</div>
						@if($errors->has('name'))
								<span class="help-block text-danger">	
									<strong>{{$errors->first('name') }}</strong>
								</span>
							@endif
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="date" name="date" placeholder="Ngày sinh">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
						  	<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="sex">
						    	<option class="bor8 m-b-20 how-pos4-parent" value="1" @if(old('sex') == 1) checked="checked" @endif >Nam</option>
						    	<option class="bor8 m-b-20 how-pos4-parent" value="0" @if(old('sex') == 0) checked="checked" @endif >Nữ</option>
							</select>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone_number" placeholder="Số điện thoại">
							
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address" placeholder="Địa chỉ">
							
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input type="file" class="form-control" id="avatar" name="avatar"> 
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="nickname" placeholder="Biệt danh">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="account" placeholder="Tài khoản">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Mật khẩu">
						</div>

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="width: 40%;">
							Đăng ký
						</button>
						</fieldset>
					</form>
				</div>
			</div>
				
			</div>
		</div>
	</section>
	@stop