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
<title>RCM TOOL - INSPECTION</title>
<link rel="icon" href="images/logo/favicon.png" type="images/logo/favicon.png" />
  <link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
 <script src="js/webjs1.js"></script>
<script src="js/jquery.cookie.js"></script>
 <script src="js/new1.js"></script>
 <script src="js/toggal.js"></script>
</head>

<body onLoad="username(),getEmpNames(),getAll_inspection(),getAllrestaurant(),GetRestaurantByEmployee()">
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
<h3 class="colorBlue m-0 textCenterScr768">INSPECTION</h3>
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
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">Add New Inspection</h4>
<div class="alert alert-success fadeIn pull-right mb-0 margin-top10px" id="AlertMsg" role="alert" style="display:none">
  <span id="AlertTxt">You successfully Add Data.</span>
</div>
</div>
<div class="boxes col-12 p-4 overflow-hidden mt-3">
 
 <div class="col-12 overflow-hidden">
 
   <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="empName">Inspector Name<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="InspectorName" placeholder="Inspector Name">
  </div>
 
 
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="Inspection">Inspection<span style="color:#F00;">*</span></label>
     <select class="form-control icon-arrow pr-5" id="Inspection">
      <option>-Select-</option>
      <option>Health Inspection</option>
    </select>
  </div>
   <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1"> 
    <label for="titleDeseg">Employee<span style="color:#F00;">*</span></label>
     <select class="form-control icon-arrow" id="EmployeeSelect" onChange="EmployeeRestaurant()">
      <option value="">-Select-</option>
    </select>
  </div>
  
  <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="empName">Restaurant Name<span style="color:#F00;">*</span></label>
 	<select class="form-control icon-hotel opacity05" style="-webkit-appearance: none;" id="Restaurantdropdwon" disabled>
    <option value="0">-Select-</option></select>
   </div>
 
</div>  
<div class="col-12 overflow-hidden">
 
    <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="JoiningDate">Date of Inspection<span style="color:#F00;">*</span></label>
    <input type="date" class="form-control" id="InspectionDate" onchange="InspectionDateChange()">
  </div>
   
  <div id="switchAfterDate" class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1 fadeIn" style="display:block;">
     <label for="switchDate">Follow Up<span id="astric" style="color:#F00;"></span></label>
      <button type="button" id="noYesSwitch" class="btn btn-lg btn-toggle mt-2 cursor pull-right" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="toggaleUnspection()">
        <div class="handle"></div>
      </button>
        
    <input type="date" class="form-control" id="switchDate" disabled>
  </div>
 


  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1 mb-0">
    <label for="comOn">Comments</label>
    <textarea id="Comments" class="form-control icon-edit icon-position  icon-editComint" placeholder="Type Here..." id="exampleTextarea" rows="3" cols="10"></textarea>
  </div>
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
   <label for="dateBirth">Upload</label>
    <button type="button" class="form-control-file btn btn-white font-familyUniversLT icon-attachment col-lg-12 col-md-12 col-sm-12 col-12 text-left atchbtn" aria-describedby="fileHelp">Upload Scanned Copy <br>of the Report</button>
    <input type="file" class="form-control-file inputfileBtn col-lg-12 col-md-12 col-sm-12 col-12 opacity0" id="file" name="file" aria-describedby="fileHelp" onChange="imgUpload()">
    <span class="colorBlue d-block m-2 pull-left" id="attached"></span>
    <span id="cross" class="colorLightOrange crossImgAttch font-familyUniversLT font-size14px cursor fontweightBold" onClick="imgUploadRemove()"></span>
  </div> 
  
</div>  



    <div class="col-12 overflow-hidden">
       <div class="form-group pull-right col-lg-2 col-md-3 col-sm-12 col-12 p-1 mb-0">
        <input type="button" class="btn btn-darkBrown col-12" value="ADD" onClick="Add_inspection()">
       </div>
    </div>
 
</div>
</div>



<div class="col-lg-11 col-md-11 col-sm-12 col-12 m-auto">
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">List of Inspections</h4>


