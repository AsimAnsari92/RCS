// JavaScript Document
$( document ).ready(function() {
    getUrl();
	getBrowserHeight();
	//dateRestrict();
	
	widthForMenu = $(window).width();
	
});


function getBrowserHeight(){
	window_size = $(window).height();
	$("aside").height(window_size);
	$("article").height(window_size);
	$("#secFixHeight").height(window_size);
}
$(window).resize(function() {
	getBrowserHeight();
});



$(window).scroll(function() {
	$('header').each(function(){
	var imagePos = $(this).offset().top;
	var topOfWindow = $(window).scrollTop();
	
	 var wid= window.innerWidth;
	//alert(imagePos);
	//console.log("topOfWindow "+topOfWindow);
	
		if (topOfWindow == 0)
		{
			//$(this).removeClass("fadeInDown hederFixedPos");
			
			/*$("#content1").removeClass("fadeInRight");
			$("#content1").addClass("displaynone");
			
			$("#contimg1").removeClass("fadeInLeft");
			$("#contimg1").addClass("displaynone");
			
			$("#content2").removeClass("fadeInLeft");
			$("#content2").addClass("displaynone");
			
			$("#contimg2").removeClass("fadeInRight");
			$("#contimg2").addClass("displaynone");*/
		}/*
		else if (topOfWindow > 768)
		{
			$(this).removeClass("fadeInDown hederFixedPos");
		}*/
		else
		{
			//$(this).addClass("fadeInDown hederFixedPos");
		}
		
		/*if(topOfWindow >= 300)
		{
			$("#content1").addClass("fadeInRight");
			$("#content1").removeClass("displaynone");
			
			$("#contimg1").addClass("fadeInLeft");
			$("#contimg1").removeClass("displaynone");
			
			$("#pastcont1").addClass("fadeInLeft");
			$("#pastcont2").addClass("fadeInDown");
			$("#pastcont3").addClass("fadeInRight");
			
		}
		
		if(topOfWindow >= 700)
		{
			$("#content2").addClass("fadeInLeft");
			$("#content2").removeClass("displaynone");
			
			$("#contimg2").addClass("fadeInRight");
			$("#contimg2").removeClass("displaynone");
			
			$("#pastcont4").addClass("fadeInLeft");
			$("#pastcont5").addClass("fadeInDown");
			$("#pastcont6").addClass("fadeInRight");
			$("#pastcont7").addClass("fadeInLeft");
			$("#pastcont8").addClass("fadeInRight");
		}
		
		if(topOfWindow >= 1400)
		{
			$("#content3").addClass("fadeInRight");
			$("#content3").removeClass("displaynone");
			
			$("#contimg3").addClass("fadeInLeft");
			$("#contimg3").removeClass("displaynone");
			
			
		}
		
		if(wid <=870)
		{
		}*/
	});
});

/*$(window).resize(function() {
   var width = $(this).width();
  
   if(width<768)
   {
	   $('#collapseTwo').removeClass("collapse in");
	   $('#collapseTwo').addClass("collapse");
	   $('#chngeicon').addClass("fa-caret-down");
		$('#chngeicon').removeClass("fa-caret-up");
   }
   else
   {
	   $('#collapseTwo').addClass("collapse in");
	   $('#collapseTwo').removeClass("collapse");
	}
});*/


$(window).load(function() {
   var width = $(this).width();
  
   if(width<768)
   {//alert();
	   $('#collapseTwo').removeClass("collapse in");
	   $('#collapseTwo').addClass("collapse");
	   $('#chngeicon').addClass("fa-caret-down");
		$('#chngeicon').removeClass("fa-caret-up");
   }
   else
   {
	   $('#collapseTwo').addClass("collapse in");
	   $('#collapseTwo').removeClass("collapse");
	}
});



function chngeMenuIcon()
{
	if($('#chngeicon').hasClass("fa-caret-down"))
	{
		$('#chngeicon').removeClass("fa-caret-down");
		$('#chngeicon').addClass("fa-caret-up");
	}
	else
	{
		$('#chngeicon').addClass("fa-caret-down");
		$('#chngeicon').removeClass("fa-caret-up");
	}
}


function openPupop()
{
	$("#pupop").fadeIn("slow");
}

function openPupopRest()
{
	$("#restMsg").fadeOut();
	$("#pupopRest").fadeIn("slow");
}

function openPupopRestclose()
{
	$("#pupopRest").fadeOut("slow");
}


function opnerestpopup()
{
	$("#popupeditrest").fadeIn("slow");
}

function opnerestpopupclose()
{
	$("#popupeditrest").fadeOut("slow");
}







