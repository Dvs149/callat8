<div id="footer">

	<div class="container">

    	<div class="row">

			<div class="col-xs-12 col-sm-6 col-md-6 ftr_logo">

				<img src="{{ asset('assets/front-side/images/ftr_logo.png') }}" alt="" />

			</div>

			<div class="col-xs-12 col-sm-6 col-md-6">					

				<div class="ftr_social">

					<ul style="float: none;">
						@if($social_link->facebook!='')
						<li><a href="{{ $social_link->facebook }}" target="_blank"><i class="mdi mdi-facebook"></i>Facebook</a></li>
						@endif

						@if($social_link->twitter!='')
						<li><a href="{{ $social_link->twitter }}" target="_blank"><i class="mdi mdi-twitter"></i>Twitter</a></li>
						@endif

						@if($social_link->instagram!='')
						<li><a href="{{ $social_link->instagram }}" target="_blank"><i class="mdi mdi-instagram"></i>Instagram</a></li>
						@endif
					</ul>

				</div>

				<div class="copy_text">

					<p style="float: none;">© 2020 Callat7. All Rights Reserved.</p> 

					<p style="float: none;">
						<a href="{{ url('/terms_and_condition') }}">Terms and Conditions</a>  |
						<a href="{{ url('/privacy_policy') }}">Privacy Policy</a>
					</p>

				</div>

			</div>

        </div>

    </div>

</div>