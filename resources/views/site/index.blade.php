@extends('layouts.site')
@section('content')
	<section class="hero-section gap" style="background-image: url(assets/img/background-1.png);">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="restaurant">
						<h3>The Best and Affordable delivery rates
							in your Uganda</h3>
						{{-- <p>Rates in Uganda.</p> --}}
						{{-- <div class="nice-select-one">
							<select class="nice-select Advice">
							  <option>Choose a Restaurant</option>
							  <option>Choose a Restaurant 1</option>
							  <option>Choose a Restaurant 2</option>
							  <option>Choose a Restaurant 3</option>
							  <option>Choose a Restaurant 4</option>
						</select>
						<a href="#" class="button button-2">Order Now</a>
						</div> --}}
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="img-restaurant">
						<img alt="man" src="{{ asset('images/delivery2.jpg') }}" style="width:100%;height:650px;">
						{{-- <div class="wilmington">
							<img alt="img" src="https://via.placeholder.com/90x90">
							<div>
								<p>Restaurant of the Month</p>
								<h6>The Wilmington</h6>
								<div>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-regular fa-star-half-stroke"></i>
								</div>
							</div>
						</div> --}}
						{{-- <div class="wilmington location-restaurant">
							<i class="fa-solid fa-location-dot"></i>
							<div>
								<h6>12 Restaurant</h6>
								<p>In Your city</p>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- works-section -->
	<section class="works-section gap no-top">
		<div class="container">
			<div class="hading" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
				<h2>How it works</h2>
				<p>Getting started with Amari Delivery<br> mobile App.</p>
			</div>
			<div class="row ">
				<div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="work-card">
						<img alt="img" src="{{ asset('images/appleplay.png') }}">
						<h4><span>01</span>  DownLoad App</h4>
						<p>First and Foremost download our mobile app to get started using the PartnerApp Link Button from above or use this link <a>AmariHitch</a></p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="work-card">
						<img alt="img" src="{{ asset('images/reglog.jpeg') }}">
						<h4><span>02</span>Register/Login</h4>
						<p>Create an account if you do not have one yet after successfull registration, the app will login you in. Or Login with your phone number and password to start.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="400" data-aos-duration="500">
					<div class="work-card">
						<img alt="img" src="{{ asset('images/sendpackage.png') }}">
						<h4><span>03</span>Start</h4>
						<p>Starting sending packages by clicking on the send packages link.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- best-restaurants -->

	<!-- your-favorite-food -->
	<section class="your-favorite-food gap" style="background-image: url(assets/img/background-1.png);">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="food-photo-section">
						<img alt="img" src="{{ asset('images/allmodes.jpg') }}">
						{{-- <a href="#" class="one"><i class="fa-solid fa-burger"></i>Trucks</a>
						<a href="#" class="two"><i class="fa-solid fa-cheese"></i>Motorcycles/Bodas</a>
						<a href="#" class="three"><i class="fa-solid fa-pizza-slice"></i>Vans</a> --}}
					</div>
				</div>
				<div class="col-lg-6 offset-lg-1" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
					<div class="food-content-section">
						<h2>All Modes Of Transport
								</h2>
								<p>
                                    Choose from a wide variety of motor veihcles depending on the size and sensitivity of your parcel.
                                </p>
								<a href="#" class="button button-2">AmariHitch</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- counters-section -->
	{{-- <section class="counters-section">
		<div class="container">
			<div class="row align-items-center">
					<div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
						<div>
							<h2>Service shows good taste.</h2>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
						<div class="count-time">
								<h2 class="timer count-title count-number" data-to="976" data-speed="2000">976</h2>
									<p>Satisfied<br>
									Customer</p>
						</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="400" data-aos-duration="500">
						<div class="count-time">
								<h2 class="timer count-title count-number" data-to="12" data-speed="2000">12</h2>
									<p>Best<br>
											Restaurants</p>
						</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="500" data-aos-duration="600">
						<div class="count-time sp">
								<h2 class="timer count-title count-number" data-to="1" data-speed="2000">1</h2>
								<span>k+</span>
									<p>Food<br>
											Delivered</p>
						</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- reviews-sections -->
	{{-- <section class="reviews-sections gap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-12" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="reviews-content">
						<h2>What customers say about us</h2>
						<div class="custome owl-carousel owl-theme">
							<div class="item">
								<h4>"Dapibus ultrices in iaculis nunc sed augue lacus viverra vitae. Mauris a diam maecenas sed enim. Egestas diam in arcu cursus euismod quis. Quam quisque id diam vel".</h4>
								<div class="thomas">
									<img alt="girl" src="https://via.placeholder.com/70x70">

									<div>
										<h6>Thomas Adamson</h6>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
									</div>
								</div>
						</div>
						<div class="item">
								<h4>"Dapibus ultrices in iaculis nunc sed augue lacus viverra vitae. Mauris a diam maecenas sed enim. Egestas diam in arcu cursus euismod quis. Quam quisque id diam vel".</h4>
								<div class="thomas">
									<img alt="girl" src="https://via.placeholder.com/70x70">

									<div>
										<h6>Thomas Adamson</h6>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
									</div>
								</div>
						</div>
						<div class="item">
								<h4>"Dapibus ultrices in iaculis nunc sed augue lacus viverra vitae. Mauris a diam maecenas sed enim. Egestas diam in arcu cursus euismod quis. Quam quisque id diam vel".</h4>
								<div class="thomas">
									<img alt="girl" src="https://via.placeholder.com/70x70">

									<div>
										<h6>Thomas Adamson</h6>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
									</div>
								</div>
						</div>
					</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-12" data-aos="fade-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="reviews-img">
						<img alt="photo" src="https://via.placeholder.com/676x585">
						<i class="fa-regular fa-thumbs-up"></i>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
		<!-- join-partnership -->
		{{-- <section class="join-partnership gap" style="background-color: #363636;">
		<div class="container">
			<h2>Want to Join Partnership?</h2>
			<div class="row">
				<div class="col-lg-6" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="join-img">
						<img alt="img" src="https://via.placeholder.com/626x393">
						<div class="Join-courier">
							<h3>Join Courier</h3>
							<a href="become-partner.html" class="button button-2">Learn More <i class="fa-solid fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-6" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="join-img">
						<img alt="img" src="https://via.placeholder.com/626x393">
						<div class="Join-courier">
							<h3>Join Merchant</h3>
							<a href="become-partner.html" class="button button-2">Learn More <i class="fa-solid fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- news-section -->
	{{-- <section class="news-section gap">
		<div class="container">
			<h2>Latest news and	events</h2>
			<div class="row">
				<div class="col-xl-6 col-lg-12" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="news-posts-one">
						<img alt="man" src="https://via.placeholder.com/626x269">
						<div class="quickeat">
							<a href="#">news</a>
							<a href="#">quickeat</a>
						</div>
						<h3>We Have Received An Award For The Quality Of Our Work</h3>
							<p>Donec adipiscing tristique risus nec feugiat in fermentum. Sapien eget mi proin sed libero. Et magnis dis parturient montes nascetur.
							Praesent semper feugiat nibh sed pulvinar proin gravida.</p>
							<a href="#">Read More<i class="fa-solid fa-arrow-right"></i></a>
							<ul class="data">
								<li><h6><i class="fa-solid fa-user"></i>by Quickeat</h6></li>
								<li><h6><i class="fa-regular fa-calendar-days"></i>01.Jan. 2022</h6></li>
								<li><h6><i class="fa-solid fa-eye"></i>132</h6></li>
							</ul>

					</div>
				</div>
				<div class="col-xl-6 col-lg-12" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="news-post-two">
						<img alt="food-img" src="https://via.placeholder.com/200x200">
							<div class="news-post-two-data">
								<div class="quickeat">
									<a href="#">restaurants</a>
									<a href="#">cooking</a>
								</div>
								<h6><a href="single-blog.html">With Quickeat you can order food for
											the whole day</a></h6>
								<p>Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor...</p>
								<ul class="data">
										<li><h6><i class="fa-solid fa-user"></i>by Quickeat</h6></li>
										<li><h6><i class="fa-regular fa-calendar-days"></i>01.Jan. 2022</h6></li>
										<li><h6><i class="fa-solid fa-eye"></i>132</h6></li>
								</ul>
						</div>
					</div>
					<div class="news-post-two">
						<img alt="food-img" src="https://via.placeholder.com/200x200">
							<div class="news-post-two-data">
								<div class="quickeat">
									<a href="#">restaurants</a>
									<a href="#">cooking</a>
								</div>
								<h6><a href="single-blog.html">127+ Couriers On Our Team!</a></h6>
								<p>Urna condimentum mattis pellentesque id nibh tortor id aliquet. Tellus at urna condimentum mattis...</p>
								<ul class="data">
										<li><h6><i class="fa-solid fa-user"></i>by Quickeat</h6></li>
										<li><h6><i class="fa-regular fa-calendar-days"></i>01.Jan. 2022</h6></li>
										<li><h6><i class="fa-solid fa-eye"></i>132</h6></li>
								</ul>
						</div>
					</div>
					<div class="news-post-two end">
						<img alt="food-img" src="https://via.placeholder.com/200x200">
							<div class="news-post-two-data">
								<div class="quickeat">
									<a href="#">restaurants</a>
									<a href="#">cooking</a>
								</div>
								<h6><a href="single-blog.html">Why You Should Optimize Your
																Menu for Delivery</a></h6>
								<p>Enim lobortis scelerisque fermentum dui. Sit amet cursus sit amet dictum sit amet. Rutrum tellus...</p>
								<ul class="data">
										<li><h6><i class="fa-solid fa-user"></i>by Quickeat</h6></li>
										<li><h6><i class="fa-regular fa-calendar-days"></i>01.Jan. 2022</h6></li>
										<li><h6><i class="fa-solid fa-eye"></i>132</h6></li>
								</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
@endsection
