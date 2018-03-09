<script>
function supp(){$("#supdiv").fadeIn("slow");$("#Subject").val("");$("#Message").val("");}
function suppClose(){$("#supdiv").fadeOut("slow");}
</script>	
 <aside class="bg-gray col-lg-2 col-md-3 col-sm-4 col-7 p-0 pull-left menuMiniScrDisplayNone">
<div class="innerMenuIcon btn cursor" onclick="closeMenu()"><i class="fa fa-bars" aria-hidden="true"></i></div>
<h3 class="font-familyRobotoRegular colorWhite m-3 ml-4 pt-2 pb-2">RCM <span class="font-familyUniversLTStd">TOOL</span></h3>
<ul class="colorWhite p-0">
<li class="transition cursor" id="activMenu0" onClick="changePage('dashboard.php')">Dashboard</li>
<li class="transition cursor" id="activMenu1" onClick="changePage('employee.php')">Employee</li>
<li class="transition cursor" id="activMenu2" onClick="changePage('license.php')">License/Permit/Certificate</li>
<li class="transition cursor" id="activMenu3" onClick="changePage('inspection.php')">Inspection</li>
<li class="transition cursor" id="activMenu4" onClick="changePage('vendors.php')">Vendors</li>
<li class="transition cursor" id="activMenu5" class="" onClick="changePage('todolist.php')">To-Do</li>
<li class="transition cursor" id="activMenu6" onClick="changePage('settings.php')">Settings</li>

</ul>
<div class="text-center fotcont">
<img src="images/logo/logofot.png">
<p class="font-size14px m-0 mt-3 colorWhite">© Copyright 2017. All rights reserved.<br><a href="http://celeritas-solutions.com/" class="colorWhite" target="_blank">Powered by Celeritas Solutions.</a></p>
</div>
</aside>



<div id="supdiv" class="fixed-bottom pull-right col-lg-2 col-md-3 col-sm-4 col-7" style="padding: 0px 5px;">
<div class="supptxt">Support<span class="pull-right closex" onClick="suppClose()">x</span></div>
<div class="clearfix"></div>
<div id="emailsupport" class="alert-danger font-size14px p1" style="display:none;padding: 0px 5px;">Please fill-in all the mandatory fields.</div>
<div style="background:#fff;">
 <div class="form-group col-12 mp0">
    <label for="Subject" class="font-size14px">Subject<span style="color:#F00;">*</span></label>
    <input type="text" class="form-control height30 pl-1 font-size14px" id="Subject" placeholder="Subject">
  </div> 
  
  <div class="form-group col-12  mp0">
     <label for="comOn" class="font-size14px">Message<span style="color:#F00;">*</span></label>
    <textarea class="form-control height-70px p-1 pr-2 font-size14px" id="Message" rows="3" cols="10" placeholder="Message"></textarea>
  </div>
  
  <div class="form-group col-12 p-2 text-center senbtdiv">
  <button class="btn senbtn" onClick="SuppEmail()">SEND</button>
  </div>
  
  
</div>  

</div>


<div class="fixed-bottom pull-right supportbtn" id="supp" onClick="supp()">Support</div>






