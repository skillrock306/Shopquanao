<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		session_start(); 
		$cart = !empty($_SESSION['cart']) ? $_SESSION['cart'] : array();
		$userEmail = !empty($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
		$userId = !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
	?>
	<title><?php echo !empty($pageTitle) ? $pageTitle : 'Home'; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../LayoutWeb/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/css/util.css">
	<link rel="stylesheet" type="text/css" href="../LayoutWeb/css/main.css">
<!--===============================================================================================-->
</head>

<body class="animsition">
<header class="header-v2">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="../LayoutWeb/images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Trang Chủ</a>
							</li>

							<li class="active-menu label1" data-label1="hot">
								<a href="index.php?view=product_list">Sản Phẩm</a>
								<ul class="sub-menu">
									<?php foreach ($categories as $idx => $category) : ?>
										<li><a href="index.php?view=product_list&category_id=<?php echo $category['id']; ?>"><?php echo $category['ten']; ?></a></li>									
									<?php endforeach; ?>
								</ul>
							</li>

							<!-- <li>
								<a href="index.php?view=content&action=blog">Blog</a>
							</li> -->

							<li>
								<a href="index.php?view=content&action=about">About</a>
							</li>

							<li>
								<a href="index.php?view=content&action=contact">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<div class="flex-c-m h-full p-r-24">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
								<i class="zmdi zmdi-search"></i>
							</div>
						</div>
							
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo !empty($cart['count']) ? $cart['count'] : 0; ?>">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>
							
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="../LayoutWeb/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-10">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>
				</div>

				<div class="flex-c-m h-full p-lr-10 bor5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="../LayoutWeb/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
</header>
<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>

					@if(auth()->check())
						<li class="p-b-13">
							<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
								Xin chào {{auth()->user()->email }}
							</a>
						</li>

						<li class="p-b-13">
							<a href="/logout" class="stext-102 cl2 hov-cl1 trans-04">
								Đăng xuất
							</a>
						</li>
					@else
						<li class="p-b-13">
							<a href="/login" class="stext-102 cl2 hov-cl1 trans-04">
								Đăng nhập
							</a>
						</li>
						<li class="p-b-13">
							<a href="/register" class="stext-102 cl2 hov-cl1 trans-04">
								Đăng ký
							</a>
						</li>
						<li class="p-b-13">
							<a href="/trackOder" class="stext-102 cl2 hov-cl1 trans-04">
								Track Oder
							</a>
						</li>
					@endif
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@ CozaStore
					</span>

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../LayoutWeb/images/gallery-01.jpg" data-lightbox="gallery" 
							style="background-image: url('../LayoutWeb/images/gallery-01.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../LayoutWeb/images/gallery-02.jpg" data-lightbox="gallery" 
							style="background-image: url('../LayoutWeb/images/gallery-02.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../LayoutWeb/images/gallery-03.jpg" data-lightbox="gallery" 
							style="background-image: url('../LayoutWeb/images/gallery-03.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../LayoutWeb/images/gallery-04.jpg" data-lightbox="gallery" 
							style="background-image: url('../LayoutWeb/images/gallery-04.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../LayoutWeb/images/gallery-05.jpg" data-lightbox="gallery" 
							style="background-image: url('../LayoutWeb/images/gallery-05.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../LayoutWeb/images/gallery-06.jpg" data-lightbox="gallery" 
							style="background-image: url('../LayoutWeb/images/gallery-06.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../LayoutWeb/images/gallery-07.jpg" data-lightbox="gallery" 
							style="background-image: url('../LayoutWeb/images/gallery-07.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../LayoutWeb/images/gallery-08.jpg" data-lightbox="gallery" 
							style="background-image: url('../LayoutWeb/images/gallery-08.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../LayoutWeb/images/gallery-09.jpg" data-lightbox="gallery" 
							style="background-image: url('../LayoutWeb/images/gallery-09.jpg');"></a>
						</div>
					</div>
				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						About Us
					</span>

					<p class="stext-108 cl6 p-t-27">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit. Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem fermentum quis. 
					</p>
				</div>
			</div>
		</div>
	</aside>


	<!-- Cart -->
	<?php if (!empty($cart)) : ?>
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<form name="mini-cart" class="bg0 p-t-75 p-b-85" action="index.php?view=shopingcart" method="POST">
						<?php foreach ($cart as $key => $item): ?>
							<?php if (is_numeric($key)) : ?>
								<li class="header-cart-item flex-w flex-t m-b-12">
									<div class="header-cart-item-img" onclick="miniCartDelete(this);" data-idx="<?php echo $key; ?>">
										<img src="<?php echo PRODUCT_IMAGE_PATH . $item['tenhinh']; ?>" alt="IMG">
									</div>

									<div class="header-cart-item-txt p-t-8">
										<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
											<?php echo $item['ten']; ?>
										</a>

										<span class="header-cart-item-info">
											<?php echo $item['quantity']; ?> x <?php echo $db->formatPrice($item['giamgia']); ?>
										</span>
									</div>
								</li>
							<?php else: ?>
							<?php endif; ?>
						<?php endforeach; ?>
						<input type="hidden" name="action" value="delete">
						<input type="hidden" name="index" value="">
					</form>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: <?php echo $db->formatPrice($cart['total']); ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="index.php?view=shopingcart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="index.php?view=checkout" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>