<div class="boxes2 col-12 p-4 overflow-xscroll  overflow-hidden mt-3 margin-top83px">
<table class=" " cellpadding="10" width="100%" border="0">
<thead>
<tr class="border-bottom1px colorDarkGray">
<th align="center">#</th>
<th align="center" width="200">Title</th>
<th align="center">Employee Name</th>
<th align="center">Restaurant Name</th>
<th align="center">Date of Inspection</th>
<th align="center">Action</th>
</tr>
</thead>
<tbody id="ListInspections"> 
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
<h5 class="pull-left col-11 p-0">Inspection Detail</h5>
<p class="pull-right colorLightOrange fontweightBold cursor" onClick="closePupop()">X</p>
<div class="clearfix"></div>
<div class="alert-danger" id="updinspect" style="display:none;">Please fill-in all the mandatory fields.</div>
</div>
<div class="col-12 pb-3"> 
<!--<div class="form-group col-12 p-0">  
<label for="titleDeseg" class="colorBlue">Inspector Name</label>
<input type="hidden" id="InspectionIDPOP" >
<input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="InspectionamePOP" aria-describedby=" " placeholder=" " readonly style="background:#FFF;">
  </div>
  -->
 <div class="form-group col-12 p-0">  
<label for="titleDeseg" class="colorBlue">Inspection</label>
<input type="hidden" id="InspectionIDPOP" >
<input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="InspectionPOP" aria-describedby=" " placeholder=" " readonly style="background:#FFF;">
  </div>
  <div class="form-group col-12 p-0"> 
    <label for="titleDeseg" class="colorBlue">Employee</label>
    <input type="text" readonly class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="EmployeeSelectPOP" aria-describedby=" " placeholder=" " style="background:#FFF;">
  </div>
   <div class="form-group col-12 p-0">
    <label for="JoiningDate" class="colorBlue">Date of Inspection</label>
    <input type="date" class="form-control borderpuopInput p-0 marginicon" id="InspectionDatePOP" aria-describedby=" " placeholder=" ">
  </div>
  <div class="form-group col-12 p-0 fadeIn" id="popFlowUp">
    <label for="switchDate" class="colorBlue">Follow Date</label>
    <button type="button" id="noYesSwitchpop" class="btn btn-lg btn-toggle mt-2 cursor" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="toggaleUnspectionPop()">
        <div class="handle"></div>
      </button>
    <input type="date" class="form-control borderpuopInput p-0 marginicon" id="switchAfterDatepop">
  </div>
  <div class="form-group col-12 p-0">
     <label for="comOn" class="colorBlue">Comments</label>
    <textarea class="form-control icon-edit icon-position height-70px borderpuopInput p-0 pr-2 icon-editComint" id="CommentsPOP" rows="3" cols="10"></textarea>
  </div>
  <label for="dateBirth" class="colorBlue">Attachment</label>
  <div class="form-group col-12 p-0 text-right" id="Dlink">
   </div>
  
  <div class="form-group col-12 p-0">
  <input type="button" class="btn btn-darkBrown col-12 text-left p-2 icon-attachmentpupop pl-3" value="Add New Attachment">
    <input type="file" class="form-control-file inputfileBtn col-lg-12 col-md-12 col-sm-12 col-12 opacity0" id="filePOP" name="filePOP" aria-describedby="fileHelp">
  </div>
  <div class="form-group col-6 p-0 m-auto">
    <input type="button" class="btn btn-darkBrown col-12" value="UPDATE" onClick="Update_inspection()">
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
<div class="clearfix"></div>
<div class="col-12 alert-danger" id="emailError" style="display:none;">Email sent successfully!</div>
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
    <input type="button" class="btn btn-darkBrown col-12 cursor" value="YES" onClick="delete_inspection()">
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
<script>

$("#Comments,#CommentsPOP").bind('keypress', function(e) {
   
       if ((e.which > 32 && e.which < 44) || (e.which==45) ||   (e.which > 57 && e.which < 65) ||  (e.which > 90 && e.which < 97) || e.which > 122)         {
               e.preventDefault();
         }
				
}); 

</script>
</html>
