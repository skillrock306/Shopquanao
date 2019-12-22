@extends('ftontend.master')
@section('title','Complete')
@section('main')
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="row">
			<p>
				Đơn hàng <strong><?php echo $orderId; ?></strong> đã được tạo thành công với mã đơn hàng là: <?php echo $orderData['Madonhang']; ?>.
			</p>
		</div>
	</div>
</section>
@stop