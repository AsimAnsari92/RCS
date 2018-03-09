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
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,  maximum-scale=1.0, user-scalable=0">
<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">

<title>RCM TOOL - EMPLOYEE</title>
<link rel="icon" href="images/logo/favicon.png" type="images/logo/favicon.png" />
<link href="fonts/fontStyle.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/dataJs/jquery-latest.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<link rel="stylesheet" href="js/dataJs/jquery.dataTables.min.css" />
<script src="js/dataJs/jquery.dataTables.min.js"></script>
<script src="js/dataJs/dataTables.buttons.min.js"></script>
<script src="js/dataJs/buttons.html5.min.js"></script>
<script src="js/webjs1.js"></script>
<script src="js/new1.js"></script>


 </head>

<body onLoad="username(),getAllEmp(),getAllrestaurant()">
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
<h3 class="colorBlue m-0 textCenterScr768">EMPLOYEE</h3>
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
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">Set Up Employee</h4>
<div class="alert alert-success fadeIn pull-right mb-0 margin-top10px" id="AlertMsg" role="alert" style="display:none">
  <span id="AlertTxt">You successfully Add Data.</span>
</div>
</div>

<div class="col-12 border-bottom1px pb-4 mt-3">

<div class="boxes col-12 p-4">
 <div class="col-12 overflow-hidden">
  <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="empName">Employee ID<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="EmployeeID" aria-describedby="" placeholder="Employee ID">
  </div> 
  
  <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="empName">Employee Name<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="EmployeeName" aria-describedby="" placeholder="Employee Name">
  </div>
  
   <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="comOn">Restaurant Name<span style="color:#F00;">*</span></label>
    <select class="form-control icon-arrow" id="Restaurantdropdwon">
      <option value="">-Select-</option> 	
     
    </select>
  </div>
  
  
  
  <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1"> 
    <label for="titleDeseg">Title (Designation)<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="TitleDesignation" aria-describedby=" " placeholder="Title (Designation)">
  </div>
  
</div>  
<div class="col-12 overflow-hidden">

 <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="dateBirth">Date of Birth<span style="color:#F00;">*</span></label>
    <input type="date" class="form-control" id="DateOfBirth" onChange="dateDopJoinigMatch()">
  </div>

  <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="comOn">Completion of Onboarding<span style="color:#F00;">*</span></label>
    <select class="form-control icon-arrow" id="CompletionOnboarding">
      <option value="">-Select-</option> 	
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div class="form-group pull-left  col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="titleDeseg">Probation Period<span style="color:#F00;">*</span></label>
    <input type="date" class="form-control" id="ProbationPeriod" aria-describedby=" " placeholder=" ">
  </div>
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="JoiningDate">Date of Hire<span style="color:#F00;">*</span></label>
    <input type="date" class="form-control" id="JoiningDate" aria-describedby=" " placeholder="" disabled>
  </div>
</div> 
	
<div class="col-12 overflow-hidden">
  
  <div class="form-group pull-left col-lg-6 col-md-6 col-sm-12 col-12 p-1 mb-0">
    <label for="comOn">Comments</label>
    <textarea class="form-control icon-edit icon-position height-40px" id="EmpComments" placeholder="Type Here..." rows="3" cols="10" maxlength="200"></textarea>
  </div>
  <div class="form-group pull-left col-lg-3 col-md-5 col-sm-12 col-12 p-1">
    <label for="dateBirth">Upload</label>
    <button type="button" class="form-control-file btn btn-white font-familyUniversLT icon-attachment col-lg-12 col-md-12 col-sm-12 col-12 text-left height-40px atchbtn" aria-describedby="fileHelp">Upload Scanned<br> Copy of the Document</button>
   <input type="file" class="form-control-file inputfileBtn col-lg-12 col-md-12 col-sm-12 col-12 opacity0" id="fileEmp" name="fileEmp" aria-describedby="fileHelp" onChange="imgUpload()">
    <span class="colorBlue d-block m-2 pull-left" id="attached"></span>
    <span id="cross" class="colorLightOrange crossImgAttch font-familyUniversLT font-size14px cursor fontweightBold" onClick="imgUploadRemove()"></span>
   
  </div>
  
  
 
  
  <div class="form-group pull-right col-lg-2 col-md-3 col-sm-12 col-12 p-1 margin-top28px">
    <input type="button" onClick="AddEmployee()" class="btn btn-darkBrown col-12" value="ADD">
  </div>


</div>



 
 
</div>
</div>


<div class="col-12 margin-top83px">
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">List of Employees</h4>
<div class="boxes2 col-12 p-4 overflow-xscroll overflow-hidden mt-3 margin-top83px">
<table class=" " cellpadding="10" width="100%" border="0" id="myTable">
<thead>
<tr class="border-bottom1px colorDarkGray">
<th align="center" class="outlineNone">#</th>
<th align="center" class="outlineNone">Employee ID</th>
<th align="center" class="outlineNone">Employee Name</th>
<th align="center" class="outlineNone">Restaurant Name</th>
<th align="center" class="outlineNone">Title (Designation)</th>
<th align="center" class="outlineNone">Joining Date</th>
<th align="center" class="outlineNone"> Action</th>
</tr>
</thead>

<tbody id="AllEmployeesData">
</tbody>
</table>

</div>
</div>

</div>
</div>
</div>
</article>

