@extends('frontend.master')
@section('title','Complete')
@section('main')
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="row">
			<p>
				Đơn hàng <strong>{{ $orderData->id }}</strong> đã được tạo thành công với mã đơn hàng là: {{ $orderData->code }}.
			</p>
		</div>
	</div>
</section>
@stop