var emailID="";docType="";
function emailPupop(id,d)
{
	emailID=id;
	docType= d;
	$("#emailPupop").fadeIn("slow");
}

function closePupop()
{
	emailID="";
 	$("#pupop").fadeOut("slow");
	$("#emailPupop").fadeOut("slow");
}

function loading()
{
	$("#loader").fadeIn("fast");
 	//document.getElementById('pupop').style.display="block";
}

function Cloading()
{
 	$("#loader").fadeOut("fast");
	//document.getElementById('pupop').style.display="none";
}




function openDelPupop()
{
	$("#deleteBox").fadeIn("slow");
}

function closeDelPupop()
{
 	$("#deleteBox").fadeOut("slow");
}


function getUrl()
{
	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);
	var matchFilename=['dashboard.php','employee.php','license.php','inspection.php','vendors.php','todolist.php','settings.php'];
	for(i=0; i<=7; i++){
		if(filename==matchFilename[i])
		{
			
			$("#activMenu"+i).addClass('activeMenu');
			
		}
	}
	
}

function SAlert(msg)
{
	/*$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
	$("#AlertMsg").addClass("alert-success").removeClass("alert-danger").removeClass("alert-info"); 
	$("#AlertTxt").html("<i class='fa fa-check font-size22px pull-left'></i> <div class='pull-left'>"+msg+"</div>"); 
	$("#AlertMsg").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg").fadeOut("slow"); }, 4000);*/
			SEMICOLON.widget.notifications('<div data-notify-type="success" data-notify-msg="'+msg+'"></div>');

}


function SAlertEmail(msg)
{
	/*$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
	$("#AlertMsg").addClass("alert-success").removeClass("alert-danger").removeClass("alert-info"); 
	$("#AlertTxt").html("<i class='fa fa-check font-size22px pull-left'></i> <div>"+msg+"</div>"); 
	$("#AlertMsg").fadeIn("slow");*/
			SEMICOLON.widget.notifications('<div data-notify-type="success" data-notify-msg="'+msg+'"></div>');
//	setTimeout(function(){ $("#AlertMsg").fadeOut("slow"); }, 4000);
}


function DSAlert(msg,margin_top)
{
	/*$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
	$("#AlertMsg").addClass("alert-danger").removeClass("alert-success").removeClass("alert-info"); 
	$("#AlertTxt").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i> <div class='pull-left "+margin_top+"'>"+msg+"</div>"); 
	$("#AlertMsg").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg").fadeOut("slow"); }, 4000);*/
		SEMICOLON.widget.notifications('<div data-notify-type="danger" data-notify-msg="'+msg+'"></div>');

}


function DSAlertnew(msg,margin_top)
{
	
	/*$("#AlertMsg").addClass("alert-danger").removeClass("alert-success").removeClass("alert-info"); 
	$("#AlertTxt").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i> <div class='font-size14px "+margin_top+"'>"+msg+"</div><div class='clearfix'></div>"); 
	$("#AlertMsg").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg").fadeOut("slow"); }, 4000);*/
	
	SEMICOLON.widget.notifications('<div data-notify-type="danger" data-notify-msg="'+msg+'"></div>');
}




function DSAlert2(msg,margin_top)
{
	/*$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
	$("#AlertMsg2").addClass("alert-danger").removeClass("alert-success").removeClass("alert-info"); 
	$("#AlertMsg2").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i><div class='pull-left "+margin_top+"'>"+msg+"</div>"); 
	$("#AlertMsg2").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg2").fadeOut("slow"); }, 4000);*/
		SEMICOLON.widget.notifications('<div data-notify-type="danger" data-notify-msg="'+msg+'"></div>');

}


function DSAlert3(msg,margin_top)
{
	/*$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
	$("#AlertMsg3").addClass("alert-danger").removeClass("alert-success").removeClass("alert-info"); 
	$("#AlertMsg3").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i> <div class='pull-left "+margin_top+"'>"+msg+"</div>"); 
	$("#AlertMsg3").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg3").fadeOut("slow"); }, 4000);*/
			SEMICOLON.widget.notifications('<div data-notify-type="danger" data-notify-msg="'+msg+'"></div>');

	
}

function DSAlert4(msg,margin_top)
{
	/*$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
	$("#AlertMsg3").addClass("alert-danger").removeClass("alert-success").removeClass("alert-info"); 
	$("#AlertMsg3").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i><div class='font-size14px pl-4 "+margin_top+"'>"+msg+"</div>"); 
	$("#AlertMsg3").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg3").fadeOut("slow"); }, 4000);*/
	SEMICOLON.widget.notifications('<div data-notify-type="danger" data-notify-msg="'+msg+'"></div>');

}



