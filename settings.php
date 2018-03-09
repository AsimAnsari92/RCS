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
<title>RCM TOOL - SETTINGS</title>
<link rel="icon" href="images/logo/favicon.png" type="images/logo/favicon.png" />
<link href="fonts/fontStyle.css" rel="stylesheet" type="text/css">
 <link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/webjs1.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/new1.js"></script>

 
 </head>

<body onLoad="username(),getProfile(),GetNotifyEmail(),GetRestaurant()">
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
<h3 class="colorBlue m-0 textCenterScr768">SETTINGS</h3>
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
<div class="col-12 overflow-hidden">
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">Profile</h4>
<div class="alert alert-success fadeIn pull-right mb-0 margin-top10px" id="AlertMsg" role="alert" style="display:none">
  <span id="AlertTxt">You successfully Add Data.</span>
</div>
</div>

<div class="col-12 border-bottom1px pb-4 mt-3">

<div class="boxes col-12 p-4">
 <div class="col-12 overflow-hidden">
  <div class="form-group pull-left mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control icon-edit" id="firstName" aria-describedby="" placeholder="First Name">
  </div> 
  <div class="form-group pull-left mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0"> 
    <label for="lastName">Last Name</label>
    <input type="text" class="form-control icon-edit" id="lastName" aria-describedby=" " placeholder="Last Name">
  </div>
  <div class="form-group pull-left mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0"> 
    <label for="email">Email</label>
    <input type="email" class="form-control icon-email opacity05" id="email" aria-describedby=" " placeholder="Email" readonly>
  </div>
  <div class="form-group pull-right col-lg-2 col-md-3 col-sm-12 col-12 p-0 margin-top28px">
    <input type="button"  class="btn btn-darkBrown col-12" value="UPDATE" onClick="UpdateProfile()">
  </div>
  
</div>  
  
</div>


<!--------------------------------->
<div class="col-12 overflow-hidden p-0">
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">Change Password</h4>
</div>

<div class="boxes col-12 p-4">  
<div class="col-12 overflow-hidden">
  <div class="form-group pull-left mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0">
    <label for="oldPass">Current Password<span style="color:#F00;">*</span></label>
    <input type="password" class="form-control" id="oldPass" aria-describedby=" " placeholder="Current Password">
  </div>
  <div class="form-group pull-left mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0">
    <label for="newPass">New Password<span style="color:#F00;">*</span></label>
    <input type="password" class="form-control" id="newPass" aria-describedby=" " placeholder="New Password">
  </div>
  <div class="form-group pull-left mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0">
    <label for="confirmPass">Confirm Password<span style="color:#F00;">*</span></label>
    <input type="password" class="form-control" id="confirmPass" aria-describedby=" " placeholder="Confirm Password">
  </div>
  <div class="form-group pull-right col-lg-2 col-md-3 col-sm-12 col-12 p-0 margin-top28px">
    <input type="button" onClick="UpdatePassword()" class="btn btn-darkBrown col-12" value="UPDATE">
  </div>
</div>
 
</div>

<!--------------------------------->


<!--<div class="col-12 overflow-hidden p-0">
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">Add Notification Email</h4>
</div>

<div class="boxes col-12 p-4">  
<div class="col-12 overflow-hidden">
  <div class="form-group pull-left mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0"> 
    <label for="addemail">Email</label>
    <input type="email" class="form-control icon-edit" id="NotifyEmail" aria-describedby=" " placeholder="Email">
  </div>
  <div class="form-group pull-left col-lg-2 col-md-3 col-sm-12 col-12 p-0 margin-top28px">
    <input type="button" onClick="AddNotifyEmail()" class="btn btn-darkBrown col-12" value="ADD">
  </div>
</div>  
 
</div>-->

</div>




<!-- List of resturent -->
<div class="col-12">
<h4 class="font-weight-bold colorDarkGray mt-4">List of Restaurants</h4>
<div class="boxes2 col-12 p-4 overflow-xscroll overflow-hidden mt-3">
 <div class="form-group col-2 p-0 m-auto pull-right">
    <input type="button" class="btn btn-darkBrown col-12" value="ADD RESTAURANT" onClick="openPupopRest()" style="margin-bottom:10px">
  </div>
<table class=" " cellpadding="10" width="100%" border="0">
<thead>
<tr class="border-bottom1px colorDarkGray">
<th align="center" width="10">#</th>
<th align="center">Restaurant Name</th>
<th align="center"> Action</th>
</tr>
</thead>

<tbody id="AllRestaurant">
</tbody>
</table>

</div>
</div>
<!--- end of resturant -->


