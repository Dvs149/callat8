<div class="header-divider"></div>

<div id="header">

	<div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('assets/front-side/images/logo.png') }}" border="0" alt="" /></a></div>

	<div class="login_box">

		{{-- <ul>

			<li><a href="#">LOGIN</a></li>

			<li><a href="#">SIGN UP</a></li>

		</ul> --}}

	</div>

	<div class="menu_box">

		<ul class="menu">

			<li class="{{(request()->is('/') ? 'current_page_item' : '')}}"><a href="{{ url('/') }}">Home</a></li>

			<li class="{{ (request()->is('about_us')) ? 'current_page_item' : '' }}" ><a href="{{ url('/about_us') }}">ABOUT US</a></li>

			{{-- <li><a href="#">PRICING</a></li> --}}

			<li class="{{ (request()->is('how_it_works')) ? 'current_page_item' : '' }}"><a href="{{ url('/how_it_works') }}">HOW IT WORKS</a></li>

			<li class="{{ (request()->is('contact')) ? 'current_page_item' : '' }}"><a href="{{ url('/contact') }}">CONTACT</a></li>

		</ul>

	</div>

	<div class="menu_box2">

		<button id="responsive-menu-button" class="responsive-menu-button responsive-menu-boring responsive-menu-accessible" type="button" aria-label="Menu">    

			<span class="responsive-menu-box"></span>

			<span class="responsive-menu-inner"></span>			</button>				      

	</div>

</div>