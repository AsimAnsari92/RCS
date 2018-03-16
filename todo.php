<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
<script src="js/jquery.js"></script>

<script src="js/webjs1.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/new1.js"></script>
	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
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
	<title>Add | To Do</title>

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

    .addbtn
    {
		background: #1ABC9C;
		color: #fff;
		border: 1px solid #fff;
    }

	</style> 
</head>
 <body class="stretched"  onload="username(),todayDate(),GetAlltask()">
 	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
			<?php include('header.php'); ?>				 
		<!-- Content
		============================================= -->
		<section id="content">

			<div class="fancy-title title-dotted-border title-center" style="top: 30px;">
					<h3>Lorem ipsum dolor.</h3>
			</div>
		<div class="col-md-8 col-md-offset-2" style="top: 30px;margin-bottom: 10px;">
<a href="#" class="button addbtn pull"  data-toggle="modal" data-target="#myModal">
	<i class="icon-plus"></i>
</a> 
		

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Lorem ipsum dolor sit amet.</h3>
			</div>
			<div class="panel-body todoList"> 
 			</div>

		</div>



 		</div>

		 

			  
		</section><!-- #content end -->

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Add To Do</h4>
					</div>
					<div class="modal-body">
						<h4>Lorem ipsum dolor.</h4>
						<textarea class="form-control" id="TaskType"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onClick="AddTask()">Add</button>
					</div>
				</div>
			</div>
		</div>
	     </div>

		<footer id="footer" class="dark">
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