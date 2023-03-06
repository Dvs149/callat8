<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Welcome to callat7</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

<!-- Material Icons -->
<link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- BX-Slider -->
<link href="css/jquery.bxslider.css" rel="stylesheet" type="text/css" />
<!-- WOW Animate -->
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<!-- Main -->
<link href="css/doublegoogle.css" rel="stylesheet" type="text/css" />
<!-- Mobile -->
<link href="css/skeleton.css" rel="stylesheet" type="text/css" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
<script src="js/stiky.js" type="text/javascript"></script>
<script type="text/javascript" src="js/wow.js"></script>
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
</head>

<body>

<div id="wrap">
	{{-- <div class="header-divider"></div>
    <div id="header">
		<div class="logo wow fadeInLeft"><a href="index.html"><img src="images/logo.png" border="0" alt="" /></a></div>
		
    </div> --}}
    
    
    
    <div id="middle">
        <div class="col-xs-12 col-sm-12 col-md-12 welcome_sec">
        	<div class="row">
            	<div class="container">
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							{{-- <h2>HOW IT WORKS</h2> --}}
							<p style="font-weight:bold;">Delivering within hours or even minutes Callat7 reduces all the hassle of going out in the traffic and save time.</p>
                            <p></p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Grocery</p>
							<p>Order anything from our app or website we get you your things either from our mentioned stores or even from your desired stores. We deliver within hours or even minutes. Moreover, if you want them at some preferred time, just mention and we do the needful.</p><br>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Anything</p>
							<p>Simply ask us to deliver anything from one place to another we deliver everything. Either medicine from pharmacy to you, books to school,food to work, forgotten tickets to airport or railway station, documents to bank or anywhere,keys, tools bags, anything anywhere at your time.</p><br>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Anything</p>
							<p>Simply ask us to deliver anything from one place to another we deliver everything. Either medicine from pharmacy to you, books to school,food to work, forgotten tickets to airport or railway station, documents to bank or anywhere,keys, tools bags, anything anywhere at your time.</p><br>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Driver</p>
							<p>When you have a car and your driver is absent, we come to help you , it can be for single pick-drop or even a full day job.</p><br>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Taxi</p>
							<p>Either two -wheeler for a single person drop or few people pick and drop service we work to serve you.</p><br>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Pick-Drop</p>
							<p>Household personal or kitchen gadgets or even vessels we pick from you, get repaired from your trusted or favorite technician or store person and again drop it back to you once the work is done.</p><br>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Flour mill</p>
							<p>Ask us and we pick from your place and get it done from your known or mentioned flour mill.</p><br>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Temporary workers</p>
							<p>Either small functions at your place or some work to be done,we provide you with unskilled workers who would help you do whatever you want.</p><br>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Elderly/Guardians</p>
							<p>Send medicines, or food, or clothes or anything to your elders, parents, guardians where you can't reach on time for busy due to multiple works we do your job.</p><br>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Distance/Place/Areas</p>
							<p>We currently offer same day delivery services in Rajkot city from Kisaan Para Chowk to Metoda Industrial Units. Inside areas would be up to 500 meters from the main Kalawad Road.</p><br>
						</div>

						


                        
                        
					</div>
            	</div>
            </div>
			<div class="green_shape"></div>
        </div>
		
        
    </div>

    {{-- <div id="footer">
    	<div class="container">
        	<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 ftr_logo wow fadeInLeft">
					<img src="images/ftr_logo.png" alt="" />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 wow fadeInRight">					
					<div class="ftr_social">
						<ul>
							<li><a href="#" target="_blank"><i class="mdi mdi-facebook"></i>Facebook</a></li>
							<li><a href="#" target="_blank"><i class="mdi mdi-twitter"></i>Twitter</a></li>
							<li><a href="#" target="_blank"><i class="mdi mdi-instagram"></i>Instagram</a></li>
						</ul>
					</div>
					<div class="copy_text">
						<p>© 2020 Callat7. All Rights Reserved.</p> 
						<p><a href="#">Terms and Conditions</a> | <a href="#">Privacy Policy</a></p>
					</div>
				</div>
            </div>
        </div>
    </div> --}}
</div>

</body>
</html>