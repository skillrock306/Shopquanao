@extends('frontend.master')
@section('title','Shopping Cart')
@section('main')
<form name="cart" class="bg0 p-t-75 p-b-85" action="/update-cart" method="POST">
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
										<div data-idx="{{ $cart->id }}" class="how-itemcart1" onclick="cartDelete(this);">
											<img src="{{asset('storage/products/' . $cart->attributes->image)}}" alt="{{ $cart->name }}">
										</div>
									</td>
									<td class="column-2">
										<strong>{{ $cart->name }}</strong><br>
									</td>
									<td class="column-3">
										{{ Helper::Numberformat($cart->price) }}
									</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div data-idx="{{ $cart->id }}" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="cartUpdate(this);">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" value="{{$cart->quantity}}" name="quantity" >

											<div data-idx="{{ $cart->id }}" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" onclick="cartUpdate(this);">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
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
						<a href="/checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>
						</a>
					</div>
				</div>
				@else
					<h1>
						Không có sản phẩm trong giỏ hàng
					</h1>
				@endif
			</div>
		</div>
		<input type="hidden" name="action" value="update">
		<input type="hidden" name="index" value="">
		{{ csrf_field() }}
	</form>

<script type="text/javascript">
	function cartUpdate(el) {
		$('form[name="cart"]').find('input[name="action"]').val('update');
		var id = $(el).attr('data-idx');
		$('form[name="cart"]').find('input[name="index"]').val(id);
		setTimeout(function(){
			$('form[name="cart"]').submit();
		}, 500);
	}

	function cartDelete(el) {
		var id = $(el).attr('data-idx');
		$('form[name="cart"]').find('input[name="index"]').val(id);
		$('form[name="cart"]').find('input[name="action"]').val('delete');
		$('form[name="cart"]').submit();
	}
</script>
@stop