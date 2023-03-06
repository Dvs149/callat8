@extends("layout.frontend-default-layout")
@section('content')
 
	<div class="col-xs-12 col-sm-12 col-md-12 welcome_sec">

		<div class="row">

			<div class="container">

				<div class="row">

					<div class="col-xs-12 col-sm-6 col-md-6 wow fadeInLeft">

						<img src="{{ asset('assets/front-side/images/welcome-img.png') }}" alt="" />

					</div>

					<div class="col-xs-12 col-sm-6 col-md-6 wow fadeInRight">

						<h2>Be the first to try <strong>Call at 7</strong></h2>

						<p>Callat7 uses motorbikes and cars for instant door-to-door delivery service. The service is currently available for pick-up and destination islandwide.</p>

						<a href="https://play.google.com/store/apps/details?id=com.callAt7" class="button" target="_blank">DOWNLOAD APP</a>

					</div>

				</div>

			</div>

		</div>

		<div class="green_shape"></div>

	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 whychoose_sec">

		<div class="row">

			<div class="container">

				<h2 class="wow fadeInDown">Why Choose Us?</h2>

				<div class="content">

					<ul>

						<li class="wow fadeInLeft">

							<div class="icon"><img src="{{ asset('assets/front-side/images/whychoose_icon1.png')}}" alt="" /></div>

							<h3>Fast and Convenient Delivery Service</h3>

							<p>With single tap, book a door to door express delivery for your documents and parcels</p>

						</li>

						<li class="wow fadeInLeft" data-wow-delay="0.5s">

							<div class="icon"><img src="{{ asset('assets/front-side/images/whychoose_icon2.png')}}" alt="" /></div>

							<h3>Delivered Safely and with Care</h3>

							<p>Hand over your parcels to our well-trained drivers, and track the delivery real-time</p>

						</li>

						<li class="wow fadeInLeft" data-wow-delay="0.8s">

							<div class="icon"><img src="{{ asset('assets/front-side/images/whychoose_icon3.png')}}" alt="" /></div>

							<h3>Competitive Pricing</h3>

							<p>Competitive upfront fixed fares for all your deliveries</p>

						</li> 

						<li class="wow fadeInLeft" data-wow-delay="1.1s">

							<div class="icon"><img src="{{ asset('assets/front-side/images/whychoose_icon4.png')}}" alt="" /></div>

							<h3>Deliver with Peace of Mind</h3>

							<p>{{-- Every delivery is insured for up to USD 200 --}}</p>

						</li> 

					</ul>

					<a class="button wow fadeInUp" href="{{ url('/how_it_works') }}">HOW IT WORKS</a>

				</div>

			</div>

		</div>

		<div class="wit_shape"></div>

	</div>

	{{-- <div class="col-xs-12 col-sm-12 col-md-12 rates_sec">
		<div class="row">
			<div class="container">
				<h2 class="wow fadeInDown">WHAT ARE THE <strong>Rates</strong></h2>
				<p class="wow fadeInUp">*Applies to the combined size and weight of all the parcels within a single delivery booking</p>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 content_box wow fadeInLeft">
						<div class="icon"><img src="{{ asset('assets/front-side/images/rate-img1')}}.png" alt="" /></div>
						<h3>Callat7 - BIKE</h3>
						<ul>
							<li>Base Fare : $ 9.99</li>
							<li>Per Km rate : $ 1 / km (up to 5km)</li>
							<li>Surcharge : $ 2 for CBD pick-up/drop-off</li>
							<li>Operating Hours : 7AM - 11PM Daily</li>
						</ul>
						<a class="button" href="#">LEARN MORE</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 content_box wow fadeInRight">
						<div class="icon"><img src="{{ asset('assets/front-side/images/rate-img2')}}.png" alt="" /></div>
						<h3>Callat7 - Car</h3>
						<ul>
							<li>Base Fare : $ 9.99</li>
							<li>Per Km rate : $ 1 / km (up to 5km)</li>
							<li>Surcharge : $ 2 for CBD pick-up/drop-off</li>
							<li>Operating Hours : 7AM - 11PM Daily</li>
						</ul>
						<a class="button" href="#">LEARN MORE</a>
					</div>                                                      
				</div>
			</div>
		</div>
	</div> --}}

	<div class="col-xs-12 col-sm-12 col-md-12 works_sec">

		<div class="row">

			<div class="container">

				<h2 class="wow fadeInDown">How it Works</h2>

				<div class="content">

					<ul>

						<li>

							<div class="works_cont wow fadeInRight">

								<h5>STEP 1</h5>

								<h3>pick-up and drop-off locations</h3>

								<p>Key in your pick-up and drop-off locations to get your upfront fixed fare.</p>

							</div>

							<div class="works_image wow fadeInLeft"><img src="{{ asset('assets/front-side/images/work-img1')}}.jpg" alt="" /></div>

						</li>

						<li>

							<div class="works_cont wow fadeInLeft">

								<h5>STEP 2</h5>

								<h3>Fill in recipient information and confirm your booking</h3>

								<p>Key in the recipient's name, mobile number and additional drop-off details such as floor/unit no (if applicable). Tap "Book" to place your booking.</p>

							</div>

							<div class="works_image wow fadeInRight"><img src="{{ asset('assets/front-side/images/work-img2')}}.jpg" alt="" /></div>

						</li>

						<li>

							<div class="works_cont wow fadeInRight">

								<h5>STEP 3</h5>

								<h3>Get a driver</h3>

								<p>After confirming your booking, the nearest driver will receive your order and head to the pick-up point right away.</p>

							</div>

							<div class="works_image wow fadeInLeft"><img src="{{ asset('assets/front-side/images/work-img3')}}.jpg" alt="" /></div>

						</li>

						<li>

							<div class="works_cont wow fadeInLeft">

								<h5>STEP 4</h5>

								<h3>Track your delivery</h3>

								<p>You can track your parcel real-time in the our App. Your recipient will also receive a SMS with a tracking URL to check the delivery progress.</p>

							</div>

							<div class="works_image wow fadeInRight"><img src="{{ asset('assets/front-side/images/work-img4')}}.jpg" alt="" /></div>

						</li>

					</ul>

				</div>

			</div>

		</div>

		<div class="wit_shape"></div>

	</div>
	{{-- <div class="col-xs-12 col-sm-12 col-md-12 ">

		<div class="row">
			
			<div class="container testimonial_right  ">     
				<div class="col-xs-6 col-sm-6 col-md-6 ">

					<div class="title testimonial">
						<h3>Our Happy</h3>
						<h1>Customers</h1>
					</div>
					<div class="review_link">
						<form name="move_to_customers_feedback" id="move_to_customers_feedback" method="post" action="">
						<input type="hidden" name="sbnt_feedback">
						<i class="mdi mdi-plus-circle-outline pr-5" style="padding-right: 5px;"></i><a href="{{url('post-review')}}">Post Review</a>
						</form>
					</div>
					<div class="review_link"> <i class="mdi mdi-comment"></i><a href="{{url('Customers-review')}}">See All Reviews</a> </div>

				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 ">
					
					<div class="bxslider col-xs-6 col-sm-6 col-md-6 p-5">
						@foreach($testimonial as $key => $value)
						<div class="slider_cont">
							<h2>{{$value['user_name']}}</h2><br>
							<p>{{$value['message']}}</p><br>
							<p>{{$value['date']}}</p>
						</div>	
						@endforeach
					</div>

				</div>

			</div>

		</div>

	</div> --}}
	
	<div class="col-xs-12 col-sm-12 col-md-12 ourpromise_sec">

		<div class="row">

			<div class="container">                	

				<h2 class="wow fadeInLeft">Our promise towards a SAFER EVERYDAY</h2>

				<a href="https://play.google.com/store/apps/details?id=com.callAt7" target="_blank" class="button wow fadeInRight">DOWNLOAD APP</a>

			</div>

		</div>

	</div>
@endsection