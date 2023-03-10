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
							{{-- <h2>Privacy Policy</h2> --}}
							<p style="font-weight:bold;">USER PRIVACY STATEMENT</p>
                            <p>Callat7 collects information about you when you use our mobile applications, websites, (collectively, the ???Services???) and through other interactions and communications you have with us. </p>
						</div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Scope and Application</p>
							<p>This Privacy Statement (???Statement") applies to persons anywhere in the world who use our apps/website or Services to request, delivery of goods/parcel services (???Users???). This Statement does not apply to information we collect from or about couriers who use the Callat7 platform under license (collectively ???Couriers???). If you interact with the Services as both a User and a Courier, the respective privacy statements apply to your different interactions.</p>
						</div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Collection of Information</p>
                            <p>Information You Provide to Us</p>
							<p>We collect information you provide directly to us, such as when you create or modify your account, request on-demand services, contact customer support, or otherwise communicate with us. This information may include: name, email, phone number, postal address, profile picture, payment method, items requested (for delivery services), delivery notes, and other information you choose to provide.</p>
                            <p>Information We Collect Through Your Use of Our Services</p>
                            <p>When you use our Services, we collect information about you in the following general categories:
								Location Information: When you use the Services for delivery of goods, we collect precise location data about the Delivery of goods from the Callat7 app used by the Courier. If you permit the Callat7 app to access location services through the permission system used by your mobile operating system (???platform???), we may also collect the precise location of your device when the app is running in the foreground or background. We may also derive your approximate location from your IP address.
							</p>
							<p>Contacts Information: If you permit the Callat7 app to access the address book on your device through the permission system used by your mobile platform, we may access and store names and contact information from your address book to facilitate social interactions through our Services and for other purposes described in this Statement or at the time of consent or collection.</p>
                            <p>Transaction Information: We collect transaction details related to your use of our Services, including the type of service requested, date and time the service was provided, amount charged, distance of delivery of goods, and other related transaction details.</p>
                            <p>Usage and Preference Information: We collect information about how you and site visitors interact with our Services, preferences expressed, and settings chosen. In some cases we do this through the use of cookies, pixel tags, and similar technologies that create and maintain unique identifiers. </p>
                            <p>Device Information: We may collect information about your mobile device, including, for example, the hardware model, operating system and version, software and file names and various, preferred language, unique device identifier, advertising identifiers, serial number, device motion information, and mobile network information.</p>
                            <p>Call and SMS Data: Our Services facilitate communications between Users and Couriers. In connection with facilitating this service, we receive call data, including the date and time of the call or SMS message, the parties??? phone numbers, and the content of the SMS message.</p>
                            <p>Log Information: When you interact with the Services, we collect server logs, which may include information like device IP address, access dates and times, app features or pages viewed, app crashes and other system activity, type of browser, and the third-party site or service you were using before interacting with our Services.</p>
						</div>
                        
                       <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Important Information About Platform Permissions</p>
							<p>Most mobile platforms (iOS, Android, etc.) have defined certain types of device data that apps cannot access without your consent. And these platforms have different permission systems for obtaining your consent. The iOS platform will alert you the first time the Callat7 app wants permission to access certain types of data and will let you consent (or not consent) to that request. Android devices will notify you of the permissions that the Callat7 app seeks before you first use the app, and your use of the app constitutes your consent. To learn about the platform-level permissions that the app seeks, please visit our new iOS Permissions page and Android Permissions page. Sometimes these permissions require more explanation than the platforms themselves provide, and the permissions we request will change over time, so we???ve created these pages to serve as authoritative and up-to-date resources for our users.</p>
						</div>
                        
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Information We Collect From Other Sources</p>
							<p>We may also receive information from other sources and combine that with information we collect through our Services. For example:</p>
                            <p>If you choose to link, create, or log in to your Callat7 account with a payment provider (e.g., Google Wallet) or social media service (e.g., Facebook), or if you engage with a separate app or website that uses our API (or whose API we use), we may receive information about you or your connections from that site or app.</p>
                            <p>When you request on demand services, our Couriers may provide us with a User rating after providing services to you.</p>
                            <p>If you also interact with our Services in another capacity, for instance as a Courier or user of other apps we provide, we may combine or associate that information with information we have collected from you in your capacity as a User </p>
						</div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Use of Information</p>
							<p>We may use the information we collect about you to:</p>
                            <p>Provide, maintain, and improve our Services, including, for example, to facilitate payments, send receipts, provide products and services you request (and send related information), develop new features, provide customer support to Users and Couriers, develop safety features, authenticate users, and send product updates and administrative messages;</p>
                            <p>Perform internal operations, including, for example, to prevent fraud and abuse of our Services; to troubleshoot software bugs and operational problems; to conduct data analysis, testing, and research; and to monitor and analyze usage and activity trends;</p>
                            <p>Send or facilitate communications (i) between you and a Courier or (ii) between you and a contact of yours whom you wish to deliver the goods, at your direction in connection with your use of certain features, such as expected date and time of delivery of goods, name and details of courier who will be providing delivery services.</p>
                            <p>Send you communications we think will be of interest to you, including information about products, services, promotions, news, and events of Callat7 and other companies, where permissible and according to local applicable laws; and to process contest, sweepstake, or other promotion entries and fulfill any related awards;</p>
                            <p>Personalize and improve the Services, including to provide or recommend features, content, social connections, referrals, and advertisements.</p>
                            <p>We may transfer the information described in this Statement to, and process and store it in India. Where this is the case, we will take appropriate measures to protect your personal information in accordance with this Statement.</p>
						</div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Sharing of Information</p>
							<p>We may share the information we collect about you as described in this Statement or as described at the time of collection or sharing, including as follows:</p>
						</div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Through Our Services</p>
							<p>We may share your information:</p>
                            <p>With Couriers to enable them to provide the Services you request. For example, we share your name, average User rating given by Couriers, and pickup and delivery locations of goods with Couriers;</p>
                            <p>With the general public if you submit content in a public forum, such as blog comments, social media posts, or other features of our Services that are viewable by the general public;</p>
                            <p>With third parties with whom you choose to let us share information, for example other apps or websites that integrate with our API or Services, or those with an API or Service with which we integrate;</p>
                            
						</div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Other Important Sharing</p>
							<p>We may share your information:</p>
                            <p>With Callat7 subsidiaries and affiliated entities that provide services or conduct data processing on our behalf, or for data centralization and / or logistics purposes;</p>
                            <p>With vendors, consultants, marketing partners, and other service providers who need access to such information to carry out work on our behalf;</p>
                            <p>In response to a request for information by a competent authority if we believe disclosure is in accordance with, or is otherwise required by, any applicable law, regulation, or legal process;</p>
                            <p>With law enforcement officials, government authorities, or other third parties if we believe your actions are inconsistent with our User agreements, Terms of Service, or policies, or to protect the rights, property, or safety of Callat7 or others;</p>
                            <p>In connection with, or during negotiations of, any merger, sale of company assets, consolidation or restructuring, financing, or acquisition of all or a portion of our business by or into another company;</p>
                            <p>If we otherwise notify you and you consent to the sharing; and</p>
                            <p>In an aggregated and/or anonymized form which cannot reasonably be used to identify you.</p>
						</div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Social Sharing Features</p>
                            <p>The Services may integrate with social sharing features and other related tools which let you share actions you take on our Services with other apps, sites, or media, and vice versa. Your use of such features enables the sharing of information with your friends or the public, depending on the settings you establish with the social sharing service. Please refer to the privacy policies of those social sharing services for more information about how they handle the data you provide to or share through them.</p>
						</div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Analytics and Advertising Services Provided by Others</p>
                            <p>We may allow others to provide audience measurement and analytics services for us, to serve advertisements on our behalf across the Internet, and to track and report on the performance of those advertisements. These entities may use cookies, web beacons, SDKs, and other technologies to identify your device when you visit our site and use our Services, as well as when you visit other online sites and services. For more information about these technologies and service providers, please refer to our Cookie Statement.</p>
						</div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<p style="font-weight:bold;">Your Choices</p>
                            <p style="font-weight:bold;">Account Information</p>
                            <p>You may correct your account information at any time by logging into your online or in-app account. Please note that in some cases we may retain certain information about you as required by law, or for legitimate business purposes to the extent permitted by law. For instance, if you have a standing credit or debt on your account, or if we believe you have committed fraud or violated our Terms, we may seek to resolve the issue before deleting your information.</p>
                            <p style="font-weight:bold;">Access Rights</p>
                            <p>Callat7 will comply with individual???s requests regarding access, correction, and/or deletion of the personal data it stores in accordance with applicable law.</p>
                            <p style="font-weight:bold;">Contact Information</p>
                            <p>We may also seek permission for our app???s collection and syncing of contact information from your device per the permission system used by your mobile operating system. If you initially permit the collection of this information, iOS users can later disable it by changing the contacts settings on your mobile device. The Android platform does not provide such a setting.</p>
                            <p style="font-weight:bold;">Promotional Communications</p>
                            <p>You may opt out of receiving promotional messages from us by following the instructions in those messages. If you opt out, we may still send you non-promotional communications, such as those about your account, about Services you have requested, or our ongoing business relations.</p>
                            <p style="font-weight:bold;">Cookies and Advertising</p>
                            <p>Please refer to our Cookie Statement for more information about your choices around cookies and related technologies.</p>
                            <p style="font-weight:bold;">Changes to the Statement</p>
                            <p>We may change this Statement from time to time. If we make significant changes in the way we treat your personal information, or to the Statement, we will provide you notice through the Services or by some other means, such as email. Your continued use of the Services after such notice constitutes your consent to the changes. We encourage you to periodically review the Statement for the latest information on our privacy practices.</p>
						</div>
                        
					</div>
            	</div>
            </div>
			<div class="green_shape"></div>
        </div>
		
        
    </div>

    <div id="footer">
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
						<p>?? 2020 Callat7. All Rights Reserved.</p> 
						<p><a href="#">Terms and Conditions</a> | <a href="#">Privacy Policy</a></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

</body>
</html>