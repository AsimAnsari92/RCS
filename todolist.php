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

<title>RCM TOOL - TO DO LIST</title>
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

<body onLoad="username(),GetAlltask()">
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
<h3 class="colorBlue m-0 textCenterScr768">TO-DO</h3>
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
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">Add Task</h4>
<div class="alert alert-success fadeIn pull-right mb-0 margin-top10px" id="AlertMsg" role="alert" style="display:none">
  <span id="AlertTxt">You successfully Add Data.</span>
</div>
</div>

<div class="col-12 border-bottom1px pb-4 mt-3">

<div id="todoinput" class="boxes col-12 p-4">
 <div class="col-12 overflow-hidden">
 
 
  <div class="form-group pull-left mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0"> 
    <label for="titleDeseg">Task<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control icon-edit" id="TaskType" aria-describedby=" " placeholder="Task" maxlength="150">
  </div>
  
  <div class="form-group pull-left  mr-3 col-lg-3 col-md-5 col-sm-12 col-12 p-0">
    <label for="comOn">Priority<span style="color:#F00;">*</span></label>
    <select class="form-control icon-arrow" id="TaskPriority">
      <option value="">-Select-</option> 	
      <option value="High">High</option>
      <option value="Low">Low</option>
    </select>
  </div>
  
  
  <div class="form-group pull-right col-lg-2 col-md-3 col-sm-12 col-12 p-0 margin-top28px" style="margin-right:6px;">
    <input type="button" onClick="AddTask()" class="btn btn-darkBrown col-12" value="ADD">
  </div>
  
 
  
  
  
</div>  
  
 
</div>
</div>


<div class="col-12 margin-top83px">
<h4 class="font-weight-bold mt-4 colorDarkGray pull-left">List of Tasks</h4>
<div class="boxes2 col-12 p-4 overflow-xscroll overflow-hidden mt-3 margin-top83px">
<table class=" " cellpadding="10" width="100%" border="0" id="myTable">
<thead>
<tr class="border-bottom1px colorDarkGray">
<th align="center" class="outlineNone">Entry Date</th>
<th align="center" class="outlineNone" width="250">Task</th>
<th align="center" class="outlineNone">Priority</th>
<th align="center" class="outlineNone">Completion Date</th>
<th align="center" class="outlineNone">Status</th>
<th align="center" class="outlineNone">Action</th>
</tr>
</thead>

<tbody id="AllTaskData">
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
    <input type="button" class="btn btn-darkBrown col-12 cursor" value="YES" onClick="deletTask()">
  </div>
  <div class="form-group col-6 pull-right">
    <input type="button" class="btn btn-darkBrown col-12 cursor" value="NO" onClick="closeDelPupop()">
  </div>
</div>
</div>
</div>


<!--/*Edit task PUPOP*/ -->
<div class="col-12 pupopBg" id="finishBox" style="display:none;">
<div class="col-lg-3 col-md-4 col-sm-6 col-11 boxes pupopInnerBox">
<div class="col-12 pt-3 p-0">
<h5 class="pull-left col-11 p-0">Task Detail</h5>
<p class="pull-right colorLightOrange fontweightBold cursor" onClick="closeFinishPupop()">X</p>
<div class="clearfix"></div>
<div class="alert-danger col-12 font-size14px" id="Tupdate" style="display:none;">Please fill-in all the mandatory fields.</div>
</div>

<div class="form-group col-12 p-0"> 
    <label for="empName" class="colorBlue">Task</label>
    <input type="hidden" id="Task" >
    <textarea class="form-control icon-edit2  borderpuopInput p-0 height-70px" id="TaskNamePOP" aria-describedby=""></textarea>
  </div>
 
  <div class="form-group col-12 p-0">
    <label for="comOn" class="colorBlue">Priority</label>
     <select class="icon-arrow form-control borderpuopInput p-0 marginicon pupopBgPosition" id="TaskPriorityPop">
      <option value="High">High</option>
      <option value="Low">Low</option>
    </select>
  </div>
  
  <div class="form-group col-12 p-0">
    <label for="comOn" class="colorBlue">Status</label>
    <select class="icon-arrow form-control borderpuopInput p-0 marginicon pupopBgPosition" id="TaskStatusPop">
     <option value="Pending">Pending</option>
      <option value="Complete">Complete</option>
      
    </select>
  </div>
  <div class="form-group col-6 p-3 m-auto">
    <input type="button" class="btn btn-darkBrown col-12" value="UPDATE" onClick="updatetask()">
  </div>
      
 <!-- <div class="form-group col-12 p-0">
    <label for="titleDeseg" class="colorBlue">Probation Period</label>
 
    <input type="date" class="form-control borderpuopInput p-0 marginicon" id="ProbationPeriodPOP" aria-describedby=" " placeholder=" ">
  </div>
  <div class="form-group col-12 p-0">
    <label for="dateBirth" class="colorBlue">Date of Birth</label>
    <input type="date" class="form-control borderpuopInput p-0 marginicon" id="DateOfBirthPOP" aria-describedby=" " placeholder=" ">
   </div>
  <div class="form-group col-6 p-0 m-auto">
    <input type="button" class="btn btn-darkBrown col-12" value="UPDATE" onClick="updateEmp()">
  </div>
-->

<!--<div class="form-group col-6 pull-left">
    <input type="button" class="btn btn-darkBrown col-12 cursor" value="YES" onClick="updatetask()">
  </div>
  <div class="form-group col-6 pull-right">
    <input type="button" class="btn btn-darkBrown col-12 cursor" value="NO" onClick="closeFinishPupop()">
  </div>
  -->
  
</div>
</div>
</div>






<div class="col-12 pupopBg" id="loader" style="display:none;">
<div class="loader">Loading...</div>
<P class="loaderTxt">Loading, please wait.</P>
</div>

  

</body>
<script>

$("#TaskNamePOP,#TaskType").bind('keypress', function(e) {
   
       if ((e.which > 32 && e.which < 44) || (e.which==45) ||   (e.which > 57 && e.which < 65) ||  (e.which > 90 && e.which < 97) || e.which > 122)         {
               e.preventDefault();
         }
				
}); 
</script>
</html>

