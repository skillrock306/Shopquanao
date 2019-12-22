@extends('ftontend.master')
@section('title','Thông tin liên hệ')
@section('main')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../LayoutWeb/images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Contact
	</h2>
</section>	

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">

			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-map-marker"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Address
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-phone-handset"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Lets Talk
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							+1 800 1236879
						</p>
					</div>
				</div>

				<div class="flex-w w-full">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-envelope"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Sale Support
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							contact@example.com
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>	


<!-- Map -->
<div class="map">
	<div class="size-303" id="google_map" data-map-x="10.824632" data-map-y="106.638686" data-pin="../LayoutWeb/images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="18"></div>
</div>

<!--===============================================================================================-->
	<script src="../LayoutWeb/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="../LayoutWeb/js/map-custom.js"></script>
<!--===============================================================================================-->

@stop