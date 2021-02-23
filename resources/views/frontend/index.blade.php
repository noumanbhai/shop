<!DOCTYPE html>
<html lang="en">
<head>
	<title>OneTech</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@include('frontend.layout.style')
</head>
<body>
	<div class="super_container">

		<!-- Header -->

		<header class="header">

			<!-- Top Bar -->
			@include('frontend.layout.topbar')
			<!-- Top Bar End-->
			<!-- Header Main -->
			@include('frontend.layout.headermain')
			<!-- Header Main -->
			<!-- Main Navigation -->
			@include('frontend.layout.navigation')
			<!-- Main Navigation End-->
			<!-- Menu End-->
		</header>

		<!-- Banner -->
		@include('frontend.layout.banner')
		<!-- Banner End-->
		<!-- Characteristics char item-->
		@include('frontend.layout.character')
		<!-- Characteristics char item End-->
		<!-- Deals of the week -->
		<!-- Deals of the week End-->
		<!-- Popular Categories -->
		@include('frontend.layout.popularcat')
		<!-- Popular Categories -->
		<!-- Banner -->
		@include('frontend.layout.banner')
		<!-- Banner End-->
		<!-- Hot New Arrivals -->
		@include('frontend.layout.hotarrival')
		<!-- Hot New Arrivals End-->
		<!-- Best Sellers Slider item-->
		@include('frontend.layout.bestseller')
		<!-- Best Sellers Slider item-->
		<!-- Adverts item-->
		@include('frontend.layout.adverts')
		<!-- Adverts End-->
		<!-- Trends content slider item-->
		@include('frontend.layout.trends')
		<!-- Trends End-->
		<!-- Reviews Slider Item-->
		@include('frontend.layout.review')
		<!-- EndReviews Slider Item-->
		<!-- Recently Viewed slider item  all-->
		@include('frontend.layout.recentview')
		<!-- End Recently Viewed slider item  all-->
		<!-- Brands and Brand Slider-->
		@include('frontend.layout.brands')
		<!-- Brands and Slider End-->
		<!-- Newsletter -->
		@include('frontend.layout.newsleter')
		<!-- Newsletter End-->
		<!-- Footer -->
		@include('frontend.layout.footer')
		<!-- Copyright -->
		<!-- Footer  and Copyright End-->

	</div>
	<!-- Script -->
	@include('frontend.layout.script')
	<!-- Script End-->

</body>

</html>

