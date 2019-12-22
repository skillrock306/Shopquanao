@extends('ftontend.master')
@section('title','Chi tiết sản phẩm')
@section('main')
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<?php foreach ($products as $product) : ?>
					<span 
					data-code="<?php echo $product['maSP_morong']; ?>"
					data-id="<?php echo $product['id']; ?>" 
					data-price="<?php echo $product['gia']; ?>" 
					data-discount-price="<?php echo $product['giamgia']; ?>"
					data-stock="<?php echo $product['tonkho']; ?>"
					>
					</span>
				<?php endforeach; ?>
				<?php foreach ($dependencyData as $key => $dependencies) : ?>
					<?php foreach ($dependencies as $dependency) : ?>
					<span
					data-color-id="<?php echo $key; ?>"
					data-size-id="<?php echo $dependency['id']; ?>"
					data-size-name="<?php echo $dependency['name']; ?>"
					data-size-code="<?php echo $dependency['code']; ?>"
					>
					</span>
					<?php endforeach; ?>
				<?php endforeach; ?>
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<?php foreach ($productImages as $productImage): ?>
								<div class="item-slick3" data-thumb="<?php echo PRODUCT_IMAGE_PATH . $productImage['tenhinh']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo PRODUCT_IMAGE_PATH . $productImage['tenhinh']; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo PRODUCT_IMAGE_PATH . $productImage['tenhinh']; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $products[0]['ten']; ?>
						</h4>
						
						<div id="product-price">
							<?php if (!empty($products[0]['giamgia']) && $products[0]['giamgia'] < $products[0]['gia']) : ?>
								<span class="mtext-106 cl2" style="text-decoration: line-through; padding-right: 20px;">
									<?php echo $db->formatPrice($products[0]['gia']); ?>
								</span>
								<span class="mtext-106 cl2" style="color: red;">
									<?php echo $db->formatPrice($products[0]['giamgia']); ?>
								</span>
							<?php else: ?>
								<span class="mtext-106 cl2">
								<?php echo $db->formatPrice($products[0]['gia']); ?>
								</span>
							<?php endif; ?>
						</div>

						<p class="stext-102 cl3 p-t-23" id="product-code">
							<?php echo $products[0]['maSP_morong']; ?>
						</p>
						<form action="index.php?view=product_detail&action=add-to-cart" method="POST">
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="color" onchange="getColorData(this);" required="">
											<option value="">Choose an option</option>
											<?php foreach ($colors as $color): ?>
											<option value="<?php echo $color['id']; ?>" data-code="<?php echo $color['madactinh'] ?>"><?php echo $color['ten']; ?></option>
											<?php endforeach; ?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="size" onchange="getSizeData(this);" required="">
											<option value="">Choose an option</option>
											<?php foreach ($sizes as $size): ?>
											<option value="<?php echo $size['id']; ?>" data-code="<?php echo $size['madactinh'] ?>"><?php echo $size['ten']; ?></option>
											<?php endforeach; ?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div id="quantity" class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<button id="add-to-cart" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" onclick="checkAddToCart(this);">
										Add to cart
									</button>
									<button id="sold-out" disabled="" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" style="display: none;">
										Sold out
									</button>
								</div>
							</div>	
						</div>
						<input type="hidden" name="product_code" value="<?php echo $products[0]['masanpham']; ?>">
						<input type="hidden" name="product_id" value="<?php echo $products[0]['id_sanpham']; ?>">
						<input type="hidden" name="main_product_id" value="<?php echo $products[0]['id']; ?>">
						</form>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php echo $products[0]['gioithieu'] ?>
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="../LayoutWeb/images/avatar-01.jpg" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														Ariana Grande
													</span>

													<span class="fs-18 cl11">
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star-half"></i>
													</span>
												</div>

												<p class="stext-102 cl6">
													Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos
												</p>
											</div>
										</div>
										
										<!-- Add review -->
										<form class="w-full">
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>

											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
												</div>
											</div>

											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: Jacket, Men
			</span>
		</div>
	</section>

<script type="text/javascript">
	function getColorData(el) {
		var colorId = $(el).val();
		var sizeData = $('span[data-color-id="' + colorId + '"]');
		var template = '<option value="">Choose an option</option>';
		$.each(sizeData, function(idx, el){
			var sizeId = $(el).attr('data-size-id');
			var sizeName = $(el).attr('data-size-name');
			var sizeCode = $(el).attr('data-size-code');
			template += '<option value="' + sizeId + '" data-code="' + sizeCode +'">' + sizeName + '</option>';
		});

		$('select[name="size"]').html(template);
	}
	function getSizeData(el) {
		var productCode = $('form input[name="product_code"]').val();
		var sizeCode = $(el).find('option:selected').attr('data-code');
		var colorCode = $('select[name="color"]').find('option:selected').attr('data-code');
		var mainCode = productCode + '-' + sizeCode + '-' + colorCode;
		var price = $('span[data-code="' + mainCode + '"]').attr('data-price');
		var discountPrice = $('span[data-code="' + mainCode + '"]').attr('data-discount-price');
		var stock = $('span[data-code="' + mainCode + '"]').attr('data-stock');
		var mainId = $('span[data-code="' + mainCode + '"]').attr('data-id');
		var priceTemplate = '';

		if (parseFloat(price) - parseFloat(discountPrice) > 0) {
			priceTemplate += '<span class="mtext-106 cl2" style="text-decoration: line-through; padding-right: 20px;">'
							+ formatPrice(price) + '</span>'
							+ '<span class="mtext-106 cl2" style="color: red;">'
							+ formatPrice(discountPrice) + '</span>'
			;
		} else {
			priceTemplate += '<span class="mtext-106 cl2">' + formatPrice(price) + '</span>';	
		}

		if (parseInt(stock) > 0) {
			$('#quantity').show();
			$('button#add-to-cart').show();
			$('button#sold-out').hide();
			$('input[name="quantity"]').attr('max', stock);
		} else {
			$('#quantity').hide();
			$('button#sold-out').show();
			$('button#add-to-cart').hide();
		}

		$('div#product-price').html(priceTemplate);
		$('p#product-code').html(mainCode);
		$('input[name="main_product_id"]').val(mainId);
	}

	function checkAddToCart(el) {
		var color = $('select[name="color"]').val();
		var size = $('select[name="size"]').val();

		if (size == null || color == null) {
			return false;
		}

		return true;
	}

</script>

@stop