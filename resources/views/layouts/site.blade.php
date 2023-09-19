<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amari Hitch</title>
  <link rel="icon" href="{{asset('siteassets/assets/img/fav-icon.png')}}">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- owl carousel -->
  <link rel="stylesheet" href="{{asset('siteassets/assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('siteassets/assets/css/owl.theme.default.min.css')}}">
  <!-- nice-select -->
  <link rel="stylesheet" href="{{asset('siteassets/assets/css/nice-select.css')}}">
  <!-- aos -->
  <link rel="stylesheet" href="{{asset('siteassets/assets/css/aos.css')}}">
  <!-- style -->
  <link rel="stylesheet" href="{{asset('siteassets/assets/css/style.css')}}">
  <!-- responsive -->
  <link rel="stylesheet" href="{{asset('siteassets/assets/css/responsive.css')}}">
	<!-- color -->
  <link rel="stylesheet" href="{{asset('siteassets/assets/css/color.css')}}">


	<!-- Font Awesome 5 -->
	<script src="https://kit.fontawesome.com/27a041baf1.js" crossorigin="anonymous"></script>
</head>
<body class="menu-layer">

	<!-- loader start-->
	<div class="page-loader">
		<div class="wrapper">
	        <div class="circle"></div>
	        <div class="circle"></div>
	        <div class="circle"></div>
	        <div class="shadow"></div>
	        <div class="shadow"></div>
	        <div class="shadow"></div>
	        <span>Loading</span>
	    </div>
	</div>
	<!-- loader end-->
@include('partials.siteheader')
	<!-- header -->

  <!-- hero-section -->
	@yield('content')





	<!-- subscribe-section -->
	<section class="subscribe-section gap" style="background:#fcfcfc">
		<div class="container">
			<div class="row align-items-center">
				{{-- <div class="col-lg-6" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="img-subscribe">
						<img alt="Illustration" src="{{ asset('images/signup.png') }}">
					</div>
				</div> --}}
				<div class="col-lg-12 offset-lg-1" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="get-the-menu">
						<h2>Subscribe to our news letter</h2>
						<form>
							<i class="fa-regular fa-bell"></i>
							<input type="text" name="email" placeholder="Enter email address">
							<button class="button button-2">Subscribe</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- footer -->
	<footer class="gap no-bottom" style="background-color: #363636;">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-12">
					<div class="footer-description">
                    <a href="{{route('front.index')}}">
							<img src="{{asset('siteassets/assets/img/amari.jpg')}}" id="Logo" style="width:90px;height:90px;border-radius:25px;border-width:2px;  border-style: solid;border-color:gold;">

						</a>
						</a>
					 <h6>Amarihitch Transport Delivery</h6>
						<p>We are a trusted delivery transport company dedicated to providing fast and reliable delivery solutions. With a commitment to efficiency and customer satisfaction, we ensure your goods reach their destination on time, every time. Choose us for seamless delivery services you can depend on.</p>
					</div>
				</div>
				{{-- <div class="col-lg-3 col-md-6 col-sm-12">
					<div class="menu">
						<h4>Menu</h4>
						<ul class="footer-menu">
							<li><a href="index.html">home<i class="fa-solid fa-arrow-right"></i></a></li>
							<li><a href="about.html">about us<i class="fa-solid fa-arrow-right"></i></a></li>
							<li><a href="restaurants.html">Restaurants<i class="fa-solid fa-arrow-right"></i></a></li>
							<li><a href="contacts.html">Contacts<i class="fa-solid fa-arrow-right"></i></a></li>
						</ul>
					</div>
				</div> --}}
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="menu contacts">
						<h4>Contacts</h4>
						<div class="footer-location">
							<i class="fa-solid fa-location-dot"></i>
							<p>1717 Harrison St, San Francisco, CA 94103,
									United States</p>
						</div>
						<a href="mailto:quickeat@mail.net"><i class="fa-solid fa-envelope"></i>quickeat@mail.net</a>
						<a href="callto:+14253261627"><i class="fa-solid fa-phone"></i>+1 425 326 16 27</a>
					</div>
					<ul class="social-media">
							<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
						</ul>
				</div>
			</div>
			<div class="footer-two gap no-bottom">
                <p>
				Copyright &copy; <script type="text/javascript">
                    document.write("2019 - "+ new Date().getFullYear());
                    </script>Amarihitch Transport Delivery </p>

			</div>
		</div>
	</footer>
	<!-- bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<!-- jQuery -->
	<script src="{{asset('/siteassets/assets/js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{asset('/siteassets/assets/js/jquery.nice-select.min.js')}}"></script>
	<!-- owl.carousel -->
	<script src="{{asset('/siteassets/assets/js/owl.carousel.min.js')}}"></script>
	<!-- aos -->
	<script src="{{asset('/siteassets/assets/js/aos.js')}}"></script>
	<!-- custom -->
	<script src="{{asset('/siteassets/assets/js/custom.js')}}"></script>
	@yield('scripts')
</body>
