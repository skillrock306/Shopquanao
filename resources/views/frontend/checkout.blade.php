@extends('frontend.master')
@section('title','Checkout')
@section('main')
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="row">
			@if(Cart::getContent()->count() > 0)
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Image</th>
								<th class="column-2">Name</th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
							</tr>
							@foreach($carts as $key => $cart)
							<tr class="table_row">
								<td class="column-1">
									<div class="">
										<img src="{{asset('storage/products/' . $cart->attributes->image)}}" alt="{{ $cart->name }}">
									</div>
								</td>
								<td class="column-2">
									{{ $cart->name }}<br>
									@foreach ($cart->attributes->data as $attribute)
										{{ $attribute->attribute_name }}: {{ $attribute->property_name }} <br>
									@endforeach
								</td>
								<td class="column-3">
									{{ Helper::Numberformat($cart->price) }}
								</td>
								<td class="column-4">
									{{$cart->quantity}}
								</td>
								<td class="column-5">{{ Helper::Numberformat($cart->price * $cart->quantity) }}</td>
							</tr>
							@endforeach	
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
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								{{ Helper::Numberformat(Cart::getSubTotal()) }}
							</span>
						</div>
					</div>
			
					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								{{ Helper::Numberformat(Cart::getTotal()) }}
							</span>
						</div>
					</div>
				</div>
			</div>
			@else
				<h1>
					Không có sản phẩm trong giỏ hàng
				</h1>
			@endif
		</div>

		<form method="POST" action="/storeCheckout">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Billing Address
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input readonly="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Họ và tên" value="{{$userData->name}}">
					</div>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input readonly="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone" placeholder="Số liên lạc" value="{{$userData->phone_number}}">
					</div>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input readonly="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email" value="{{$userData->email}}">
					</div>

					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Shipping Address
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="address" onchange="addNewCustomerAddress(this);" required="">
						<option value="-1">Select</option>
						<option value="0">New</option>
						@if($userAddresses)
							@foreach($userAddresses as $key => $address)
								<option value="{{$address->id}}">{{$address->customer_address}}</option>
							@endforeach	
						@endif
						</select>
					</div>

					<div id="new-shipping-address" class="d-none">
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="new-address" placeholder="Địa chỉ mới" value="">
						</div>
					</div>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Phương thức thanh toán
					</h4> 	
					<div class="bor8 m-b-20 how-pos4-parent">
						<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="payment-method">
							<option value="1">Thanh toán tiền mặt khi nhận hàng</option>
							<option value="2">ATM</option>
						</select>
					</div>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="submit" name="order" value="Đặt hàng">
					</div>
				</div>
			</div>
			{{csrf_field()}}
		</form>
	</div>
</section>
@stop