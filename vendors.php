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
<title>RCM TOOL - EMPLOYEE</title>
<link rel="icon" href="images/logo/favicon.png" type="images/logo/favicon.png" />
<link href="fonts/fontStyle.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/dataJs/jquery-latest.min.js"></script>
<script src="js/jquery.cookie.js"></script> 
<script src="js/webjs1.js"></script>
<script src="js/new1.js"></script>
 <script src="js/jquery.maskMoney.js"></script>

 </head>

<body onLoad="username(),GetAllVendor()">
<?php include('aside.php'); ?>

<section id="secFixHeight" class="overflow-hidden col-lg-10 col-md-9 col-sm-12 col-12 pull-left p-0">
<header class="pt-4 pb-4 border-bottom1px bg-colorWhite">
<div class="container">
<div class="row">
<div class="col-lg-11 col-md-11 col-sm-12 col-12 m-auto p-0">
<div class="pull-left" style="display:block;">

<button class="btn btn-darkMenu paddingMenu cursor menuIconDis" onclick="openMenu();"><i class="fa fa-bars font-size22px"></i></button>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-7 pull-left p-0">
<h3 class="colorBlue m-0 textCenterScr768">VENDORS</h3>
</div>
<div class="col-lg-4 col-md-4 col-sm-3 col-6 pull-right">
<p class="pull-right m-0 mr-2"><span id="adminName"> </span><i class="fa fa-power-off ml-3 colorLightOrange font-size22px pull-right padding-top2px cursor" onclick="LogoutUser()"></i> </p>
</div>

</div>
</div>
</div>
</header>

<article class="overflow-yscroll mb-5">
<div class="container">
<div class="row">
<div class="col-lg-11 col-md-11 col-sm-12 col-12 m-auto p-0">
<div class="col-12 overflow-hidden">
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">Add Vendor</h4>
<div class="alert alert-success fadeIn pull-right mb-0 margin-top10px" id="AlertMsg" role="alert" style="display:none">
  <span id="AlertTxt">You successfully Add Data.</span>
</div>
</div>

<div class="col-12 border-bottom1px pb-4 mt-3">

<div class="boxes col-12 p-4">
 <div class="col-12 overflow-hidden">
  <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="empName">Vendor Name<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="FirstName" placeholder="Vendor Name">
  </div> 
  <!--<div class="form-group pull-left mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0"> 
    <label for="titleDeseg">Last Name<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="LastName" placeholder="Last Name">
  </div>-->
  <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="dateBirth">Email Address<span style="color:#F00;">*</span></label>
    <input type="email" class="form-control icon-edit" id="EmailAddress"  placeholder="Email Address" >
  </div>
  <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
   <label for="dateBirth">Phone Number<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="PhoneNumber"  placeholder="Phone Number">
  </div>
  
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="titleDeseg">Company Name<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="CompanyName" placeholder="Company Name">
  </div>
  
</div>  
<div class="col-12 overflow-hidden">
  
  
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="JoiningDate">Expertise<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="Expertise" placeholder="Expertise" >
  </div>
  <div class="form-group pull-right col-lg-2 col-md-3 col-sm-12 col-12 p-1 margin-top28px">
    <input type="button" onClick="AddVendor()" class="btn btn-darkBrown col-12" value="ADD">
  </div>
</div>  
 
</div>
</div>


<div class="col-12 margin-top83px">
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">List of Vendors</h4>
<div class="boxes2 col-12 p-4 overflow-xscroll overflow-hidden mt-3 margin-top83px">
<table class=" " cellpadding="10" width="100%" border="0" id="myTable">
<thead>
<tr class="border-bottom1px colorDarkGray">
<th align="center">#</th>
<th align="center">Vendor Name</th>
<th align="center">Email Address</th>
<th align="center">Phone Number</th>
<th align="center">Company Name</th>
 <th align="center">Expertise</th>
 <th align="center">Action</th>
</tr>
</thead>

<tbody id="AllVendorsData">
</tbody>
</table>

</div>
</div>

</div>
</div>
</div>

</article>

</section>
  

<!--/*DELETE PUPOP*/ -->
<div class="col-12 pupopBg" id="deleteBox" style="display:none;">
<div class="col-lg-3 col-md-4 col-sm-6 col-11 boxes pupopInnerBox">
<div class="col-12 pt-3 overflow-hidden">
<p class="text-center font-familyUniversLT pt-3 pb-3">Are you sure you want to delete this record?</p>
<div class="form-group col-6 pull-left">
    <input type="button" class="btn btn-darkBrown col-12 cursor" value="YES" onClick="DeleteVendor()">
  </div>
  <div class="form-group col-6 pull-right">
    <input type="button" class="btn btn-darkBrown col-12 cursor" value="NO" onClick="closeDelPupop()">
  </div>
</div>
</div>
</div>

<div class="col-12 pupopBg" id="loader" style="display:block;">
<div class="loader">Loading...</div>
<P class="loaderTxt">Loading, please wait.</P>
</div>





 
</body>
</html>

