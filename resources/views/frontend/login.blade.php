@extends('ftontend.master')
@section('title','Đăng nhập')
@section('main')
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="container"  align="center">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 50%;" >
				<form method="POST" action="index.php?view=login&action=doLogin">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Đăng nhập
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email">
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="*********">
					</div>
					<table>
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
					<?php if (!empty($error)) : ?>
						<p style="color: red;"><?php echo 'Tài khoản không tồn tại hoặc sai mật khẩu'; ?></p>
					<?php endif; ?>
				</form>
			</div>
		</div>
		</div>
	</div>
</section>
@stop