function InfoAlert(msg)
{
	/*$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
	$("#AlertMsg").addClass("alert-info").removeClass("alert-success").removeClass("alert-danger"); 
	$("#AlertTxt").html("<i class='fa fa-info-circle font-size22px pull-left'></i> <div class='pull-left'>"+msg+"</div>"); 
	$("#AlertMsg").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg").fadeOut("slow"); }, 4000);*/
		SEMICOLON.widget.notifications('<div data-notify-type="info" data-notify-msg="'+msg+'"></div>');

}

var DeleteID=""; 
function deleteBox(id)
{ 
	DeleteID = id;
	$("#deleteBox").fadeIn("fast");
}

var FinishID=""; 
function finishBox()
{ 
	//FinishID = fid;
	$("#finishBox").fadeIn("fast");
}
function closeFinishPupop()
{
 	$("#finishBox").fadeOut("slow");
}
 
 
 


var activeTabName="License";
function licPerTab(getID)
{ 
	for(i=1; i<=3; i++)
	{
		$("#tab"+i).removeClass('activeTab');
	}
	$("#tab"+getID).addClass('activeTab');
	
	if(getID==1)
	{
		activeTabName="License";
		$("#License").html("<option>-Select-</option>\
		<option>Liquor License</option>\
		<option>ABC Manger License (ABRA)</option>\
		<option>Business License</option>");
		getAllLicense();
		$("#capName").html("License");
		$("#EmployeeSelect").val("-Select-");
		$("#Restaurantdropdwon").val("-Select-");
		$("#IssuanceDate").val("");
		$("#Comments").val("");
		imgUploadRemove();
		issueExpDateMatch();
		$("#docHead").html("License Detail");
		$("#DocTabHead").html("License");
		$("#firstDocType").html("License");
	}
	if(getID==2)
	{
		activeTabName="Permit";
		$("#License").html("<option>-Select-</option><option>Food Safety Facility Permit</option>");
		getAllPermit();
		$("#capName").html("Permit");
		$("#EmployeeSelect").val("-Select-");
		$("#Restaurantdropdwon").val("-Select-");
		$("#IssuanceDate").val("");
		$("#Comments").val("");
		imgUploadRemove();
	    issueExpDateMatch();
	    $("#docHead").html("Permit Detail");
		$("#DocTabHead").html("Permit");
		$("#firstDocType").html("Permit");
	}
	
	if(getID==3)
	{
		activeTabName="certificate";
		$("#License").html('<option>-Select-</option>\
		<option value="Food Service Manager Certification">Food Service Manager Certification</option>\
		<option value="Food Safety Handler Certification">Food Safety Handler Certification</option>\
		<option value="TIPs Certification">TIPs Certification</option>\
		<option value="Certificate of Occupancy">Certificate of Occupancy</option>');
		getAllCertification();
		$("#capName").html("Certificate");
		$("#EmployeeSelect").val("-Select-");
		$("#Restaurantdropdwon").val("-Select-");
		$("#IssuanceDate").val("");
		$("#Comments").val("");
		imgUploadRemove();
		issueExpDateMatch();
		$("#docHead").html("Certificate Detail");
		$("#DocTabHead").html("Certificate");
		$("#firstDocType").html("Certificate");
		
	  
	}
}

function GetAllDocs()
{
	if(activeTabName=="License"){
	getAllLicense();}
	if(activeTabName=="Permit")
	{getAllPermit();}
	if(activeTabName=="certificate")
	{getAllCertification();}
	 	
}
function AddDocs()
{
	if(activeTabName=="License" || activeTabName=="Permit" ){
	  AddLicense_permit();}
	else{	
	  Addcertification();}		
}
function UpdateDocs()
{
	if(activeTabName=="License" || activeTabName=="Permit" ){
	UpdateLicense_permit();}
	else{	
	UpdateCertification();}
 }
function DeleteDocs()
{
	if(activeTabName=="License" || activeTabName=="Permit" ){
	deleteLicense_permit();}
	else{	
	deleteCertification();}
 }

function changePage(getFilesName)
{
	window.location.replace(getFilesName);
}

function convertToISO(timebit) {
	timebit.setHours(0, -timebit.getTimezoneOffset(), 0, 0);
	// remove GMT offset
	var isodate = timebit.toISOString().slice(0,10);
	// format convert and take first 10 characters of result
	return isodate;
	}
	
