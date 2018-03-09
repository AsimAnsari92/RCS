<?php
$check=isset($_COOKIE['login']);
if($check!="")
{
	header("location:dashboard.php");
}else{}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>RCM TOOL</title>
<link rel="icon" href="images/logo/favicon.png" type="images/logo/favicon.png" />
<link href="fonts/fontStyle.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<script src="js/jquery.js"></script>
<script src="js/webjs1.js"></script>
<script src="js/jquery.cookie.js"></script>
 <script src="js/new1.js"></script>
 
 
<style>
body{background-image: url(images/bg/bg-min.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;}
</style>

</head>

<body>
<!--margin-topBotCenetr-->
<section class="overflow-hidden font-familyGothamNarrowBook margin-topBotCenetr">
<div class="container">
<div class="row">
<div class="col-10 p-0 font-familyRobotoRegular colorgray overflow-hidden m-auto">

<div class="col-lg-5 col-md-6 col-sm-12 col-12 pull-left pt-5 pb-5 bg-loginSide colorWhite text-center height-398px">
<h1 class="font-familyPoiretOneRegular m-0 fontweightBold">WELCOME</h1>
<h5 class="m-0">to the web portal</h5>
<img src="images/logo/logo.png" class="mt-5">
<p class="font-size12px m-0 mt-5">© Copyright 2017. All rights reserved.<br><a href="http://celeritas-solutions.com/" class="colorWhite" target="_blank">Powered by Celeritas Solutions.</a></p>
</div>

<div class="col-lg-7 col-md-6 col-sm-12 col-12 p-0 pull-left">


    <div class="col-12 bg-colorWhite border-box1px pb-4 height-398px" id="loginPage">
    <h5 class="colorDarkBlue font-familyRaleway mt-5 text-center">Login</h5>
    <div class="col-lg-7 col-md-11 col-sm-12 col-12 m-auto p-0 mt-4">
     <div class="alert alert-success fadeIn mb-0 loginerorPop" id="AlertMsg" role="alert" style="display:none">
      <span id="AlertTxt">You successfully Add Data.</span>
    </div>
       <div class="form-group mt-5">
        <input type="email" class="form-control borderInputblue" id="emaillAddLogin" aria-describedby="Email address" placeholder="Email Address">
      </div>
      <div class="form-group mt-3">
        <input type="password" class="form-control borderInputblue" id="passwordLogin" placeholder="Password">
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input">Remember Me
        </label>
      </div>
     <div class="col p-0 mt-3">
        <input class="d-block btn btn-dark bg-blue col-lg-12 col-md-12 col-sm-12 col-12 m-auto font-size14px font-familyOpenSans" type="button" value="Login" onClick="login()">
    </div> 
    <a href="#" class="text-center d-block mt-3 font-size12px" onClick="forgotPage()">Forgot Password?</a>
     </div> 
     <p class="text-center d-block font-size12px mt-3">Don't have an account - <a href="#"  onClick="RegisterPage()">Sign Up?</a></p>
    </div>
    
    <div class="col-12 bg-colorWhite border-box1px pb-4 height-398px none" id="ForgotPage">
      <h5 class="colorDarkBlue font-familyRaleway mt-5 text-center">Forgot Password</h5>
      <div class="col-lg-7 col-md-11 col-sm-12 col-12 m-auto p-0 mt-4">
       <div class="alert alert-success fadeIn mb-0 loginerorPop" id="AlertMsg2" role="alert" style="display:none">
        <span id="AlertTxt">Msg</span>
      </div>
         <div class="form-group mt-5">
          <input type="email" class="form-control borderInputblue" id="Forgotemaill" aria-describedby="Email address" placeholder="Email Address">
        </div> 
       <div class="col p-0 mt-3">
          <input class="d-block btn btn-dark bg-blue col-lg-12 col-md-12 col-sm-12 col-12 m-auto font-size14px font-familyOpenSans" type="button" value="Send Email" onClick="ForgotPasswordEmail()">
      </div> 
      <div class="col p-0 mt-2">
          <input class="d-block btn btn-dark bg-blue col-lg-12 col-md-12 col-sm-12 col-12 m-auto font-size14px font-familyOpenSans" type="button" value="Back" onClick="loginPage()">
      </div>
       </div> 
    </div>
    
    
    <div class="col-12 bg-colorWhite border-box1px pb-4 height-398px none" id="RegisterPage">
      <h5 class="colorDarkBlue font-familyRaleway mt-3 text-center">Sign Up</h5>
      <div class="col-lg-7 col-md-11 col-sm-12 col-12 m-auto p-0">
           <div class="alert alert-success fadeIn mb-0 loginerorPop" id="AlertMsg2" role="alert" style="display:none">
        <span id="AlertTxt">Msg</span>
      </div>
         <div class="mt-1">
          <input type="text" class="form-control borderInputblue" id="firstname" placeholder="First Name">
        </div>
         <div class="mt-1">
          <input type="text" class="form-control borderInputblue" id="lastname" placeholder="Last Name" >
        </div> 
         <div class="mt-1">
          <input type="email" class="form-control borderInputblue" id="email" placeholder="Email address">
        </div> 
         <div class="mt-1">
          <input type="text" class="form-control borderInputblue" id="password" placeholder="Password" >
        </div> 
         <div class="mt-1">
          <input type="text" class="form-control borderInputblue" id="Repassword" placeholder="Confirm Password">
        </div> 
       <div class="col p-0 mt-3">
          <input class="d-block btn btn-dark bg-blue col-lg-12 col-md-12 col-sm-12 col-12 m-auto font-size14px font-familyOpenSans" type="button" value="Send Email" onClick="RegisterUser()">
      </div> 
      <div class="col p-0 mt-2">
          <input class="d-block btn btn-dark bg-blue col-lg-12 col-md-12 col-sm-12 col-12 m-auto font-size14px font-familyOpenSans" type="button" value="Back" onClick="loginPage()">
      </div>
       </div> 
    </div>
    
</div>
</div>




</div>
</div>
</section>


<div class="col-12 pupopBg" id="loader" style="display:none;">
<div class="loader">Loading...</div>
<P class="loaderTxt">Loading, please wait.</P>
</div>


</body>
</html>
