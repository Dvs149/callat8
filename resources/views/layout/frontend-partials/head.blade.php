<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1"/>

<title>Welcome to Callat7</title>



<!-- Google Fonts -->

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">



<!-- Material Icons -->

<link href="{{ asset('assets/front-side/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Bootstrap -->

<link href="{{ asset('assets/front-side/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

<!-- BX-Slider -->

<link href="{{ asset('assets/front-side/css/jquery.bxslider.css') }}" rel="stylesheet" type="text/css" />

<!-- WOW Animate -->

<link href="{{ asset('assets/front-side/css/animate.css') }}" rel="stylesheet" type="text/css" />

<!-- Main -->

<link href="{{ asset('assets/front-side/css/doublegoogle.css') }}" rel="stylesheet" type="text/css" />

<!-- Mobile -->

<link href="{{ asset('assets/front-side/css/skeleton.css') }}" rel="stylesheet" type="text/css" />



<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!--[if lt IE 9]>

<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script> 

<script src="{{ asset('assets/front-side/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/front-side/js/jquery.bxslider.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/front-side/js/stiky.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('assets/front-side/js/wow.js') }}"></script>

<script type="text/javascript">

$(document).ready(function(){

	$('.bxslider').bxSlider({

		mode: 'horizontal',   //'horizontal', 'vertical', 'fade'

		adaptiveHeight: true,

		speed: 500,

		auto: true,

		autoControls: false,

		infiniteLoop: true,

		pause: 7000,

		controls: false,

		hideControlOnEnd: true,

		pager: true,

		touchEnabled: true,

		captions: true,   //(false / true)

		oneToOneTouch: false

	});

});

//WOW Animate

$(window).load(function() {

	wow = new WOW({

		animateClass: 'animated',

		offset:       100,

		callback:     function(box) {

			console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")

		}

	});

	wow.init();

})

</script>