<?php
$check=$_COOKIE['login'];
if($check!="")
{
	
}else{header("location:index.php");}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>RCM TOOL - DASHBOARD</title>
<link rel="icon" href="images/logo/favicon.png" type="images/logo/favicon.png" />
<link href="fonts/fontStyle.css" rel="preload" as="font">
 
<link href="css/style.css" rel="stylesheet" type="text/css"> 

<script src="js/jquery.js"></script>
<script src="js/webjs1.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/new1.js"></script>
  
</head>

<body onLoad="username(),todayDate()">
<?php include('aside.php'); ?>

 
<section id="secFixHeight" class="overflow-hidden col-lg-10 col-md-9 col-sm-12 col-12 pull-left p-0">
<header class="pt-4 pb-4 border-bottom1px bg-colorWhite">
<div class="container">
<div class="row">
<div class="col-lg-11 col-md-11 col-sm-12 col-12 m-auto p-0">
<div class="pull-left" style="display:block;">
<!--<input type="button" class="fa fa-bars btn btn-danger pull-left " onClick="openMenu();">-->
<button class="btn btn-darkMenu paddingMenu cursor menuIconDis" onclick="openMenu();"><i class="fa fa-bars font-size22px"></i></button>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-7 pull-left p-0">
<h3 class="colorBlue m-0 textCenterScr768">DASHBOARD</h3>
</div>
<div class="col-lg-4 col-md-4 col-sm-3 col-6 pull-right">
<p class="pull-right m-0 mr-2"><span id="adminName"></span><i class="fa fa-power-off ml-3 colorLightOrange font-size22px pull-right padding-top2px cursor" onclick="LogoutUser()"></i> </p>
</div>

</div>
</div>
</div>
</header>

<article class="overflow-yscroll mb-5">
<div class="container">
<div class="row">
<div class="col-lg-11 col-md-11 col-sm-12 col-12 m-auto p-0">
<h4 class="font-weight-bold mt-4 colorDarkGray pl-3">Summary</h4>
<div class="col-12 overflow-hidden border-bottom1px pb-4 p-0">

<div class="col-lg-6 col-md-6 col-sm-12 col-12 pull-left mt-3">
<div class="boxes col-12 p-4 overflow-hidden text-center">
<h4 class="colorLightOrange border-bottom1px m-0 pb-3 text-capitalize">Past Due</h4>
<div class="col-lg-6 col-md-6 col-sm-6 col-12 pull-left mt-3" style="padding:3px">
<h1 class="colorLightOrange m-0 pb-3 font-familyUniversLT font-size70px" id="LPPast">0</h1>
<p class="text-capitalize" id="LPPasttxt">Permit/License Has Passed Its Renewal Date</p>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-12 pull-left border-left1px border575Scr mt-3" style="padding:3px">
<h1 class="colorLightOrange m-0 pb-3 font-familyUniversLT font-size70px" id="CPast30">0</h1>
<p class="text-capitalize" id="CPast30txt">certification Has Passed Its renewal date</p>
</div>
</div>
</div>



<div class="col-lg-6 col-md-6 col-sm-12 col-12 pull-left mt-3">
<div class="boxes col-12 p-4 overflow-hidden text-center">
<h4 class="colorGreen border-bottom1px m-0 pb-3 text-capitalize">30 Days until Expiration</h4>
<div class="col-lg-6 col-md-6 col-sm-6 col-12 pull-left mt-3" style="padding:3px">
<h1 class="colorGreen m-0 pb-3 font-familyUniversLT font-size70px" id="LP30">0</h1>
<p class="text-capitalize" id="LP30txt">Permit/License is due for <br>renewal</p>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-12 pull-left border-left1px border575Scr mt-3" style="padding:3px">
<h1 class="colorGreen m-0 pb-3 font-familyUniversLT font-size70px" id="C30">0</h1>
<p class="text-capitalize" id="C30txt">certification is due for<br> renewal</p>

</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-12 pull-left mt-3">
<div class="boxes col-12 p-4 overflow-hidden text-center">
<h4 class="colorBlue border-bottom1px m-0 pb-3 text-capitalize">60 Days until Expiration</h4>
<div class="col-lg-6 col-md-6 col-sm-6 col-12 pull-left mt-3" style="padding:3px">
<h1 class="colorBlue m-0 pb-3 font-familyUniversLT font-size70px" id="LP60">0</h1>
<p class="text-capitalize" id="LP60txt">Permit/License is due for<br> renewal</p>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-12 pull-left border-left1px border575Scr mt-3" style="padding:3px">
<h1 class="colorBlue m-0 pb-3 font-familyUniversLT font-size70px" id="C60">0</h1>
<p class="text-capitalize" id="C60txt">certification is due for<br> renewal</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-12 pull-left mt-3">
<div class="boxes col-12 p-4 overflow-hidden text-center">
<h4 class="colorParpel border-bottom1px m-0 pb-3 text-capitalize">90 Days until Expiration</h4>
<div class="col-lg-6 col-md-6 col-sm-6 col-12 pull-left mt-3" style="padding:3px">
<h1 class="colorParpel m-0 pb-3 font-familyUniversLT font-size70px" id="LP90">0</h1>
<p class="text-capitalize" id="LP90txt">Permit/License is due for<br> renewal</p>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-12 pull-left border-left1px border575Scr mt-3" style="padding:3px">
<h1 class="colorParpel m-0 pb-3 font-familyUniversLT font-size70px" id="C90">0</h1>
<p class="text-capitalize" id="C90txt">certification is due for<br> renewal</p>
</div>
</div>
</div>


</div>

<div class="col-12 margin-top83px">
<h4 class="font-weight-bold mt-4 colorDarkGray">Notifications</h4>


<div class="boxes2 col-12 p-4 overflow-xscroll overflow-hidden mt-3">
<table class=" " cellpadding="10" width="100%">
<thead>
<tr class="border-bottom1px colorDarkGray">
<th align="center">#</th>
<th align="center">Title</th>
<th align="center">Description</th>
<th align="center">Due Date</th>
<th align="center"></th>
</tr>
</thead>
<tbody id="notification">
</tbody>
</table>

</div>
</div>
 </div>
</div>
</div>
</article>

</section>
<div class="col-12 pupopBg" id="loader" style="display:block;">
<div class="loader">Loading...</div>
<P class="loaderTxt">Loading, please wait.</P>
</div>
</body>
</html>
