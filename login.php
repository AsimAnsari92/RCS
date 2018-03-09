<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Login - Layout 3 | Canvas</title>


<script src="js/jquery.js"></script>
<script src="js/webjs1.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/new1.js"></script>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Canvas Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">
 
						<ul>
							<li class="current"><a href="index.html"><div>About</div></a></li>
							<li class="mega-menu"><a href="contact.html"><div>Contact</div></a></li>
							<li class="mega-menu"><a href="login.html"><div>Sign In</div></a></li>
						</ul>
  
					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Page Title
		============================================= -->
	 
		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

						<div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>
						<div class="acc_content clearfix">
 								<div class="col_full">
									<label for="login-form-username">Email:</label>
									<input type="text" id="emaillAddLogin"   value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="login-form-password">Password:</label>
									<input type="password" id="passwordLogin" name="login-form-password" value="" class="form-control" />
								</div>

								<div class="col_full nobottommargin">
			<button class="button button-3d button-black nomargin"  onClick="login()" name="login-form-submit" value="login">Login</button>
									<a href="#" class="fright">Forgot Password?</a>
								</div>
 						</div>

						<div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>New Signup? Register for an Account</div>
						<div class="acc_content clearfix">
								<div class="col_full">
									<label for="register-form-name">Name:</label>
									<input type="text" id="firstname" name="register-form-name" value="" class="form-control" />
								</div>
                                <div class="col_full">
									<label for="register-form-name">Name:</label>
									<input type="text" id="lastname" name="register-form-name" value="" class="form-control" />
								</div>
 								<div class="col_full">
									<label for="register-form-email">Email Address:</label>
									<input type="text" id="email" name="register-form-email" value="" class="form-control" />
								</div>
 

								<div class="col_full">
									<label for="register-form-password">Choose Password:</label>
									<input type="password" id="password" name="register-form-password" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-repassword">Re-enter Password:</label>
									<input type="password" id="Repassword" name="register-form-repassword" value="" class="form-control" />
								</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d button-black nomargin" onClick="RegisterUser()" value="register">Register Now</button>
								</div>
						</div>

					</div>

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
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

</body>
</html>