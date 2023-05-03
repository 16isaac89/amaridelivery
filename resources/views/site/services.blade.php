@extends('layouts.site')
@section('content')
  <!-- hero-section -->
  <section class="hero-section about gap" style="background-image: url(assets/img/background.png);">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-12" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="about-text">
						<ul class="crumbs d-flex">
							<li><a href="index.html">Home</a></li>
							<li class="two"><a href="index.html"><i class="fa-solid fa-right-long"></i>Service</a></li>
						</ul>
						<h2>Service shows
							good taste</h2>
						<p>Mauris nunc congue nisi vitae suscipit tellus mauris. Ac tincidunt vitae semper quis lectus. Sollicitudin ac orci phasellus egestas tellus.</p>
						<a href="#" class="button button-2">Select Restaurant</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12" data-aos="fade-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="hero-section-img-service">
						<div class="row align-items-center">
							<div class="col-lg-6 col-md-6 col-sm-6 col-6">
								<div class="counter-img">
									<img alt="man" src="https://via.placeholder.com/321x321">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-6">
								<div class="counter-img-data">
									<h2>1K+</h2>
									<span>Food<br> Delivered</span>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-6">
								<div class="counter-img-data black">
									<h2>12</h2>
									<span>Best<br>Restaurants</span>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-6">
								<div class="counter-img">
									<img alt="man" src="https://via.placeholder.com/321x321">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services Cards -->
	<section class="services-cards gap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-12" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300"
				>
					<div class="services-info">
						<h2>Make you easier and happier</h2>
						<p>Risus quis varius quam quisque id diam vel quam elementum. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Mauris pharetra et ultrices neque. Id ornare arcu odio ut sem. Sed vulputate mi sit amet mauris.</p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-md-6" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400"
					>
					<div class="services-card-style">
						<i class="fa-regular fa-clock"></i>
						<h4><a href="#">Save<br>
							Your Time</a></h4>
						<p>Turpis cursus in hac habitasse platea. Magna fringilla urna porttitor dolor purus non enim. Molestie nunc non blandit.</p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-md-6" data-aos="flip-up"  data-aos-delay="400" data-aos-duration="500"
					>
					<div class="services-card-style">
						<i class="fa-solid fa-plate-wheat"></i>
						<h4><a href="#">Variety<br>
							Food</a></h4>
						<p>Tempor orci dapibus ultrices in iaculis nunc sed augue. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo.</p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-md-6" data-aos="flip-up"  data-aos-delay="600" data-aos-duration="700"
					>
					<div class="services-card-style">
						<i class="fa-solid fa-utensils"></i>
						<h4><a href="#">Free<br>
							Delivery</a></h4>
						<p>Cras fermentum odio eu feugiat pretium nibh ipsum. Ut faucibus pulvinar elementum integer .</p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-md-6" data-aos="flip-up"  data-aos-delay="700" data-aos-duration="800"
					>
					<div class="services-card-style">
						<i class="fa-solid fa-tag"></i>
						<h4><a href="#">Regular<br>
								Discounts</a></h4>
						<p>Morbi leo urna molestie at elementum eu facilisis sed odio. Mattis nunc sed blandit libero volutpat sed cras ornare.</p>
					</div>
				</div>
				<div class="col-xl-6 col-lg-12" data-aos="flip-up"  data-aos-delay="900" data-aos-duration="1000"
					>
					<div class="services-cards-text">
						<h2>Best quality Food and Restaurant</h2>
						<ul class="paragraph">
							<li><i class="fa-solid fa-circle-check"></i><h5>Duis ultricies lacus sed turpis tincidunt;</h5></li>
							<li><i class="fa-solid fa-circle-check"></i><h5>Lectus vestibulum mattis ullamcorper;</h5></li>
							<li><i class="fa-solid fa-circle-check"></i><h5>Massa tempor nec feugiat nisl pretium;</h5></li>
							<li><i class="fa-solid fa-circle-check"></i><h5>velit sed ullamcorper morbi tincidunt ornare.</h5></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- works-section -->
	<section class="works-section gap" style="background:#fcfcfc">
		<div class="container">
			<div class="hading" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
				<h2>How it works</h2>
				<p>Magna sit amet purus gravida quis blandit turpis cursus. Venenatis tellus in metus vulputate eu scelerisque felis.</p>
			</div>
			<div class="row ">
				<div class="col-lg-4" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300"
					>
					<div class="work-card service">
						<img alt="img" src="https://via.placeholder.com/300x154">
						<h4>Select Restaurant</h4>
						<p>Non enim praesent elementum facilisis leo vel fringilla. Lectus proin nibh nisl condimentum id. Quis varius quam quisque id diam vel.</p>
					</div>
				</div>
				<div class="col-lg-4" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400"
					>
					<div class="work-card service">
						<img alt="img" src="https://via.placeholder.com/300x154">
						<h4>Select menu</h4>
						<p>Eu mi bibendum neque egestas congue quisque. Nulla facilisi morbi tempus iaculis urna id volutpat lacus. Odio ut sem nulla </p>
					</div>
				</div>
				<div class="col-lg-4" data-aos="flip-up"  data-aos-delay="500" data-aos-duration="600"
					>
					<div class="work-card service">
						<img alt="img" src="https://via.placeholder.com/300x154">
						<h4>Wait for delivery</h4>
						<p>Nunc lobortis mattis aliquam faucibus. Nibh ipsum consequat nisl vel pretium lectus quam id leo. A scelerisque purus semper eget.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Sit at Home Section -->
	<section class="sit-at-home-section gap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-12" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="sit-at-img">
						<img alt="man" src="https://via.placeholder.com/601x606">
						<div class="counter-img-data">
									<h2>976</h2>
									<span>Satisfied<br>Customer</span>
								</div>
					</div>
				</div>
				<div class="offset-xl-1 col-xl-5 col-lg-12" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400"
					>
					<div class="sit-at-home-description">
						<h2>Sit at Home We Will Take Care Your Order</h2>
						<p>Magna sit amet purus gravida quis blandit turpis cursus. Venenatis tellus in metus vulputate eu scelerisque felis.</p>
						<ul class="food-dishes">
							<li><a href="#"><i class="fa-solid fa-burger"></i>Burgers</a></li>
							<li><a href="#"><i class="fa-solid fa-drumstick-bite"></i>Chicken</a></li>
							<li><a href="#"><i class="fa-solid fa-cheese"></i>Steaks</a></li>
							<li><a href="#"><i class="fa-solid fa-pizza-slice"></i>Pizza</a></li>
							<li><a href="#"><i class="fa-solid fa-fish"></i>Pizza</a></li>
						</ul>
						<a href="#" class="button button-2">Order Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- subscribe-section -->
	<section class="subscribe-section gap" style="background:#fcfcfc">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="img-subscribe">
						<img alt="Illustration" src="https://via.placeholder.com/676x403">
					</div>
				</div>
				<div class="col-lg-6" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400"
					>
					<div class="get-the-menu">
						<h2>Get the menu of your favorite restaurants every day</h2>
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
	@endsection