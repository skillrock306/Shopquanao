@extends('ftontend.master')
@section('title','Menu Khách hàng')
@section('main')
<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 25%;">
	<div class="bor8 m-b-20 how-pos4-parent">
		<a href="index.php?view=myaccount" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" style="" >Thông tin tài khoản</a>
		<img class="how-pos4 pointer-none" src="../LayoutWeb/images/icons/icon-people.png" alt="ICON" width="22px" height="18px" >
	</div>

	<div class="bor8 m-b-20 how-pos4-parent">
		<a href="index.php?view=myaccount&action=addresses" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" >Sổ địa chỉ</a>
		<img class="how-pos4 pointer-none" src="../LayoutWeb/images/icons/icon-adress.png" alt="ICON" width="22px" height="18px" >
	</div>

	<div class="bor8 m-b-20 how-pos4-parent">
		<a href="index.php?view=myaccount&action=order" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">Thông tin đơn hàng</a>
		<img class="how-pos4 pointer-none" src="../LayoutWeb/images/icons/icon-phone.png" alt="ICON" width="22px" height="18px">
	</div>
</div>
@stop