function dateRestrict(getDopDate,getDopDatePop)
{
	var bdydate = getDopDate,
	futuredate = new Date();
	futuredate.setDate(futuredate.getDate() -1);
	bdydate.max = convertToISO(futuredate);
	
	var bdydate2 = getDopDatePop,
	futuredate2 = new Date();
	futuredate2.setDate(futuredate2.getDate() -1);
	bdydate2.max = convertToISO(futuredate2);

}

function issueExpDateMatch()
{
	getIssueDate=$('#IssuanceDate').val();
	$('#ExpirationDate').val("");
	if(getIssueDate!="")
	{
		var expdate = document.getElementById('ExpirationDate'),
		currentdate = new Date(getIssueDate);
		currentdate.setDate(currentdate.getDate() +1);
		expdate.min = convertToISO(currentdate);
		document.getElementById("ExpirationDate").disabled = false;
	}
	if(getIssueDate=="")
	{
		$('#ExpirationDate').val("");
		document.getElementById("ExpirationDate").disabled = true;
	}
}



function InspectionDateChange()
{
	getIssueDate=$('#InspectionDate').val();
	$('#switchDate').val("");
 	var getAttr = $("#noYesSwitch").attr('aria-pressed');
 	
	if(getIssueDate!="" && getAttr=="true")
	{ 
		document.getElementById("switchDate").disabled = false;
	}
	if(getIssueDate=="")
	{
 		$('#switchDate').val("");
		$("#noYesSwitch").removeClass('active');
		document.getElementById("switchDate").disabled = true;
		$("#noYesSwitch").attr('aria-pressed','false'); 		
 	}
	if(getIssueDate!="")
	{
		var expdate = document.getElementById('switchDate'),
		currentdate = new Date(getIssueDate);
		currentdate.setDate(currentdate.getDate() +1);
		expdate.min = convertToISO(currentdate);
	}
 }

function issueExpDateMatchpop()
{
	getIssueDate2=$('#IssuanceDatePOP').val();
	var expdate2 = document.getElementById('ExpirationDatePOP'),
	currentdate2 = new Date(getIssueDate2);
	currentdate2.setDate(currentdate2.getDate() +1);
	expdate2.min = convertToISO(currentdate2);
}





function dateDopJoinigMatch()
{
	if($('#DateOfBirth').val()==""){
		document.getElementById("JoiningDate").disabled = true;
		$('#JoiningDate').val("");
		
	}
	getIssueDate=$('#DateOfBirth').val();
	var expdate = document.getElementById('JoiningDate'),
	currentdate = new Date(getIssueDate);
	currentdate.setDate(currentdate.getDate() +1);
	expdate.min = convertToISO(currentdate);
	
	document.getElementById("JoiningDate").disabled = false;
	
	
	
}


var finalJoiningDate,finalJoiningDate2;
function dateFormate(getDateValue,getDateValue2)
{
	var joinDate=new Date(getDateValue);
	var joinGetDay=joinDate.getDate();
	var joinGetMonth=joinDate.getMonth()+1;
	if(joinGetDay<10)
	{
		joinGetDay=0+''+joinGetDay;
	}
	if(joinGetMonth<10)
	{
		joinGetMonth=0+''+joinGetMonth;
	}
	var joinGetYear=joinDate.getFullYear();
	finalJoiningDate=joinGetMonth+"/"+joinGetDay+"/"+joinGetYear;
	
	var joinDate2=new Date(getDateValue2);
	var joinGetDay2=joinDate2.getDate();
	var joinGetMonth2=joinDate2.getMonth()+1;
	if(joinGetDay2<10)
	{
		joinGetDay2=0+''+joinGetDay2;
	}
	if(joinGetMonth2<10)
	{
		joinGetMonth2=0+''+joinGetMonth2;
	}
	
	var joinGetYear2=joinDate2.getFullYear();
	finalJoiningDate2=joinGetMonth2+"/"+joinGetDay2+"/"+joinGetYear2;
	//return finalJoiningDate2;
}






function imgUpload()
{
	getValue=$("#file").val();
	if(getValue!=""){
		$("#attached").html("File Attached");
		$("#cross").html("X");
	}
}

function imgUploadRemove()
{
	$("#file").val("");
	$("#attached").html("");
	$("#cross").html("");
}


var widthForMenu;
$(window).resize(function() {
	widthForMenu = $(this).width();
	removeMenuClass();
});

function removeMenuClass()
{
	$("aside").addClass('menuMiniScrDisplayNone');
	$("aside").removeClass('menuMiniScrDisplayBlock');
	$("aside").removeClass('fadeInLeft');
	$("aside").removeClass('moveInnerLeft');
}

