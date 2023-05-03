<header>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-2">
					<div class="header-style">
						<a href="{{route('front.index')}}">
							<img src="{{asset('siteassets/assets/img/amari.jpg')}}" id="Logo" style="width:90px;height:90px;border-radius:25px;border-width:2px;  border-style: solid;border-color:gold;">

						</a>
						<div class="extras bag">
		                   <div class="bar-menu">
		                   	<i class="fa-solid fa-bars"></i>
		                   </div>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<nav class="navbar">
				      <ul class="navbar-links">
				        <li class="navbar-dropdown {{ \Request::routeIs('front.index') ? 'active' : '' }}">
				          <a href="{{route('front.index')}}">Home</a>
				        </li>
				        <li class="navbar-dropdown {{ \Request::routeIs('front.about') ? 'active' : '' }}">
				          <a href="{{route('front.about')}}">About Us</a>
				        </li>
                        <li class="navbar-dropdown {{ \Request::routeIs('front.services') ? 'active' : '' }}"><a href="{{route('front.services')}}">Services</a></li>
                        <li class="navbar-dropdown {{ \Request::routeIs('front.faq') ? 'active' : '' }}"><a href="{{route('front.faq')}}">FAQ</a></li>
				        <li class="navbar-dropdown {{ \Request::routeIs('front.contact') ? 'active' : '' }}">
				          <a href="{{route('front.contact')}}">Contact Us</a>
				        </li>
                        <li class="navbar-dropdown {{ \Request::routeIs('front.partner') ? 'active' : '' }}">
				          <a href="{{route('front.partner')}}">Become a Partner</a>
				        </li>
				      </ul>
				    </nav>
				</div>
				<div class="col-lg-3">
					<div class="extras bag">
                    <a href="#" class="button button-2">Partner App</a>
						 <a href="#" class="button button-2">Rider App</a>
					</div>
				</div>
			 <div class="menu-wrap">
               <div class="menu-inner ps ps--active-x ps--active-y">
                 <span class="menu-cls-btn"><i class="cls-leftright"></i><i class="cls-rightleft"></i></span>
                 <div class="checkout-order">
						<div class="title-checkout">
							<h2>My Orders</h2>
						</div>
						<div class="banner-wilmington">
							<img alt="logo" src="https://via.placeholder.com/50x50">
							<h6>Kennington Lane Cafe</h6>
						</div>
						<ul>
							<li class="price-list">
							<i class="closeButton fa-solid fa-xmark"></i>
							<div class="counter-container">
								<div class="counter-food">
									<img alt="food" src="https://via.placeholder.com/100x67">
									<h4>Pasta, kiwi and sauce chilli</h4>
								</div>
								<h3>$39</h3>
							</div>
							<div class="price">
									<div>
					              		<h2>$39</h2>
					              		<span>Sum</span>
					              	</div>
					              		<div>
						             	 	<div class="qty-input">
												<button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
												<input class="product-qty" type="number" name="product-qty" min="0" value="1">
												<button class="qty-count qty-count--add" data-action="add" type="button">+</button>
											</div>
											<span>Quantity</span>
										</div>
										</div>
							</li>
							<li class="price-list">
							<i class="closeButton fa-solid fa-xmark"></i>
							<div class="counter-container">
								<div class="counter-food">
									<img alt="food" src="https://via.placeholder.com/100x67">
									<h4>Rice with shrimps and kiwi</h4>
								</div>
								<h3>$49</h3>
							</div>
							<div class="price">
									<div>
					              		<h2>$49</h2>
					              		<span>Sum</span>
					              	</div>
					              		<div>
						             	 	<div class="qty-input">
												<button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
												<input class="product-qty" type="number" name="product-qty" min="0" value="1">
												<button class="qty-count qty-count--add" data-action="add" type="button">+</button>
											</div>
											<span>Quantity</span>
										</div>
										</div>
							</li>
						</ul>
						<div class="totel-price">
							<span>Total order:</span>
							<h5>$137</h5>
						</div>
						<div class="totel-price">
							<span>To pay:</span>
							<h2>$137</h2>
						</div>
						<button class="button-price">Checkout</button>

					</div>
            	 </div>
         	 </div>
         	 <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">


            <div class="res-log">
            <a href="{{route('front.index')}}">
							<img src="{{asset('siteassets/assets/img/amari.jpg')}}" id="Logo" style="width:90px;height:90px;border-radius:25px;border-width:2px;  border-style: solid;border-color:gold;">

						</a>
          	</div>
			<ul>

				  <li><a href="{{route('front.index')}}">Home</a>
				  </li>

				  <li><a href="about.html">About Us</a></li>
                  <li >
				          <a href="{{route('front.about')}}">About Us</a>
				        </li>
                        <li><a href="{{route('front.services')}}">Services</a></li>
                        <li><a href="{{route('front.faq')}}">FAQ</a></li>
				        <li>
				          <a href="{{route('front.contact')}}">Contact Us</a>
				        </li>
                        <li> <a href="#" class="button button-2">Partner App</a></li>
                        <li><a href="#" class="button button-2">Rider App</a></li>

                </ul>

          <a href="JavaScript:void(0)" id="res-cross"></a>
      </div>
		</div>
	   </div>
  </header>