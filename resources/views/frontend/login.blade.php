@extends('frontend.master')
@section('title','Đăng nhập')
@section('main')
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="container"  align="center">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 50%;" >
				<form method="POST" action="/login" role="form">
				{{csrf_field()}}
				 <fieldset>
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Đăng nhập
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email">
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="*********">
					</div>
					<div class="form-group">
						<label style="">
							<input type="checkbox" name="remember" class="flex-c-m stext-101 float-left" value="Remember Me"><p style="float:left;margin-top: -4px">&nbsp&nbspNhớ tôi</p>
						</label>
					</div>
					<br>
					<table method="POST">
						<tr>
						<td>
							<input value="Đăng nhập" name="login" type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="width: 150px;" >
						</td>
						<td>
							<a href="index.php?view=register" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="width: 150px;" >
								Đăng ký 
							</a>
						</td>
						</tr>
					</table>
					</fieldset>
					
				</form>
			</div>
		</div>
		</div>
	</div>
</section>
@stop