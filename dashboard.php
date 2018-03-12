<?php
$check=$_COOKIE['login'];
if($check!="")
{

}else{header("location:index.php");}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="SemiColonWeb" />

<!-- Stylesheets
============================================= -->
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />

<script src="js/jquery.js"></script>

<script src="js/webjs1.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/new1.js"></script>

<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />

<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/dark.css" type="text/css" />
<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
<link rel="stylesheet" href="css/animate.css" type="text/css" />
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

<link rel="stylesheet" href="css/responsive.css" type="text/css" />
 
<meta name="viewport" content="width=device-width, initial-scale=1" />


<!-- Document Title
============================================= -->
<title>Profile | Canvas</title>

<style>
.notify
{
display: block;
line-height: 22px;
padding: 0px 113px 0 0;
color: #444;
font-weight: 700;
font-size: 13px;
letter-spacing: 1px;
text-transform: uppercase;
-webkit-transition: margin .4s ease, padding .4s ease;
-o-transition: margin .4s ease, padding .4s ease;
transition: margin .4s ease, padding .4s ease;
}
#primary-menu ul li .mega-menu-content, #primary-menu ul ul:not(.mega-menu-column)
{
border: 1px solid #EEE !important;
height: auto !important;
z-index: 199  !important;
top: 100%  !important;
left: 0  !important;
margin: 0  !important;
display: block;  !important
width: 100%  !important;
border: none  !important;
width: 100%
}
.pricing [class^=col-]{
padding: 0px 10px;

}

</style>


</head>

<body class="stretched" onload="username(),todayDate()">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

<!-- Header
============================================= -->
 				 	<?php include('header.php'); ?>				 


<!-- Content
============================================= -->
<section id="content">

<div class="fancy-title title-dotted-border title-center" style="top: 30px;">
			<h3>Items about to reach their expiration</h3>
		</div>

<div class="row">
<div class="pricing bottommargin clearfix col-md-10 col-md-offset-2"  style="top: 30px;">

			<div class="col-md-5" style="margin-top:30px">
					<div class="pricing-box best-price">
					<div class="pricing-title">
						<h3>Past Due</h3>
					</div>
					<div class="pricing-price" data-to="15065421" data-refresh-interval="80" data-speed="3000" id="CountPasDue">0</div>
					<div class="pricing-features">
						<ul>
							<li>Permits/Licenses Have Passed Their Renewal Dates</li>
						</ul>
					</div>
					</div>
				</div>

			 <div class="col-md-5" style="margin-top:30px">
					<div class="pricing-box best-price">
					<div class="pricing-title">
						<h3>30 Days Until Expiration</h3>
					</div>
					<div class="pricing-price"  id="Count30Days">0</div>
					<div class="pricing-features">
						<ul>
							<li>Permit/License Is Due For Renewal</li>
						</ul>
					</div>
					</div>
				</div>

			<div class="col-md-5" style="margin-top:30px">
					<div class="pricing-box best-price">
					<div class="pricing-title">
						<h3>60 Days Until Expiration</h3>
					</div>
					<div class="pricing-price"  id="Count60Days">0</div>
					<div class="pricing-features">
						<ul>
							<li>Permits/Licenses Are Due For Renewal</li>
						</ul>
					</div>
					</div>
				</div>

			<div class="col-md-5" style="margin-top:30px">
					<div class="pricing-box best-price">
					<div class="pricing-title">
						<h3>90 Days Until Expiration</h3>
					</div>
					<div class="pricing-price"  id="Count90Days">0</div>
					<div class="pricing-features">
						<ul>
							<li>Permits/Licenses Are Due For Renewal</li>
						</ul>
					</div>
					</div>
				</div>



		</div>
		</div>


  
</section><!-- #content end -->


<footer id="footer" class="dark" style="margin-top: 100px;">
<!-- Copyrights
============================================= -->
<div id="copyrights">

	<div class="container clearfix">

		<div   style="text-align: center;">
			Copyrights &copy; 2018 All Rights Reserved by CodixLab.<br>
			</div>
	</div>
</div><!-- #copyrights end -->
</footer><!-- #footer end -->
</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>

<script>
jQuery( "#tabs-profile" ).on( "tabsactivate", function( event, ui ) {
jQuery( '.flexslider .slide' ).resize();
});
</script>

</body>
</html>