@extends('layouts.site')
@section('content')
  <!-- hero-section -->
  <section class="hero-section about gap">
		<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-6 col-lg-12" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
						<div class="about-text">
							<ul class="crumbs d-flex">
								<li><a href="index.html">Home</a></li>
								<li class="two"><a href="index.html"><i class="fa-solid fa-right-long"></i>Contacts</a></li>
							</ul>
							<h2>Contact us</h2>
							<p>Egestas sed tempus urna et pharetra pharetra massa. Fermentum posuere urna nec tincidunt praesent semper.</p>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="address">
									<i class="fa-solid fa-location-dot"></i>
									<h5>1717 Harrison St, San Francisco,
											CA 94103, United States</h5>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="address">
									<i class="fa-solid fa-envelope"></i>
									<a href="mailto:quick.info@mail.net"><h6>quick.info@mail.net</h6></a>
									<span>Lorem ipsum dolor sit.</span>
									<a href="mailto:quick.info@mail.net"><h6>quick.info@mail.net</h6></a>
									<span>Dolore magna aliqua</span>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="address">
									<i class="fa-solid fa-phone"></i>
									<a href="callto:+14253261627"><h6>+1 425 326 16 27</h6></a>
									<span>Et netus et malesuada</span>
									<a href="callto:+14253261627"><h6>+1 425 326 16 27</h6></a>
									<span>Enim tortor auctor urna</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12" data-aos="fade-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="contact-us-img">
						<img alt="contacts-img-girl" src="https://via.placeholder.com/546x447">
					</div>

				</div>
				</div>
		</div>
  </section>
  <!-- contact map -->
  <section class="gap no-top">
  	<div class="container">
  		<div class="row">
  			<div class="col-lg-12" data-aos="fade-up"  data-aos-delay="300" data-aos-duration="400">
  				<div class="contact-map-data">
						<div class="join-courier content">
							<h3>Get in touch with us</h3>
							<p>Magna sit amet purus gravida quis blandit turpis cursus. Venenatis tellus in metus vulputate eu scelerisque felis.</p>
							<form class="blog-form">
								<div class="name-form">
									<i class="fa-regular fa-user"></i>
									<input type="text" name="name" placeholder="Enter your name">
								</div>
								<div class="name-form">
									<i class="fa-regular fa-envelope"></i>
									<input type="text" name="email" placeholder="Enter your email">
								</div>
								<textarea placeholder="Enter your message"></textarea>
								<button class="button-price">Submit Application</button>
							</form>

						</div>
						<div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2689446.104646556!2d28.705460424349365!3d48.83127549941125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d1d9c154700e8f%3A0x1068488f64010!2sUkraine!5e0!3m2!1sen!2s!4v1661009847728!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
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
						<img alt="Illustration" src="https://via.placeholder.com/546x325">
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
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