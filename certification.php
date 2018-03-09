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
<title>RCM TOOL - CERTIFICATION</title>
<link href="fonts/fontStyle.css" rel="stylesheet" type="text/css"> 
  <link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/webjs1.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/new1.js"></script>
<link rel="icon" href="images/logo/favicon.png" type="images/logo/favicon.png" />

</head>

<body onLoad="username(),getEmpNames(),getAllCertification()">
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
<h3 class="colorBlue m-0 textCenterScr768">CERTIFICATION</h3>
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
<div class="col-lg-11 col-md-11 col-sm-12 col-12 m-auto border-bottom1px pb-4">
<div class="col-12 overflow-hidden p-0">
<h5 class="mt-4 colorDarkGray pull-left">Add New Certification</h5>
<div class="alert alert-success fadeIn pull-right mb-0 margin-top10px" id="AlertMsg" role="alert" style="display:none">
  <span id="AlertTxt">You successfully Add Data.</span>
</div>
</div>

<div class="boxes col-12 p-4 overflow-hidden mt-3">
 <div class="col-12 overflow-hidden">
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="empName">Certification<span style="color:#F00;">*</span></label>
     <select class="form-control icon-arrow pr-5" id="Certification">
     <option>-Select-</option>
      <option value="Food Service Manager Certification">Food Service Manager Certification</option>
      <option value="Food Safety Handler Certification">Food Safety Handler Certification</option>
      <option value="TIPs Certification">TIPs Certification</option>
      <option value="Certificate of Occupancy">Certificate of Occupancy</option>
    </select>
  </div> 
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1"> 
    <label for="titleDeseg">Employee<span style="color:#F00;">*</span></label>
     <select class="form-control icon-arrow" id="EmployeeSelect">
      <option value="-Select-">-Select-</option>
    </select>
  </div>
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="JoiningDate">Issuance Date<span style="color:#F00;">*</span></label>
    <input type="date" class="form-control" id="IssuanceDate" aria-describedby=" " placeholder=" " onChange="issueExpDateMatch()">
  </div>
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="JoiningDate">Expiration Date<span style="color:#F00;">*</span></label>
    <input type="date" class="form-control" id="ExpirationDate" aria-describedby=" " placeholder=" " disabled>
  </div>
</div>  
<div class="col-12 overflow-hidden">
  <div class="form-group pull-left col-lg-6 col-md-6 col-sm-12 col-12 p-1 mb-0">
    <label for="comOn">Comments</label>
    <textarea class="form-control icon-edit icon-position height-70px icon-editComint" id="Comments" placeholder="Type Here..." rows="3" cols="10"></textarea>
  </div>
  <div class="form-group pull-left col-lg-4 col-md-5 col-sm-12 col-12 p-1">
    <label for="dateBirth">Upload</label>
    <button type="button" class="form-control-file btn btn-white font-familyUniversLT icon-attachment col-lg-12 col-md-12 col-sm-12 col-12 text-left height-70px" aria-describedby="fileHelp">Upload Scanned<br> Copy of the Certificate</button>
    <input type="file" class="form-control-file inputfileBtn col-lg-12 col-md-12 col-sm-12 col-12 opacity0" id="file" name="file" aria-describedby="fileHelp" onChange="imgUpload()">
    <span class="colorBlue d-block m-2 pull-left" id="attached"></span>
    <span id="cross" class="colorLightOrange crossImgAttch font-familyUniversLT font-size14px cursor fontweightBold" onClick="imgUploadRemove()"></span>
   <!--<div class="bg-blue height-40px transition" id="progress" style="width:0;"></div>-->
  </div>
  <div class="form-group pull-right col-lg-2 col-md-3 col-sm-12 col-12 p-1 mb-0 margin-top64px">
    <input type="button" class="btn btn-darkBrown col-12" value="ADD" onClick="Addcertification()">
  </div>
</div>  
 
</div>
</div>



<div class="col-lg-11 col-md-11 col-sm-12 col-12 m-auto">
<h5 class="mt-4 colorDarkGray">List of Certifications</h5>


<div class="boxes2 col-12 p-4 overflow-xscroll overflow-hidden mt-3 margin-top83px">
<table class=" " cellpadding="10" width="100%" border="0">
<thead>
<tr class="border-bottom1px colorDarkGray">
<th align="center">#</th>
<th align="center">Type</th>
<th align="center">Employee Name</th>
<th align="center">Issuance Date</th>
<th align="center">Expiration Date</th>
<th align="center"> Action</th>
</tr>
<tbody id="AllCertificationData"> 
</tbody>
</table>