</section>
<div class="col-12 pupopBg overflow-yscroll" id="pupop" style="display:none;">
<div class="col-lg-5 col-md-6 col-sm-8 col-11 boxes pupopInnerBox" style="margin-top:30px; margin-bottom:30px;">
<div class="col-12 pt-3 overflow-hidden">
<h5 class="pull-left col-11 p-0">Employee Detail</h5>
<p class="pull-right colorLightOrange fontweightBold cursor" onClick="closePupop()">X</p>
<div class="clearfix"></div>
<div id="empeupdate" class="alert-danger" style="display:none;">Please fill-in all the mandatory fields.</div>
</div>
<div class="col-12 pb-3">
 <div class="form-group col-12 p-0"> 
    <label for="empName" class="colorBlue">Employees ID</label>
    <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="EmployeeIDPOP" aria-describedby="" placeholder=" ">
  </div>

<div class="form-group col-12 p-0"> 
    <label for="empName" class="colorBlue">Employees Name</label>
    <input type="hidden" id="EmployeeidPOP" >
    <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="EmployeeNamePOP" aria-describedby="" placeholder=" ">
  </div>
  
   <div class="form-group col-12 p-0">
    <label for="comOn" class="colorBlue">Restaurant Name</label>
    <select class="icon-arrowPop form-control borderpuopInput p-0 marginicon" id="Restaurantdropdwonpopup">
       <option value="">-Select-</option>
    </select>
  </div>
  
  
  
 <div class="form-group col-12 p-0"> 
    <label for="titleDeseg" class="colorBlue">Title (Designation)</label>
    <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput p-0" id="TitleDesignationPOP" aria-describedby=" " placeholder=" ">
  </div>
  <div class="form-group col-12 p-0">
    <label for="JoiningDate" class="colorBlue">Date of Hire</label>
    <input type="date" class="form-control borderpuopInput p-0 marginicon" id="JoiningDatePOP" aria-describedby=" " placeholder=" ">
  </div>
  <div class="form-group col-12 p-0">
    <label for="comOn" class="colorBlue">Completion of Onboarding</label>
    <select class="icon-arrowPop form-control borderpuopInput p-0 marginicon " id="CompletionOnboardingPOP">
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div class="form-group col-12 p-0">
    <label for="titleDeseg" class="colorBlue">Probation Period</label>
   <input type="date" class="form-control borderpuopInput p-0 marginicon" id="ProbationPeriodPOP" aria-describedby=" " placeholder=" ">
  </div>
  <div class="form-group col-12 p-0">
    <label for="dateBirth" class="colorBlue">Date of Birth</label>
    <input type="date" class="form-control borderpuopInput p-0 marginicon" id="DateOfBirthPOP" aria-describedby=" " placeholder=" ">
   </div>
   
   <div class="form-group col-12 p-0"> 
    <label for="titleDeseg" class="colorBlue">Comments</label>
    <textarea type="text" class="form-control icon-edit2 borderpuopInput p-0 height-70px" id="CommentsPOP" aria-describedby=" " placeholder=" " style="padding-right:50px !important;"></textarea>
  </div>
  
  <div id="allDocsByUser">
       <div class="form-group  col-12 p-1 border-bottom1px icon-edit pupopBgPosition">
           <div class="colorBlue">License</div>
           <div class="font-size18px">Food safety</div>
             <div class="font-size14px row">
               <div class="col-lg-6 col-md-5 col-sm-12 col-12 pt-0 pl-3">Issuance date <span>(02/09/2018)</span></div>
               <div class="col-lg-6 col-md-5 col-sm-12 col-12">Expiration date <span>(02/09/2018)</span></div>
            </div>
      </div>
     
       <div class="form-group  col-12 p-1 border-bottom1px icon-edit pupopBgPosition">
           <div class="colorBlue">License</div>
           <div class="font-size18px">Food safety</div>
             <div class="font-size14px row">
               <div class="col-lg-6 col-md-5 col-sm-12 col-12 pt-0 pl-3">Issuance date <span>(02/09/2018)</span></div>
               <div class="col-lg-6 col-md-5 col-sm-12 col-12">Expiration date <span>(02/09/2018)</span></div>
            </div>
      </div>
  </div>
 
  <div class="colorBlue pb-3">Attachment</div>
  
  <div class="form-group col-12 text-right p-0" id="Dlink2">
 
  
  </div>
  
   <div class="form-group col-12 p-0">
  <input type="button" class="btn btn-darkBrown col-12 text-left p-2 icon-attachmentpupop pl-3" value="Add New Attachment">
    <input type="file" class="form-control-file inputfileBtn col-lg-12 col-md-12 col-sm-12 col-12 opacity0" id="filePOPEmp" name="filePOPEmp" aria-describedby="fileHelp">
  </div>
   
   
  <div class="form-group col-6 p-0 m-auto">
    <input type="button" class="btn btn-darkBrown col-12" value="UPDATE" onClick="updateEmp()">
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
    <input type="button" class="btn btn-darkBrown col-12 cursor" value="YES" onClick="deleteEmp()">
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
<script>dateRestrict(document.getElementById('DateOfBirth'),document.getElementById('DateOfBirthPOP'));</script>
 
  
<script>
/*$(document).ready(function(){
	
	$('#myTable').DataTable({  
	"ordering": false,
	"paging": false,
	"searching": false,
	   "bInfo" : false,
 		dom: 'lBfrtip',
		buttons: [
			  'csvHtml5',
			  {
 				filename: 'Data export',
  			}] 
	});
	$(".buttons-csv").html("<span>Excel</span>");
});	*/

$("#EmpComments,#CommentsPOP").bind('keypress', function(e) {
   
       if ((e.which > 32 && e.which < 44) || (e.which==45) ||   (e.which > 57 && e.which < 65) ||  (e.which > 90 && e.which < 97) || e.which > 122)         {
               e.preventDefault();
         }
				
}); 
</script>
</body>
</html>

