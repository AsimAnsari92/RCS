// JavaScript Document

$(window).scroll(function() {
	$('header').each(function(){
	var imagePos = $(this).offset().top;
	var topOfWindow = $(window).scrollTop();
	
	 var wid= window.innerWidth;
	//alert(imagePos);
	console.log("topOfWindow "+topOfWindow);
	
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

$(window).resize(function() {
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
});


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
 	//document.getElementById('pupop').style.display="block";
}

function closePupop()
{
 	$("#pupop").fadeOut("slow");
	//document.getElementById('pupop').style.display="none";
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




$( document ).ready(function() {
    getUrl();
	dateRestrict();
	
});


function getUrl()
{
	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);
	var matchFilename=['dashboard.php','employee.php','certification.php','license.php','inspection.php'];
	for(i=0; i<=4; i++){
		if(filename==matchFilename[i])
		{
			$('#activMenu'+i).addClass('activeMenu');
		}
	}
	
}

function SAlert(msg)
{
	$("#AlertMsg").addClass("alert-success").removeClass("alert-danger"); 
	$("#AlertTxt").html("<strong>Success!</strong> "+msg); 
	$("#AlertMsg").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg").fadeOut("slow"); }, 4000);
}


function DSAlert(msg)
{
	$("#AlertMsg").addClass("alert-danger").removeClass("alert-success"); 
	$("#AlertTxt").html("<strong>Error!</strong> "+msg); 
	$("#AlertMsg").fadeIn("slow");
	setTimeout(function(){ $("#AlertMsg").fadeOut("slow"); }, 4000);
}

var DeleteID=""; 
function deleteBox(id)
{ 
	DeleteID = id;
	$("#deleteBox").fadeIn("fast");
 }
 
 



function licPerTab(getID)
{
	for(i=1; i<=2; i++)
	{
		$("#tab"+i).removeClass('activeTab');
	}
	$("#tab"+getID).addClass('activeTab');
	if(getID==1)
	{
		$("#License").html("<option>Alcoholic Beverage and Caterer Licenses</option>\
      <option>Food Service Facility License</option>\
      <option>Food Processing Plant License</option>\
      <option>Frozen Dessert Manufacturer License</option>\
      <option>Commercial Weighing & Measuring Device Registration</option>\
      <option>Commercial Logo License</option>\
      <option>Liquor License</option>\
      <option>Permanent Food Service Facility License</option>");
	}
	else
	{
		$("#License").html("<option>Alcoholic Beverage Permit</option>\
      <option>Migratory Labor Camp Permit</option>\
      <option>Food Service Facility Permits (Annual and Temporary)</option>");
	}
	
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
	
function dateRestrict()
{
	/*var bdydate = document.getElementById('DateOfBirth'),
	futuredate = new Date();
	futuredate.setDate(futuredate.getDate() -1);
	bdydate.max = convertToISO(futuredate);*/

}

function issueExpDateMatch()
{
	getIssueDate=$("#IssuanceDate").val();
	var expdate = document.getElementById('ExpirationDate'),
	currentdate = new Date(getIssueDate);
	currentdate.setDate(currentdate.getDate() +1);
	expdate.min = convertToISO(currentdate);
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
	return finalJoiningDate2;
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