</div>
</div>


</div>
</div>
</article>

</section>
<div class="col-12 pupopBg" id="pupop" style="display:none;">
<div class="col-lg-4 col-md-6 col-sm-8 col-11 boxes pupopInnerBox">
<div class="col-12 pt-3 overflow-hidden">
<h5 class="pull-left col-11 p-0">Certification Detail</h5>
<p class="pull-right colorLightOrange fontweightBold cursor" onClick="closePupop()">X</p>
</div>
<div class="col-12 pb-3"> 
    
<div class="form-group col-12 p-0">
    <label for="empName" class="colorBlue">Certification</label>
    <input type="hidden" id="CertIDPOP" >
    <input type="hidden" id="EmployeeidPOP" >
   <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="CertificationPOP" aria-describedby="" placeholder=" " readonly style="background:#FFF;">
  </div>
 <div class="form-group col-12 p-0"> 
    <label for="titleDeseg" class="colorBlue">Employee</label>
    <input type="text" readonly class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="EmployeeSelectPOP" aria-describedby=" " placeholder=" " style="background:#FFF;">
  </div>
  <div class="form-group col-12 p-0">
    <label for="JoiningDate" class="colorBlue">Issuance Date</label>
    <input type="date" class="form-control borderpuopInput p-0 marginicon" id="IssuanceDatePOP" aria-describedby=" " placeholder=" " onChange="issueExpDateMatchpop()">
  </div>
  <div class="form-group col-12 p-0">
    <label for="dateBirth" class="colorBlue">Expiration Date</label>
    <input type="date" class="form-control borderpuopInput p-0 marginicon" id="ExpirationDatePOP" aria-describedby=" " placeholder=" ">
  </div>
  <div class="form-group col-12 p-0">
    <label for="comOn" class="colorBlue">Comments</label>
    <textarea class="form-control icon-edit icon-position height-70px borderpuopInput p-0 pr-2 icon-editComint" id="CommentsPOP" rows="3" cols="10"></textarea>
  </div>
  <label for="dateBirth" class="colorBlue">Attachement</label>
  <div class="form-group col-12 text-right p-0" id="Dlink">
  <a class="btn btn-darkBrown text-left d-block" href="" download>View Attachement<i class="fa fa-eye pull-right font-size22px" aria-hidden="true"></i></a>
  </div>
  <div class="form-group col-12 p-0">
  <input type="button" class="btn btn-darkBrown col-12 text-left p-2 icon-attachmentpupop pl-3" value="Add New Attachement">
    <input type="file" class="form-control-file inputfileBtn col-lg-12 col-md-12 col-sm-12 col-12 opacity0" id="filePOP" aria-describedby="fileHelp">
  </div>
  <div class="form-group col-6 p-0 m-auto">
    <input type="button" class="btn btn-darkBrown col-12" value="UPDATE" onClick="UpdateCertification()">
  </div>
  
      
</div>
</div>
</div>



<!--/*EMAIL PUPOP*/-->
<div class="col-12 pupopBg" id="emailPupop" style="display:none;">
<div class="col-lg-4 col-md-6 col-sm-8 col-11 boxes pupopInnerBox">
<div class="col-12 pt-3 overflow-hidden">
<h5 class="pull-left col-11 p-0">Email</h5>
<p class="pull-right colorLightOrange fontweightBold cursor" onClick="closePupop()">X</p>
</div>
<div class="col-12 pb-3"> 
 <div class="form-group col-12 p-0">  
<label for="titleDeseg" class="colorBlue">To</label>
<input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="emaiTo" aria-describedby=" " placeholder=" ">
  </div>  
  <div class="form-group col-12 p-0">  
<label for="titleDeseg" class="colorBlue">CC</label>
<input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="emaiCC" aria-describedby=" " placeholder=" ">
  </div>
  <div class="form-group col-12 p-0">  
<label for="titleDeseg" class="colorBlue">BC</label>
<input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="emaiBC" aria-describedby=" " placeholder=" ">
  </div>
  <div class="form-group col-6 p-0 m-auto">
    <input type="button" class="btn btn-darkBrown col-12" value="SEND" onClick="SendEmail()">
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
     <input type="button" class="btn btn-darkBrown col-12 cursor" value="YES" onClick="deleteCertification()">
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