<div class="col-12 margin-top83px">
<h4 class="font-weight-bold colorDarkGray mt-4">List of Emails</h4>
<div class="boxes2 col-12 p-4 overflow-xscroll overflow-hidden mt-3 margin-top83px">
 <div class="form-group col-2 p-0 m-auto pull-right">
    <input type="button" class="btn btn-darkBrown col-12" value="ADD EMAIL" onClick="openPupop()" style="margin-bottom:10px">
  </div>
<table class=" " cellpadding="10" width="100%" border="0">
<thead>
<tr class="border-bottom1px colorDarkGray">
<th align="center">#</th>
<th align="center">First Name</th>
<th align="center">Last Name</th>
<th align="center">Emails</th>
<th align="center"> Action</th>
</tr>
</thead>

<tbody id="AllNotifyEmail">
</tbody>
</table>

</div>
</div>









</div>
</div>
</div>
</article>

</section>



<div class="col-12 pupopBg" id="pupop" style="display:none;">
<div class="col-lg-4 col-md-6 col-sm-8 col-11 boxes pupopInnerBox">
<div class="col-12 pt-3 overflow-hidden">
<h5 class="pull-left col-11 p-0">Add Email</h5>
<p class="pull-right colorLightOrange fontweightBold cursor" onClick="closePupop()">X</p>
</div>
<div class="col-12 pb-3">
<div class="form-group col-12 p-0"> 
    <label for="empName" class="colorBlue">First Name</label>
    <input type="hidden" id="EmployeeidPOP" >
    <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="fname" >
  </div>
 <div class="form-group col-12 p-0"> 
    <label for="titleDeseg" class="colorBlue">Last Name</label>
    <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="lname" >
  </div>
  <div class="form-group col-12 p-0">
    <label for="JoiningDate" class="colorBlue">Email</label>
    <input type="email" class="form-control borderpuopInput p-0 marginicon" id="NotifyEmail" >
  </div> 
  <div class="form-group col-6 p-0 m-auto">
    <input type="button" class="btn btn-darkBrown col-12" value="ADD" onClick="AddNotifyEmail()">
  </div>
      
</div>
</div>
</div>




<div class="col-12 pupopBg" id="pupopRest" style="display:none;">
<div class="col-lg-4 col-md-6 col-sm-8 col-11 boxes pupopInnerBox">
<div class="col-12 pt-3 overflow-hidden">
<h5 class="pull-left col-11 p-0">Add Restaurant</h5>
<p class="pull-right colorLightOrange fontweightBold cursor" onClick="openPupopRestclose()">X</p>
</div>
<div class="col-12 pb-3">
<div id="restMsg" style="display:none">Please add Restaurant.</div>
<div class="form-group col-12 p-0"> 
   
    <label for="empName" class="colorBlue">Restaurant Name<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="restaurant_name">
  </div>
  <div class="form-group col-6 p-3 m-auto">
    <input type="button" class="btn btn-darkBrown col-12" value="OK" onClick="AddRestaurant()">
  </div>
      
</div>
</div>
</div>




<div class="col-12 pupopBg" id="popupeditrest" style="display:none;">
<div class="col-lg-4 col-md-6 col-sm-8 col-11 boxes pupopInnerBox">
<div class="col-12 pt-3 overflow-hidden">
<h5 class="pull-left col-11 p-0">Update Restaurant</h5>
<p class="pull-right colorLightOrange fontweightBold cursor" onClick="opnerestpopupclose()">X</p>
</div>
<div class="col-12 pb-3">
<div id="restMsg1" style="display:none">Enter a valid resturant name.</div>
<div class="form-group col-12 p-0">
     
    <label for="empName" class="colorBlue">Restaurant Name<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="restaurant_namePOP" >
  </div>
  <div class="form-group col-6 p-3 m-auto">
    <input type="button" class="btn btn-darkBrown col-12" value="UPDATE" onClick="updateRest()">
  </div>
      
</div>
</div>
</div>
















<!--/*DELETE PUPOP*/ -->
<div class="col-12 pupopBg" id="deleteBox" style="display:none;">
<div class="col-lg-3 col-md-4 col-sm-6 col-11 boxes pupopInnerBox">
<div class="col-12 pt-3 overflow-hidden">
<p class="text-center font-familyUniversLT pt-3 pb-3">Are you sure you want to delete this record?</p>
<div class="form-group col-6 pull-left">
    <input type="button" class="btn btn-darkBrown col-12 cursor" value="YES" onClick="DeleteNotifyEmail()">
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
<script>

$("input").on("keypress", function(e) {
    if (e.which === 32 && !this.value.length)
        e.preventDefault();
});
</script>


</body>
</html>