function openMenu()
{
   if(widthForMenu<768)
   {
		$("aside").addClass('fadeInLeft');
		$("aside").addClass('menuMiniScrDisplayBlock');
		$("aside").removeClass('menuMiniScrDisplayNone');
		$("aside").removeClass('moveInnerLeft');
   }
   else{removeMenuClass();}
}

function closeMenu()
{
   if(widthForMenu<768)
   {
		$("aside").removeClass('fadeInLeft');
		$("aside").addClass('moveInnerLeft');
		setTimeout(function(){
			$("aside").addClass('menuMiniScrDisplayNone');
			$("aside").removeClass('menuMiniScrDisplayBlock');
			$("aside").removeClass('moveInnerLeft');
			},900);
   }
   else{removeMenuClass();}
}



function toggaleUnspection()
{
	
	var getAttr = $("#noYesSwitch").attr('aria-pressed');
	$("#switchDate").val("");
	$("#InspectionDate").val();
 	if(getAttr=="true"){
		//$("#switchAfterDate").attr("readonly", "true");
		$("#switchDate").attr('disabled','disabled');
		$("#astric").html('');
  	}
	if(getAttr=="false")
	{
		InspectionDateChange();
		//$("#switchAfterDate").css("readonly", "false");
		$("#switchDate").removeAttr('disabled');
		$("#astric").html('*');

	}
}


function toggaleUnspectionPop()
{
	var getAttrPop = $("#noYesSwitchpop").attr('aria-pressed');
	//$("#switchAfterDatepop").val("");
	if(getAttrPop=="true"){
		$("#switchAfterDatepop").attr('disabled','disabled');
		$("#switchAfterDatepop").val("");
	}
	if(getAttrPop=="false")
	{
		$("#switchAfterDatepop").removeAttr('disabled');
		
	}
}

/// daniyal Js///
/*Register*/
/*function checkEmpty(value){
	if(value == ""){
		RegAlert2("Please fill-in all the mandatory fields.");
		document.getElementById('signup').disabled = true;
	}else{
		document.getElementById('signup').disabled = false;
	}

}*/
 function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
                   // document.getElementById('signup').disabled = true;
                    console.log('check');
                    return true;
                }
                else{
                    return false;
                }
                
            }
            catch (err) {
                alert(err.Description);
            }
        }
function RegAlert2(msg,margin_top)
{
	$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
	$("#AlertMsg3").addClass("alert-danger").removeClass("alert-success").removeClass("alert-info"); 
	$("#AlertMsg3").html("<div class='pull-left "+margin_top+"'>"+msg+"</div>"); 
	$("#AlertMsg3").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg3").fadeOut("slow"); }, 4000);
}
	
/*function ValidateEmail()
{
	var inputMail = $('#email').val();
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(inputMail == ""){
		RegAlert2("Please fill-in all the mandatory fields.");
		document.getElementById('signup').disabled = true;
	}else if(!inputMail.match(mailformat))
	{
		RegAlert2("Invalid email address", "undefined");
		document.getElementById('signup').disabled = true;
	}else{
		document.getElementById('signup').disabled = false;
	}
}*/

function checkPassword()
  {
    // at least one number, one lowercase and one uppercase letter
    // at least six characters that are letters, numbers or the underscore
	var fpass = $('#password').val();
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{8,}$/;
    if(fpass == ""){
		RegAlert2("Please fill-in all the mandatory fields.");
		document.getElementById('signup').disabled = true;
	}else if(!re.test(fpass)){
		RegAlert2("Password must contain a capital letter, a digit and special character.", "undefined my-padding");
		document.getElementById('signup').disabled = true;
		$('.pull-left.undefined').css('line-height', '23px');
	}else{
		document.getElementById('signup').disabled = false;
	}
  }

function confirmPassword(){
	var firstpass = $('#password').val();
	var secondpass = $('#Repassword').val();
	if(firstpass != secondpass){
		RegAlert2("Password Not Matched");
		document.getElementById('signup').disabled = true;
	}else{
		document.getElementById('signup').disabled = false;
	}
}
/*$('document').ready(function(){
	$( "#firstname" ).focus(function() {
		document.getElementById('signup').disabled = true;
	});
	$( "#lastname" ).focus(function() {
		document.getElementById('signup').disabled = true;
	});
	$( "#email" ).focus(function() {
		document.getElementById('signup').disabled = true;
	});
	$( "#password" ).focus(function() {
		document.getElementById('signup').disabled = true;
	});
	$( "#Repassword" ).focus(function() {
		document.getElementById('signup').disabled = true;
	});
});
*/







