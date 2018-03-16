// JavaScript Document
var  regexCapitalLetter = new RegExp("[A-Z]"); //Uppercase Alphabet.
var  regexDigit = new RegExp("[0-9]"); //Uppercase Alphabet.
var  regexSpecialLetter = new RegExp("[$@$!%*#?&^<>_]"); //Uppercase Alphabet.


//SEMICOLON.widget.notifications('<div data-notify-type="error" data-notify-msg="Error"></div>');
//info success warning error

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}


function forgotPage()
{
	$("#loginPage").css("display","none");
	$("#ForgotPage").css("display","block");
	$("#RegisterPage").css("display","none");
}

function RegisterPage()
{
	$("#loginPage").css("display","none");
	$("#RegisterPage").css("display","block");
}
function loginPage()
{
	$("#loginPage").css("display","block");
	$("#ForgotPage").css("display","none");
	$("#RegisterPage").css("display","none");
	$("#firstname").val("");
	$("#lastname").val("");
	$("#email").val("");
	$("#password").val("");
	$("#Repassword").val("");
	
	
}
function FuncResetPassword()
{

	 NewPassword = $("#NewPassword").val();
	 ConfirmPassword = $("#ConfirmPassword").val();
	 email = $("#email").val();
	 token = $("#token").val();
  	if(NewPassword==ConfirmPassword && email!="" && token!="" )
	{
		loading();
		$.ajax({
		type: "POST",
 		data:{NewPassword1:NewPassword,email1:email,token1:token},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/passwordreset.php?act=FuncResetPassword", 
		success:function(response)
		{
			Cloading();
			//console.log(response);
  			 if(response=='success')
			 { 	
				SAlert("Password reset successfully.");
				$("#NewPassword").val("");
				$("#NewPassword").val("");
				LogoutUser();
			 }
  			 if(response=='Error')
  			 {
  			 	DSAlert("Unable to proceed, please try again.","margin-top0px");Cloading();
				LinkExpire();
  			 }
	   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");Cloading();	loginPage(); 
			LinkExpire();  	
	   }
 	}); 
	}
	else
	{
		DSAlert("Password does not matched.");
		Cloading();
		LinkExpire();
	}
}
function ForgotPasswordEmail()
{
	 userEmail = $("#Forgotemaill").val();
  if(userEmail!="" && validateEmail(userEmail)!=false)
	{
		loading();
	  	$.ajax({
			type: "POST",
	 		data:{email:userEmail},
			dataType: 'json',
	 		url: "http://hivelet.com/rcm/test/passwordreset.php?act=ForgotPasswordEmail", 
			success:function(response)
			{
				Cloading();
	  			 if(response=='success')
				 { 	
					loginPage();
					SAlert("Email sent successfully!");
					$("#Forgotemaill").val("");
 	 			 }
	  			 if(response=='No Records')
	  			 {
	  			 	DSAlert2("Email does not exist.");Cloading();
	  			 }
	  			 if(response=='Error')
	  			 {
	  			 	DSAlert2('Unable to proceed, please try again.","margin-top0px');Cloading();
	  			 }
 	   		}, 
			error: function (xhr, status) 
			{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");Cloading();	loginPage();
	   		}
	 	});
 	}else{DSAlert2("Please enter a valid email address.","margin-top3px");Cloading()} 
}


function checkEmail(){
	Cemail = $("#email").val();
	$.ajax({
    type:'post',
        url:"http://hivelet.com/rcm/test/api.php?action=checkMail",// put your real file name 
        data:{Cemail: Cemail},
        success:function(response){
            console.log(response); // your message will come here.     
        }
 });

	
	
	
	
}

 function checkPassword(str)
  {
   
	 var re = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/
    return re.test(str);
  }





function RegisterUser()
{
		firstname = $("#firstname").val();
		lastname = $("#lastname").val();
		email = $("#email").val();
		password = $("#password").val();
		Repassword = $("#Repassword").val();
	
		
		
		
    if(email!="" && validateEmail(email)==true && lastname!="" && firstname!="" && password!="" && Repassword!="" && password == Repassword && checkPassword(password)==true)
    {
        loading();
        $.ajax({
            type: "POST",
            data:{firstname:firstname,lastname:lastname,email:email,password:password},
            url: "http://hivelet.com/rcm/test/api.php?action=RegisterUser",
            success:function(response)
            {
				
				
				if(response=='"exist"')
				{
				  DSAlert4("User Already Exists.","margin-top2px");
				  Cloading();
				}
				
                if(response=='"success"')
                {
                    //loginPage();
					ActivationEmail(email);
                    //SAlert("Email sent successfully!");
                    //$("#Forgotemaill").val("");
                }
                if(response=='No Records')
                {
                    DSAlert4("Please contact to support");Cloading();
                }
                if(response=='Error')
                {
                    DSAlert4('Unable to proceed, please try again.","margin-top0px');Cloading();
                }
            },
            error: function (xhr, status)
            {
                DSAlert4("Unable to proceed, please try again.","margin-top0px");Cloading();loginPage();
            }
        });
    }
	else{
		//DSAlert3("Please fill-in all the mandatory fields.","margin-top3px");
		if(email=="" || lastname=="" || firstname=="" || password=="" || Repassword==""){
			DSAlert4("Please fill-in all the mandatory fields.","margin-top0px");
			
			}
		
		if(validateEmail(email)!=true &&  email!="")
		{
			DSAlert4("Please enter a valid email address.","margin-top0px");
		}
		if(password != Repassword){
			DSAlert4("Password does not match.","margin-top3px");
			}
			
			
		if(checkPassword(password)!=true &&  password!=""){
			DSAlert4("Password must be of minimum 8 characters containing a capital letter, a digit and a special character.","margin-top0px");
			//RegAlert2("Password must contain a capital letter, a digit and special character.", "undefined my-padding");
			}
		
		/*if(!re.test(password) &&  password!="")
		{
			DSAlert3("Enter a validate password.","margin-top3px");
		}	
			
		if(!re.test(password) && password!="" &&  !re.test(Repassword)&& Repassword!="" ){
			DSAlert3("Password must contain a capital letter, a digit and special character.","margin-top3px");
			
			}
			*/
			
		
		
		 Cloading();
		 
		 
		 
		 
		 }
}

function ActivationEmail(email)
{
	 userEmail =email;
	  	$.ajax({
			type: "POST",
	 		data:{email:userEmail},
			dataType: 'json',
	 		url: "http://hivelet.com/rcm/test/passwordreset.php?act=ActivationEmail", 
			success:function(response)
			{
				
	  			 if(response=='success')
				 { 	
					loginPage();
					Cloading();
					SAlertEmail("Please check your email to activate your account.");
					$("#firstname").val("");
					$("#lastname").val("");
					$("#email").val("");
					$("#password").val("");
					$("#Repassword").val("");
  	 			 }
	  			 if(response=='No Records')
	  			 {
	  			 	DSAlert2("Email does not exist.");
					Cloading();
	  			 }
	  			 if(response=='Error')
	  			 {
	  			 	DSAlert2('Unable to proceed, please try again.","margin-top0px');Cloading();
	  			 }
 	   		}, 
			error: function (xhr, status) 
			{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");Cloading();	loginPage();
	   		}
	 	});
}
function login()
{
	
	userEmail = $("#emaillAddLogin").val();
	UserPass = $("#passwordLogin").val();
	
 if(userEmail!="" && UserPass!="")
	{
		loading();
	    $.ajax({
		type: "POST",
 		data:{email:userEmail,password:UserPass},
		dataType: 'json',
  		url: "http://hivelet.com/rcm/test/api.php?action=loginUser",
 		success:function(response)
		{ 
		  if(response=="inactive"){
			   DSAlertnew("Please check your email and activate your account.","margin-top0px");
			   Cloading();
			  
			  }
			  
		 else {	  
		   
		
			 if(response!='Error')
			 {
 				 $.cookie("login", "Admin");
				 $.cookie("fname", response[0]['fname']);
				 $.cookie("ID", response[0]['id']);
				 $.cookie("lname", response[0]['lname']);
				 $.cookie("email", response[0]['email']);
				if($.cookie("login")){window.location.href = "dashboard.php";}
			 }
			 else
			 {
				DSAlertnew("Invalid login credentials, please try again.","margin-top0px");
				Cloading();
				
			 }
		 }
			 
			
   		}, 
		error: function (xhr, status) 
		{  
			DSAlertnew("Unable to proceed, please try again.","margin-top0px");Cloading();
			Cloading();
    	}
 	});
	
	}
	
	else{DSAlertnew("Invalid login credentials, please try again.","margin-top0px");Cloading();} 
}
function LogoutUser()
{
	$.removeCookie("login");
	$.removeCookie("fname");
	$.removeCookie("lname");
	$.removeCookie("email");
	$.removeCookie("ID");
  	window.location.href = "index.php";
}
function LinkExpire()
{ 
  	window.location.href = "linkExpired.php";
}
var ADMIN;
function username()
{
	var fname = $.cookie('fname');
		ADMIN = $.cookie('ID');
		email = $.cookie('email');
		if($.cookie('ID')==undefined || $.cookie('ID')=="" || $.cookie('email')==undefined || $.cookie('email')=="")
		{
			LogoutUser();
		}
	$("#adminName").html("Hi, "+fname);
}
	
function AddEmployee()
{ 
	loading();
	
	EmployeeID	=   $("#EmployeeID").val();
	EmployeeName		= $("#EmployeeName").val();
	TitleDesignation 	= $("#TitleDesignation").val();
	JoiningDate 		= $("#JoiningDate").val();
	CompletionOnboarding= $("#CompletionOnboarding").val();
	ProbationPeriod 	= $("#ProbationPeriod").val();
	DateOfBirth 		= $("#DateOfBirth").val();
	Resturantval = $("#Restaurantdropdwon").val();
	EmployeeComments = $("#EmpComments").val();
	
	
	
	var formData = new FormData();
 	formData.append("file", document.getElementById('fileEmp').files[0]);
 		var objArr = [];
		objArr.push({"EmployeeID":EmployeeID, "EmployeeName": EmployeeName, "TitleDesignation": TitleDesignation, "JoiningDate": JoiningDate, "CompletionOnboarding": CompletionOnboarding,"ProbationPeriod":ProbationPeriod,"DateOfBirth":DateOfBirth,"Resturantval":Resturantval,"EmployeeComments":EmployeeComments,"admin":ADMIN}); 
 		formData.append('objArr', JSON.stringify( objArr ));
		 
			
	if(EmployeeID!="" && EmployeeName!="" && TitleDesignation!="" && JoiningDate!="" && CompletionOnboarding!="" && ProbationPeriod!="" && DateOfBirth!="" && Resturantval!="")
	{
		
	$.ajax({		
		type: "POST",
 		data:formData,
		contentType: false,
		cache: false,
		processData: false,
		
 		url: "http://hivelet.com/rcm/test/api.php?action=addEmp",

		success:function(response)
		{ 
			console.log(response);
  			 if(response=='"success"')
			 {
				getAllEmp();
				 SAlert("Record has been added.");
				 	
					$("#EmployeeName").val("");
					$("#TitleDesignation").val("");
					$("#JoiningDate").val("");
					$("#JoiningDate").attr("disabled","disabled");
					$("#CompletionOnboarding").val("");
					$("#ProbationPeriod").val("");
					$("#DateOfBirth").val("");
					$("#EmployeeID").val("");
					$("#EmpComments").val("");
					$("#Restaurantdropdwon").val(0);
					imgUploadRemove();
			 }
			 else{
				 	Cloading();
				 }
				
			}, 
			error: function (xhr, status) 
			{  
				Cloading();
				DSAlert("Unable to proceed, please try again.","margin-top0px");
			}
 		});
	}
	else{DSAlert("Please fill-in all the mandatory fields.","margin-top0px");Cloading();}
}




function DatatableInit()
{
 	$('#myTable').DataTable({  
	"ordering": false,
	"paging": false,
	"searching": true,
	   "bInfo" : false,
 		dom: 'lBfrtip',
		language: {
        searchPlaceholder: "Search",
		 search: "" 
    },
				buttons: [
        {
            extend: 'csvHtml5',
             exportOptions: {
               columns: [ 0, 1,2,3,4,5]
            }
        }
    ]
	});
	
  	$(".buttons-csv").addClass("btn btn-darkBrown col-2 pull-right");
 	$(".buttons-csv").html("<span>EXPORT IN EXCEL</span>");

}
function getAllEmp()
{   
loading();
 	$.ajax({
		type: "POST", 
		data:{admin:ADMIN},
 		url: "http://hivelet.com/rcm/test/api.php?action=getAllEmp", 
		success:function(response)
		{
			Cloading();
  			 if(response!='"No Records"')
			 {
				 $("#myTable").dataTable().fnDestroy();
				 document.getElementById("AllEmployeesData").innerHTML ="";
				 response=JSON.parse(response);
				 //console.log(response);
				 for(var i=0;i<response.length;i++)
				 {
					
						var emp_JoiningDate=response[i]['joining_date'];
						dateFormate(emp_JoiningDate);

 					 document.getElementById("AllEmployeesData").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['employee_id']+'</td>\
					<td align="center">'+response[i]['emp_name']+'</td>\
					<td align="center">'+response[i]['restaurant_name']+'</td>\
					<td align="center">'+response[i]['title']+'</td>\
					<td align="center">'+finalJoiningDate+'</td>\
				<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="getEmp('+response[i]['id']+')">View</span> | <span class="cursor" onClick="deleteBox('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 }
				 DatatableInit();
			 }
			 else{ 
				 $("#myTable").dataTable().fnDestroy();
				 InfoAlert("No records found.");
				 $("#AllEmployeesData").html("");
			 }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			 
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}


function getEmp(id)
{  
	getEmpDocs(id);
	loading();
	$("#EmployeeNamePOP").val("");
	$("#TitleDesignationPOP").val("");
	$("#JoiningDatePOP").val("");
	$("#CompletionOnboardingPOP").val( ""); 
	$("#DateOfBirthPOP").val(""); 
	$("#ProbationPeriodPOP").val(""); 
	$("#EmployeeidPOP").val( ""); 
	$("#EmployeeIDPOP").val("");
	 $("#Dlink2").html("");  

   	$.ajax({
		type: "POST",  
 		url: "http://hivelet.com/rcm/test/api.php?action=getEmp", 
		data:{userID:id},
		success:function(response)
		{
			Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				// console.log(response);
				 for(var i=0;i<response.length;i++)
				 {
					 
					 $("#EmployeeIDPOP").val( response[i]['employee_id']);
					 $("#EmployeeNamePOP").val( response[i]['emp_name']);
					 $("#TitleDesignationPOP").val( response[i]['title']);
					 $("#JoiningDatePOP").val( response[i]['joining_date']);
					 $("#CompletionOnboardingPOP").val( response[i]['completion_onboarding']); 
					 $("#DateOfBirthPOP").val( response[i]['dob']); 
					 $("#ProbationPeriodPOP").val( response[i]['probation_period']); 
					 $("#EmployeeidPOP").val( response[i]['id']); 
					 $("#Restaurantdropdwonpopup").val( response[i]['resturant_id']); 
					 $("#CommentsPOP").val( response[i]['comments']); 

					if(response[i]['file']=="" || response[i]['file']==null)
					{
					   	
					}
					else{
					$("#Dlink2").html('<a class="btn btn-darkBrown text-left d-block" href="http://hivelet.com/rcm/test/'+response[i]['file']+'" download>View Attachment<i class="fa fa-eye pull-right font-size22px" aria-hidden="true"></i></a>');  
					}
					 openPupop();
 				 }
  			 }else{  InfoAlert("No records found."); }
   		}, 
		error: function (xhr, status) 
		{ 
		    Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");

   		}
 	});
}

function getEmpDocs(id)
{
 	$.ajax({
		type: "POST",  
 		url: "http://hivelet.com/rcm/test/api.php?action=getEmpDocs", 
		data:{userID:id},
		success:function(response)
		{
			$("#allDocsByUser").html("");
			Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 if(response['License']!="")
				 {
 					 for(var i=0;i<response['License'].length;i++)
					 {
						  var file="";
						 if(response['License'][i]['lp_file_path']!="")
						 {
		file = '<a href="http://hivelet.com/rcm/test/'+response['License'][i]['lp_file_path']+'" download=""><div class="pull-right icon-download mr-3"></div></a>';
						 }
						 $("#allDocsByUser").append('<div class="form-group  col-12 p-1 border-bottom1px">\
							<div class="colorBlue">License</div>\
							<div class="font-size18px">'+file+'</div>\
							<div class="font-size18px">'+response['License'][i]['license']+'</div>\
							<div class="font-size14px row">\
		<div class="col-lg-6 col-md-5 col-sm-12 col-12 pt-0 pl-3">Issuance date <span>'+response['License'][i]['IssuanceDate']+'</span></div>\
		<div class="col-lg-6 col-md-5 col-sm-12 col-12">Expiration date <span>'+response['License'][i]['ExpirationDate']+'</span></div>\
						  </div></div>');
					 }
				 }
				 if(response['Permit']!="")
				 {
					 for(var j=0;j<response['Permit'].length;j++)
					 {
						var file="";
						 if(response['Permit'][j]['lp_file_path']!="")
						 {
		file = '<a href="http://hivelet.com/rcm/test/'+response['Permit'][j]['lp_file_path']+'" download=""><div class="pull-right icon-download mr-3"></div></a>';
						 }
						 $("#allDocsByUser").append('<div class="form-group  col-12 p-1 border-bottom1px">\
							<div class="colorBlue">Permit</div>\
							<div class="font-size18px">'+file+'</div>\
							<div class="font-size18px">'+response['Permit'][j]['license']+'</div>\
							<div class="font-size14px row">\
		<div class="col-lg-6 col-md-5 col-sm-12 col-12 pt-0 pl-3">Issuance date <span>'+response['Permit'][j]['IssuanceDate']+'</span></div>\
		<div class="col-lg-6 col-md-5 col-sm-12 col-12">Expiration date <span>'+response['Permit'][j]['ExpirationDate']+'</span></div>\
						  </div></div>');
					 }
				 }
				 if(response['certificate']!="")
				 {
					 for(var k=0;k<response['certificate'].length;k++)
					 {
						 var file="";
						 if(response['certificate'][k]['c_file_path']!="")
						 {
		file = '<a href="http://hivelet.com/rcm/test/'+response['certificate'][k]['c_file_path']+'" download=""><div class="pull-right icon-download mr-3"></div></a>';
						 }
						 $("#allDocsByUser").append('<div class="form-group  col-12 p-1 border-bottom1px">\
							<div class="colorBlue">Certificate</div>\
							<div class="font-size18px">'+file+'</div>\
							<div>'+response['certificate'][k]['certification']+'</div>\
							<div class="font-size14px row">\
		<div class="col-lg-6 col-md-5 col-sm-12 col-12 pt-0 pl-3">Issuance date <span>'+response['certificate'][k]['issue_date']+'</span></div>\
		<div class="col-lg-6 col-md-5 col-sm-12 col-12">Expiration date <span>'+response['certificate'][k]['exp_date']+'</span></div>\
						  </div></div>');	
					 }
				 }
   			 }else{  InfoAlert("No records found."); }
   		}, 
		error: function (xhr, status) 
		{ 
		    Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");

   		}
 	});
}
function updateEmp()
{ 
//loading();
  	EmployeeName = $("#EmployeeNamePOP").val();
	TitleDesignation = $("#TitleDesignationPOP").val();
	JoiningDate	= $("#JoiningDatePOP").val();
	CompletionOnboarding = $("#CompletionOnboardingPOP").val();
	ProbationPeriod	= $("#ProbationPeriodPOP").val();
	DateOfBirth	= $("#DateOfBirthPOP").val();
	uID	= $("#EmployeeidPOP").val();

	CommentsPOP = $("#CommentsPOP").val();
	EmployeeIDPOP  = $("#EmployeeIDPOP").val();
	Restaurantdropdwonpopup = $("#Restaurantdropdwonpopup").val();
	 
	var form_data = new FormData();
	form_data.append("Ufile", document.getElementById('filePOPEmp').files[0]);
	
 var data = [];
data.push({"EmployeeName":EmployeeName, "TitleDesignation": TitleDesignation, "JoiningDate": JoiningDate, "CompletionOnboarding": CompletionOnboarding, "ProbationPeriod": ProbationPeriod,"DateOfBirth":DateOfBirth,"admin":ADMIN,"Restaurantdropdwonpopup":Restaurantdropdwonpopup,"CommentsPOP":CommentsPOP,"EmployeeIDPOP":EmployeeIDPOP,"uID":uID});
   form_data.append('data', JSON.stringify(data));
   
   		
	if(EmployeeIDPOP!="" && EmployeeName!="" && TitleDesignation!="" && JoiningDate!="" && CompletionOnboarding!="-Select-" && ProbationPeriod!="" && DateOfBirth!="" && Restaurantdropdwonpopup!=0)
	{
   
   	$.ajax({
		type: "POST",
 		data:form_data,
		contentType: false,
		cache: false,
		processData: false,
		
		
 		url: "http://hivelet.com/rcm/test/api.php?action=updateEmp",
		 
		success:function(response)
		{
			console.log(response);
			 if(response=='"success"')
			 {
 				 getAllEmp();
				 closePupop();
				 SAlert("Record has been updated.");
			 }
			 else{ Cloading();}
   		}, 
		error: function (xhr, status) 
		{  
			Cloading();	
			
			//DSAlert("Unable to proceed, please try again.","margin-top0px");
		$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
		$("#empeupdate").fadeIn("slow");
		$("#empeupdate").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i>Unable to proceed, please try again.");
		setTimeout(function(){ $("#empeupdate").fadeOut("slow"); }, 4000);
		Cloading();
		console.log(status);
   		}
		
		
 	});
	
	
	}
	else{
		//DSAlert("Please fill-in all the mandatory fields.","margin-top0px");
		$(".overflow-yscroll").animate({ scrollTop: 0 }, "slow");
		$("#empeupdate").fadeIn("slow");
		$("#empeupdate").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i>Please fill-in all the mandatory fields.");
		setTimeout(function(){ $("#empeupdate").fadeOut("slow"); }, 4000);
		Cloading();
		
		}
	
}

function deleteEmp()
{ 
loading();
	$.ajax({
		type: "POST",
 		data:{userID:DeleteID},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/api.php?action=deleteEmp", 
		success:function(response)
		{
 			
 			 if(response=='success')
			 {
 				 getAllEmp();
				 closeDelPupop();
				 SAlert("Record has been deleted!");
 			 }
			 else{ DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	}
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	
   		}
 	});
}
 
function getEmpNames()
{  
	$.ajax({
		type: "POST", 
		dataType: 'json',
		data:{admin:ADMIN},
 		url: "http://hivelet.com/rcm/test/api.php?action=getEmpNames", 
		success:function(response)
		{
			document.getElementById("EmployeeSelect").innerHTML="";
			document.getElementById("EmployeeSelect").innerHTML +='<option value="-Select-">-Select-</option>';
  			 if(response!="No Records")
 			 {
 				 for(var i=0;i<response.length;i++)
				 { 
			document.getElementById("EmployeeSelect").innerHTML +='<option value="'+response[i]['id']+'">'+response[i]['emp_name']+'</option>';
  				 }
  			 }
			 //else{ document.getElementById("EmployeeSelect").innerHTML +='<option value="-Select-">-Select-</option>'; }
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
	
	
}

function getResturantName(){
	
	$.ajax({
		type: "POST", 
		dataType: 'json',
		data:{admin:ADMIN},
 		url: "http://hivelet.com/rcm/test/api.php?action=getRestNames", 
		success:function(response)
		{
			document.getElementById("RestNamebyEmp").value="";
			console.log(response);
		
  			 if(response!="No Records")
 			 {
 				 for(var i=0;i<response.length;i++)
				 { 
		 	       document.getElementById("RestNamebyEmp").value =response[i]['resturant_id'];
  				 }
  			 }
			 else
			 { //document.getElementById("EmployeeSelect").innerHTML +='<option value="No Employee">No Employee</option>';
			  }
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
	
	
	
	
	}




function Addcertification()
{ 
 	Certification1		= $("#License").val();
	Employee1			= $("#EmployeeSelect").val();
	IssuanceDate1 		= $("#IssuanceDate").val();
	ExpirationDate1		= $("#ExpirationDate").val();
	Comments1 			= $("#Comments").val(); 



 	var form_data = new FormData();
   		form_data.append("file", document.getElementById('file').files[0]);

var objArr = [];
objArr.push({"certification":Certification1, "employeeID": Employee1, "issue_date": IssuanceDate1, "exp_date": ExpirationDate1, "comments": Comments1,"admin":ADMIN}); 
form_data.append('objArr', JSON.stringify( objArr ));

 if(Certification1!="-Select-" && Employee1!="-Select-" && IssuanceDate1!="" && ExpirationDate1!="")
	{
		loading();
		//document.getElementById('progress').style.width="100%";
   	$.ajax({
		type: "POST",
 		data:form_data,
		contentType: false,
		cache: false,
		processData: false,
  		url: "http://hivelet.com/rcm/test/api.php?action=Addcertification", 
		success:function(response)
		{
			// console.log(response);
   			 if(response=='"success"')
			 {
 				  getAllCertification();
				  SAlert("Record has been added.");
				  
					$("#Certification").val("");
					$("#EmployeeSelect").val("");
					$("#IssuanceDate").val("");
					$("#ExpirationDate").val("");
					$("#Comments").val(""); 
					document.getElementById("ExpirationDate").disabled = true;
					imgUploadRemove();
					$("#EmployeeSelect").val("-Select-");
					$("#Restaurantdropdwon").val(0);
					$("#License").val("-Select-");
					//document.getElementById('progress').style.width="0%";
				  
			 } else{Cloading();DSAlert("Error uploading file");}
   		}, 
		error: function (xhr, status) 
		{  
			Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
	}
	else{ DSAlert("Please fill-in all the mandatory fields.","margin-top0px");Cloading();}
}



function getAllCertification()
{   
loading();
   	$.ajax({
		type: "POST",  
		data:{admin:ADMIN},
 		url: "http://hivelet.com/rcm/test/api.php?action=getAllCertification", 
		success:function(response)
		{
			Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 document.getElementById("getAllLicense_permit").innerHTML ="";
				 for(var i=0;i<response.length;i++)
				 {	
				 	 getexp_date=response[i]['exp_date'];	
					 getissue_date=response[i]['issue_date'];
					 dateFormate(getexp_date,getissue_date);
					 if(response[i]['restaurant_name']==null || response[i]['restaurant_name']==""){response[i]['restaurant_name']="-";}

					 
					 var empname = (response[i]['empname']==null ? "(Deleted Employee)" : response[i]['empname']);
					 
					 document.getElementById("getAllLicense_permit").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['certification']+'</td>\
					<td align="center">'+empname+'</td>\
					<td align="center">'+response[i]['restaurant_name']+'</td>\
					<td align="center">'+finalJoiningDate2+'</td>\
					<td align="center">'+finalJoiningDate+'</td>\
				<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="emailPupop('+response[i]['id']+',\'certification\')">Email</span> | <span class="cursor" onClick="getCertification('+response[i]['id']+')">View</span> | <span  class="cursor" onClick="deleteBox('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 }
   			 }else{ InfoAlert("No records found.");document.getElementById("getAllLicense_permit").innerHTML="";}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}



function getCertification(id)
{  loading(); 


$("#EmployeeSelectPOP").val("");
$("#LPIDPOP").val("");
$("#LicensePOP").val("");
$("#CommentsPOP").val("");
$("#IssuanceDatePOP").val("");
$("#ExpirationDatePOP").val("");
$("#HfilePOP").val("");
$("#EmployeeidPOP").val("");


   	$.ajax({
		type: "POST",  
 		url: "http://hivelet.com/rcm/test/api.php?action=getCertification", 

		data:{certID:id},
		success:function(response)
		{Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 //console.log(response);
				 for(var i=0;i<response.length;i++)
				 {
 				 var empname = (response[i]['empname']==null ? "(Deleted Employee)" : response[i]['empname']);
				 if(empname=="(Deleted Employee)")
				 {
					 $("#filePOP").attr("disabled", "disabled");
					 $("#upd").attr("disabled", "disabled");
					 $("#IssuanceDatePOP").attr("disabled", "disabled");
                     $("#ExpirationDatePOP").attr("disabled", "disabled");
					 $("#CommentsPOP").attr("disabled", "disabled");
				 }
				else
				 {
					 $("#filePOP").removeAttr("disabled", "disabled");
					 $("#upd").removeAttr("disabled", "disabled");
					 $("#IssuanceDatePOP").removeAttr("disabled", "disabled");
					 $("#ExpirationDatePOP").removeAttr("disabled", "disabled");
					  $("#CommentsPOP").removeAttr("disabled", "disabled");
					 }
					
   					 $("#LicensePOP").val(response[i]['certification']);
					 $("#EmployeeSelectPOP").val(empname);
					 $("#IssuanceDatePOP").val( response[i]['issue_date']);
					 $("#ExpirationDatePOP").val(response[i]['exp_date']); 
					 $("#CommentsPOP").val(response[i]['comments']); 
 					 $("#LPIDPOP").val(response[i]['id']); 
 					 $("#EmployeeidPOP").val(response[i]['employeeID']);
					 
		if(response[i]['c_file_path']!=null)
		{		
  					$("#Dlink").html('<a class="btn btn-darkBrown text-left d-block" href="http://hivelet.com/rcm/test/'+response[i]['c_file_path']+'" download>View Attachment<i class="fa fa-eye pull-right font-size22px" aria-hidden="true"></i></a>');  
		}
 
					 openPupop();
					 issueExpDateMatchpop();
 				 }
  			 }else{  }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}

function UpdateCertification()
{
	loading();
	CertificationPOP	=	$("#LPIDPOP").val();
	//EmployeeSelectPOP	=	$("#EmployeeSelectPOP").val();
	IssuanceDatePOP		=	$("#IssuanceDatePOP").val();
	ExpirationDatePOP	=	$("#ExpirationDatePOP").val();
	CommentsPOP			=	$("#CommentsPOP").val();
	
	
	var form_data = new FormData();
	form_data.append("Ufile", document.getElementById('filePOP').files[0]);
		
 var data = [];
data.push({"certification":CertificationPOP,"issue_date": IssuanceDatePOP, "exp_date": ExpirationDatePOP, "comments": CommentsPOP,"certID":CertificationPOP});
 form_data.append('data', JSON.stringify(data));
 
 if(IssuanceDatePOP!="" && ExpirationDatePOP!=""){
 
 	$.ajax({
		type: "POST",
 		data:form_data,
		contentType: false,
		cache: false,
		processData: false,
 		url: "http://hivelet.com/rcm/test/api.php?action=UpdateCertification", 
		success:function(response)
		{
 			console.log(response);
			 if(response=='"success"')
			 {
				 closePupop();
 				 getAllCertification();
			 	 SAlert("Record has been updated.");
			 }
			 else{ Cloading();}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			//DSAlert("Unable to proceed, please try again.","margin-top0px");
			$("#Lisupdate").fadeIn("slow");
		    $("#Lisupdate").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i>Unable to proceed, please try again.");
		    setTimeout(function(){ $("#Lisupdate").fadeOut("slow"); }, 4000);
   		}
 	});
 }
 else{
	 Cloading();
        $("#Lisupdate").fadeIn("slow");
		    $("#Lisupdate").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i>Please fill-in all the mandatory fields.");
		    setTimeout(function(){ $("#Lisupdate").fadeOut("slow"); }, 4000);
	 
	 
	 
	 }
}


function deleteCertification()
{   
loading();
	$.ajax({
		type: "POST",
 		data:{certID:DeleteID},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/api.php?action=deleteCertification", 
		success:function(response)
		{  			 //console.log(response=='success');
			 if(response=='success')
			 {
 				 getAllCertification();
				 closeDelPupop();
				 SAlert("Record has been deleted!");
			 }
			 else{ DDSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	}
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	
   		}
 	});
}



  

function AddLicense_permit()
{ 

License			= $("#License").val();
Comments		= $("#Comments").val();
LicPerUploadFile 	= $("#file").val();
IssuanceDate 	= $("#IssuanceDate").val();
ExpirationDate 	= $("#ExpirationDate").val();
Employee1			= $("#EmployeeSelect").val();
doctype = activeTabName;
 
 	var form_data = new FormData();
	form_data.append("file", document.getElementById('file').files[0]);
	var objArr = [];
	objArr.push({"license":License, "comments": Comments, "IssuanceDate": IssuanceDate, "ExpirationDate": ExpirationDate,"admin":ADMIN,"employeeID":Employee1,"doctype":doctype}); 
	form_data.append('objArr', JSON.stringify( objArr ));

  	if(License!="-Select-" && IssuanceDate!="" && Employee1!="-Select-" && ExpirationDate!="")
	{
		loading();
  	$.ajax({
		type: "POST",  
 		data:form_data,
		contentType: false,
		cache: false,
		processData: false,
  		url: "http://hivelet.com/rcm/test/api.php?action=AddLicense_permit", 
		success:function(response)
		{
   			 if(response=='"success"')
			 {
				  SAlert("Record has been added.");
				  GetAllDocs();
				 
					$("#License").val("");
					$("#Comments").val("");
					$("#IssuanceDate").val("");
					$("#ExpirationDate").val("");
					document.getElementById("ExpirationDate").disabled = true;
					imgUploadRemove();
					$("#EmployeeSelect").val("-Select-");
					$("#Restaurantdropdwon").val(0);
					
					

 			 } else{Cloading();DSAlert("Unable to proceed, please try again.","margin-top0px");}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
	}
 	else{DSAlert("Please fill-in all the mandatory fields.","margin-top0px");Cloading();}
 }


function UpdateLicense_permit()
{
 	LPIDPOP			= $("#LPIDPOP").val();
	License			= $("#LicensePOP").val();
	Comments		= $("#CommentsPOP").val();
	IssuanceDatePOP	= $("#IssuanceDatePOP").val();
	ExpirationDatePOP	= $("#ExpirationDatePOP").val();
	
	loading();
 	var form_data = new FormData();
	form_data.append("Ufile", document.getElementById('filePOP').files[0]);
	var data = [];
	data.push({"LPID":LPIDPOP, "license": License, "comments": Comments, "IssuanceDate": IssuanceDatePOP, "ExpirationDate": ExpirationDatePOP});
	form_data.append('data', JSON.stringify(data));
	
	if(IssuanceDatePOP!="" && ExpirationDatePOP!=""){


 $.ajax({
		type: "POST",
 		data:form_data,
		contentType: false,
		cache: false,
		processData: false,
 		url: "http://hivelet.com/rcm/test/api.php?action=UpdateLicense_permit", 
		success:function(response)
		{
 			// console.log(response);
			 if(response=='"success"')
			 {
				 closePupop();
 				 GetAllDocs();
				 SAlert("Record has been updated.");
			 	//window.location.href = "dashboard.php";
			 }
			 else{ Cloading();closePupop();}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			
			//DSAlert("Unable to proceed, please try again.","margin-top0px");
		$("#Lisupdate").fadeIn("slow");
		$("#Lisupdate").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i>Unable to proceed, please try again.");
		setTimeout(function(){ $("#Lisupdate").fadeOut("slow"); }, 4000);
   		}
 	});
	}
	else{
		Cloading();
		
		//DSAlert("Please fill-in all the mandatory fields.","margin-top0px");}
		$("#Lisupdate").fadeIn("slow");
		$("#Lisupdate").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i>Please fill-in all the mandatory fields.");
		setTimeout(function(){ $("#Lisupdate").fadeOut("slow"); }, 4000);
      }
}



function getAllLicense()
{   
loading();
  	$.ajax({
		type: "POST",  
		data:{admin:ADMIN},
  		url: "http://hivelet.com/rcm/test/api.php?action=getAllLicense", 
		success:function(response)
		{Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 document.getElementById("getAllLicense_permit").innerHTML ="";
				 for(var i=0;i<response.length;i++)
				 {
					    dateFormate(response[i]['IssuanceDate'],response[i]['ExpirationDate']);
						if(response[i]['restaurant_name']==null || response[i]['restaurant_name']==""){response[i]['restaurant_name']="-";}
					
					var empname = (response[i]['empname']==null ? "(Deleted Employee)" : response[i]['empname']);	
					 document.getElementById("getAllLicense_permit").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['license']+'</td>\
					<td align="center">'+empname+'</td>\
					<td align="center">'+response[i]['restaurant_name']+'</td>\
					<td align="center">'+finalJoiningDate+'</td>\
					<td align="center">'+finalJoiningDate2+'</td>\
				<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="emailPupop('+response[i]['id']+',\'License_permit\')">Email</span> | <span class="cursor" onClick="getLicense_permit('+response[i]['id']+')">View</span> | <span class="cursor" onClick="deleteBox('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 }
   			 }else{ InfoAlert("No records found.");document.getElementById("getAllLicense_permit").innerHTML="";}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}


function getAllPermit()
{   
loading();
  	$.ajax({
		type: "POST",  
		data:{admin:ADMIN},
  		url: "http://hivelet.com/rcm/test/api.php?action=getAllPermit", 
		success:function(response)
		{Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 document.getElementById("getAllLicense_permit").innerHTML ="";
				 for(var i=0;i<response.length;i++)
				 {
					    dateFormate(response[i]['IssuanceDate'],response[i]['ExpirationDate']);
						if(response[i]['restaurant_name']==null || response[i]['restaurant_name']==""){response[i]['restaurant_name']="-";}
					
					var empname = (response[i]['empname']==null ? "(Deleted Employee)" : response[i]['empname']);	
					 document.getElementById("getAllLicense_permit").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['license']+'</td>\
					<td align="center">'+empname+'</td>\
					<td align="center">'+response[i]['restaurant_name']+'</td>\
					<td align="center">'+finalJoiningDate+'</td>\
					<td align="center">'+finalJoiningDate2+'</td>\
				<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="emailPupop('+response[i]['id']+',\'License_permit\')">Email</span> | <span class="cursor" onClick="getLicense_permit('+response[i]['id']+')">View</span> | <span class="cursor" onClick="deleteBox('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 }
   			 }else{ InfoAlert("No records found.");document.getElementById("getAllLicense_permit").innerHTML="";}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}

 

function getLicense_permit(id)
{  
$("#LicensePOP").val("");
$("#CommentsPOP").val("");
$("#LPIDPOP").val("");
$("#EmployeeidPOP").val("");
$("#EmployeeSelectPOP").val("");
$("#HfilePOP").val("");
$("#Dlink").html("");





loading();
   	$.ajax({
		type: "POST",  
 		url: "http://hivelet.com/rcm/test/api.php?action=getLicense_permit", 
		data:{LPID:id},
		success:function(response)
		{	
		console.log(response);
		Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
 				 for(var i=0;i<response.length;i++)
				 {
				 	var empname = (response[i]['empname']==null ? "(Deleted Employee)" : response[i]['empname']);
					if(empname=="(Deleted Employee)")
					 {
						 $("#filePOP").attr("disabled", "disabled");
						 $("#upd").attr("disabled", "disabled");
						 $("#IssuanceDatePOP").attr("disabled", "disabled");
                         $("#ExpirationDatePOP").attr("disabled", "disabled");
						 $("#CommentsPOP").attr("disabled", "disabled");
						
						
						 }
					else
					  {
						$("#filePOP").removeAttr("disabled", "disabled");
						$("#upd").removeAttr("disabled", "disabled");
						$("#IssuanceDatePOP").removeAttr("disabled", "disabled");
						$("#ExpirationDatePOP").removeAttr("disabled", "disabled");
						$("#CommentsPOP").removeAttr("disabled", "disabled");
						}
					$("#EmployeeSelectPOP").val(empname);
 					$("#LPIDPOP").val(response[i]['id']);
					$("#LicensePOP").val(response[i]['license']);
					$("#CommentsPOP").val(response[i]['comments']);
					$("#IssuanceDatePOP").val(response[i]['IssuanceDate']);
					$("#ExpirationDatePOP").val(response[i]['ExpirationDate']);
					$("#HfilePOP").val(response[i]['lp_file_path']);
					$("#EmployeeidPOP").val(response[i]['employeeID']);
					
		if(response[i]['lp_file_path']!="")
		{		
  				$("#Dlink").html('<a class="btn btn-darkBrown text-left d-block" href="http://hivelet.com/rcm/test/'+response[i]['lp_file_path']+'" download>View Attachment<i class="fa fa-eye pull-right font-size22px" aria-hidden="true"></i></a>');  
		}
   					  openPupop(); 
					  issueExpDateMatchpop();
 				 }
  			 }else{  }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}


function deleteLicense_permit()
{   
	loading();
	$.ajax({
		type: "POST",
 		data:{LPID:DeleteID},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/api.php?action=deleteLicense_permit", 
		success:function(response)
		{  			 
			 if(response=='success')
			 {
 				  GetAllDocs();
				 closeDelPupop();
				 SAlert("Record has been deleted!");
			 }
			 else{ DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	}
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	
   		}
 	});
}




function Add_inspection()
{ 
	
	InspectorName       = $("#InspectorName").val();
	Inspection			= $("#Inspection").val();
	Employee1			= $("#EmployeeSelect").val();
	InspectionDate		= $("#InspectionDate").val();
	is_followUp			= $("#noYesSwitch").attr('aria-pressed');
	Comments			= $("#Comments").val();
	insploadFile 		= $("#file").val();
	

	followUp_date		= "";
	if(is_followUp=="true")
	{
		followUp_date = $("#switchDate").val();
 	}
 	
	var form_data = new FormData();
	form_data.append("file", document.getElementById('file').files[0]);
	var objArr = [];
 	objArr.push({"inspection":Inspection, "date_of_inspection": InspectionDate,"comments":Comments,"admin":ADMIN,"is_followUp":is_followUp,"followUp_date":followUp_date,"employeeID":Employee1,"InspectorName":InspectorName}); 
	form_data.append('objArr', JSON.stringify( objArr ));
	
 	if(InspectorName!="" && Inspection!="-Select-" && InspectionDate!="" && (is_followUp=="false" && followUp_date=="" || is_followUp=="true" && followUp_date!=""  && Employee1!="-Select-" ))
	{ 
 		loading();
	
  	$.ajax({
		type: "POST",  
 		data:form_data,
		contentType: false,
		cache: false,
		processData: false,
  		url: "http://hivelet.com/rcm/test/api.php?action=Add_inspection", 
		success:function(response)
		{
			
			//console.log(response);
  			 if(response=='"success"')
			 {
				  getAll_inspection();
 				 // console.log("success");
				  	 SAlert("Record has been added.");
					
					$("#InspectorName").val("");
					$("#Inspection").val("");
					$("#Comments").val("");
					$("#InspectionDate").val("");
					$("#switchDate").val("");
					$("#EmployeeSelect").val("-Select-");
					$("#Restaurantdropdwon").val(0);
					

					imgUploadRemove();
				  
			 } else{Cloading();}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
	}
	else{ DSAlert("Please fill-in all the mandatory fields.","margin-top0px");Cloading();}
}


function getAll_inspection()
{   
loading();
 
 	$.ajax({
		type: "POST",  
		data:{admin:ADMIN},
 		url: "http://hivelet.com/rcm/test/api.php?action=getAll_inspection", 
		success:function(response)
		{Cloading();
  			 if(response!='"No Records"')
			 {
				 //console.log(response);
				 response=JSON.parse(response);
				 document.getElementById("ListInspections").innerHTML ="";
				 for(var i=0;i<response.length;i++)
				 {

					var empname = (response[i]['empname']==null ? "(Deleted Employee)" : response[i]['empname']);
					 gatDateInspection=response[i]['date_of_inspection']
					 dateFormate(gatDateInspection);
					 
					 document.getElementById("ListInspections").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['inspection']+'</td>\
					<td align="center">'+empname+'</td>\
					<td align="center">'+response[i]['restaurant_name']+'</td>\
					<td align="center">'+finalJoiningDate+'</td>\
				<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="emailPupop('+response[i]['id']+',\'inspection\')">Email</span> | <span class="cursor" onClick="get_inspection('+response[i]['id']+')">View</span> | <span   class="cursor" onClick="deleteBox('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 }
   			 }else{ InfoAlert("No records found.");Cloading();document.getElementById("ListInspections").innerHTML="";}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}	 
 

function delete_inspection()
{   
	loading();
	$.ajax({
		type: "POST",
 		data:{inspID:DeleteID},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/api.php?action=delete_inspection", 
		success:function(response)
		{  			 
			 if(response=='success')
			 {
 				 getAll_inspection();
				 closeDelPupop();
				 SAlert("Record has been deleted!");
			 }
			 else{ DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	}
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	
   		}
 	});
}




function get_inspection(id)
{ 

$("#InspectionamePOP").val("");
$("#InspectionIDPOP").val("");
$("#InspectionPOP").val("");
$("#CommentsPOP").val("");
$("#InspectionDatePOP").val("");
$("#EmployeeSelectPOP").val("");
$("#switchAfterDatepop2").val("");
$("#Dlink").html("");

$("#noYesSwitchpop").attr('aria-pressed','false');
 loading();
   	$.ajax({
		type: "POST",  
 		url: "http://hivelet.com/rcm/test/api.php?action=get_inspection", 
		data:{inspID:id},
		success:function(response)
		{	
		//console.log(response);
		Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
 				 for(var i=0;i<response.length;i++) 
				 {
				 	var empname = (response[i]['empname']==null ? "(Deleted Employee)" : response[i]['empname']);
					$("#InspectionIDPOP").val(response[i]['id']);
					$("#InspectionPOP").val(response[i]['inspection']);
					$("#CommentsPOP").val(response[i]['comments']);
					$("#InspectionDatePOP").val(response[i]['date_of_inspection']);
					$("#InspectionamePOP").val(response[i]['InspectorName']);
					$("#EmployeeSelectPOP").val(empname);
					
					//console.log(response[i]['followUp_date']);
					if(response[i]['is_followUp']=='true')
					{
 						$("#noYesSwitchpop").attr('aria-pressed',''+response[i]['is_followUp']+'');
  						$("#noYesSwitchpop").addClass("active");
  						$("#switchAfterDatepop").val(''+response[i]['followUp_date']+'');
						$("#switchAfterDatepop").removeAttr('disabled');
					}
					else
					{
 						$("#noYesSwitchpop").attr('aria-pressed',''+response[i]['is_followUp']+'');
						$("#switchAfterDatepop").val("");
						$("#noYesSwitchpop").removeClass("active");
						$("#switchAfterDatepop").attr('disabled','disabled');
					} 					
					 
 if(response[i]['insp_file_path']!="")
 {
	$("#Dlink").html('<a class="btn btn-darkBrown text-left d-block" href="http://hivelet.com/rcm/test/'+response[i]['insp_file_path']+'" download>View Attachment<i class="fa fa-eye pull-right font-size22px" aria-hidden="true"></i></a>');  
}
   					  openPupop(); 
 				 }
  			 }else{  }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}



function Update_inspection()
{ 

 	InspectionIDPOP			= $("#InspectionIDPOP").val();
	InspectionPOP			= $("#InspectionPOP").val();
	CommentsPOP				= $("#CommentsPOP").val();
	InspectionDatePOP		= $("#InspectionDatePOP").val();
	
	is_followUp				= $("#noYesSwitchpop").attr('aria-pressed');
	followUp_date			= "";
	if(is_followUp=="true" && $("#switchAfterDatepop").val()!="")
	{
		followUp_date = $("#switchAfterDatepop").val();
 	} 
	else
	{
		followUp_date = "";
		is_followUp="false"
 	} 
	
 	loading();
 	var form_data = new FormData();
	form_data.append("Ufile", document.getElementById('filePOP').files[0]);
	var data = [];
 	
	data.push({"inspID":InspectionIDPOP, "inspection":InspectionPOP, "date_of_inspection":InspectionDatePOP,"comments":CommentsPOP,"is_followUp":is_followUp,"followUp_date":followUp_date});
	form_data.append('data', JSON.stringify(data));
 
 	
	
	if(InspectionDatePOP!="")
	{
	
	
	$.ajax({
		type: "POST",
 		data:form_data,
		contentType: false,
		cache: false,
		processData: false,
 		url: "http://hivelet.com/rcm/test/api.php?action=Update_inspection", 
 		success:function(response)
		{
 			 //console.log(response);
			 if(response=='"success"')
			 {
				 closePupop();
 				 getAll_inspection();
				 SAlert("Record has been updated.");
			 	//window.location.href = "dashboard.php";
			 }
			 else{ Cloading();}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			//DSAlert("Unable to proceed, please try again.","margin-top0px");
		$("#updinspect").fadeIn("slow");
		$("#updinspect").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i>Unable to proceed, please try again.");
		setTimeout(function(){ $("#updinspect").fadeOut("slow"); }, 4000);
   		}
 	});
	
	}
	else{
		
		Cloading();
		//DSAlert("Please fill-in all the mandatory fields.","margin-top0px");
		$("#updinspect").fadeIn("slow");
		$("#updinspect").html("<i class='fa fa-exclamation-circle font-size22px pull-left'></i>Please fill-in all the mandatory fields.");
		setTimeout(function(){ $("#updinspect").fadeOut("slow"); }, 4000);
		
		}
	
}


 
var NotifyTbl="";
var LP30Arr=[],LP60Arr=[],LP90Arr=[],LPPastArr=[];
var C30Arr=[],C60Arr=[],C90Arr=[],CPastArr=[];
var IN30Arr=[],IN60Arr=[],IN90Arr=[],INPastArr=[];



function notifications()
{
	var tbl="";
 	for(var i=0;i<LP30Arr.length	;i++)
	 {
	var empname = (LP30Arr[i]['empname']==null ? "(Deleted Employee)" : LP30Arr[i]['empname']);
		  
		  dateFormate(LP30Arr[i]['ExpirationDate']);
		tbl +="<li class='list-group-item list-group-item-success'>\
			"+empname+"'s "+LP30Arr[i]['license']+" is expiring on "+finalJoiningDate+" \
		</li>";
	 }	

	for(var i=0;i<C30Arr.length;i++)
	 {
	var empname = (C30Arr[i]['empname']==null ? "(Deleted Employee)" : C30Arr[i]['empname']);
 		  dateFormate(C30Arr[i]['exp_date']);
		tbl +="<li class='list-group-item list-group-item-info'>\
			"+empname+"'s "+C30Arr[i]['certification']+" is expiring on "+finalJoiningDate+" \
		</li>";
	 }
	 
	 tbl+=' <div class="col-md-12 col-md-offset-3"><a href="notifications.php" class="button button-mini  button-rounded">View All</a></div>';

 var count = LP30Arr.length + LP60Arr.length + LP90Arr.length + LPPastArr.length + C30Arr.length + C60Arr.length + C90Arr.length + CPastArr.length+ IN30Arr.length + IN60Arr.length + IN90Arr.length + INPastArr.length;


	$(".notifyUl").html("");
	$(".notifyUl").html(tbl);
	$(".notify").html("Notification<span>"+count+"</span>");
	notificationscreen();
	
}
function notificationscreen()
{
 	var tbl="";  


	 for(var i=0;i<LPPastArr.length;i++)
	 {
	var empname = (LPPastArr[i]['empname']==null ? "(Deleted Employee)" : LPPastArr[i]['empname']);
 		 dateFormate(LPPastArr[i]['ExpirationDate']);
 		 tbl +="<a href='#' class='list-group-item list-group-item-danger'>"+empname+"'s "+LPPastArr[i]['license']+" is expiring on "+finalJoiningDate+"</a>";
	 } 
	 	 
	 for(var i=0;i<CPastArr.length;i++)
	 {
 		  var empname = (CPastArr[i]['empname']==null ? "(Deleted Employee)" : CPastArr[i]['empname']);
 		 dateFormate(CPastArr[i]['exp_date']); 

 tbl +="<a href='#' class='list-group-item list-group-item-danger'>"+empname+"'s "+CPastArr[i]['certification']+" is expiring on "+finalJoiningDate+"</a>";
	 }	
	 	 
	 for(var i=0;i<INPastArr.length;i++)
	 {
	var empname = (INPastArr[i]['empname']==null ? "(Deleted Employee)" : INPastArr[i]['empname']);

 		   dateFormate(INPastArr[i]['followUp_date']);
  tbl +="<a href='#' class='list-group-item list-group-item-danger'>"+empname+"'s "+INPastArr[i]['inspection']+" is expiring on "+finalJoiningDate+"</a>";
	 }	
 	 
	 for(var i=0;i<LP30Arr.length;i++)
	 {
	var empname = (LP30Arr[i]['empname']==null ? "(Deleted Employee)" : LP30Arr[i]['empname']);
		  dateFormate(LP30Arr[i]['ExpirationDate']); 
  tbl +="<a href='#' class='list-group-item list-group-item-success'>"+empname+"'s "+LP30Arr[i]['license']+" is expiring on "+finalJoiningDate+"</a>";
	 }	
	 
	 for(var i=0;i<C30Arr.length;i++)
	 {
 		  dateFormate(C30Arr[i]['exp_date']);
		  var empname = (C30Arr[i]['empname']==null ? "(Deleted Employee)" : C30Arr[i]['empname']); 
  tbl +="<a href='#' class='list-group-item list-group-item-success'>"+empname+"'s "+C30Arr[i]['certification']+" is expiring on "+finalJoiningDate+"</a>";
	 }	
 
 	 for(var i=0;i<IN30Arr.length;i++)
	 {
		  var empname = (IN30Arr[i]['empname']==null ? "(Deleted Employee)" : IN30Arr[i]['empname']);
		  dateFormate(IN30Arr[i]['followUp_date']); 
  tbl +="<a href='#' class='list-group-item list-group-item-success'>"+empname+"'s "+IN30Arr[i]['inspection']+" is expiring on "+finalJoiningDate+"</a>";
	 }	
	 
	 
	 for(var i=0;i<LP60Arr.length;i++)
	 {
		  var empname = (LP60Arr[i]['empname']==null ? "(Deleted Employee)" : LP60Arr[i]['empname']);
		  dateFormate(LP60Arr[i]['ExpirationDate']); 
  tbl +="<a href='#' class='list-group-item list-group-item-warning'>"+empname+"'s "+LP60Arr[i]['license']+" is expiring on "+finalJoiningDate+"</a>";
	 }
	 
	 for(var i=0;i<C60Arr.length;i++)
	 {
 		  dateFormate(C60Arr[i]['exp_date']);
		  var empname = (C60Arr[i]['empname']==null ? "(Deleted Employee)" : C60Arr[i]['empname']); 
  tbl +="<a href='#' class='list-group-item list-group-item-warning'>"+empname+"'s "+C60Arr[i]['certification']+" is expiring on "+finalJoiningDate+"</a>";
	 }
	 
	 for(var i=0;i<IN60Arr.length;i++)
	 {
		  var empname = (IN60Arr[i]['empname']==null ? "(Deleted Employee)" : IN60Arr[i]['empname']);
		  dateFormate(IN60Arr[i]['followUp_date']); 
  tbl +="<a href='#' class='list-group-item list-group-item-warning'>"+empname+"'s "+IN60Arr[i]['inspection']+" is expiring on "+finalJoiningDate+"</a>";
	 }
	 
	 
	 for(var i=0;i<LP90Arr.length;i++)
	 {
		  var empname = (LP90Arr[i]['empname']==null ? "(Deleted Employee)" : LP90Arr[i]['empname']);
		  dateFormate(LP90Arr[i]['ExpirationDate']); 
  tbl +="<a href='#' class='list-group-item list-group-item-info'>"+empname+"'s "+LP90Arr[i]['license']+" is expiring on "+finalJoiningDate+"</a>";
	 }
 	 
	 for(var i=0;i<C90Arr.length;i++)
	 {
 		  dateFormate(C90Arr[i]['exp_date']);
		 var empname = (C90Arr[i]['empname']==null ? "(Deleted Employee)" : C90Arr[i]['empname']); 
  tbl +="<a href='#' class='list-group-item list-group-item-info'>"+empname+"'s "+C90Arr[i]['certification']+" is expiring on "+finalJoiningDate+"</a>";
	 }
	 
	 
	 for(var i=0;i<IN90Arr.length;i++)
	 {
		 var empname = (IN90Arr[i]['empname']==null ? "(Deleted Employee)" : IN90Arr[i]['empname']);
		  dateFormate(IN90Arr[i]['followUp_date']); 
  tbl +="<a href='#' class='list-group-item list-group-item-info'>"+empname+"'s "+IN90Arr[i]['inspection']+" is expiring on "+finalJoiningDate+"</a>";
IN90Arr	 }
	  
	$(".notificationList").html(tbl);
 
 }

function DashboardTxt()
{
	var LP30 	= Number($("#LP30").html());	
	var LP60 	= Number($("#LP60").html());	
	var LP90 	= Number($("#LP90").html());	
	var LPPast  = Number($("#LPPast").html());	
	var C30 	= Number($("#C30").html());	
	var C60 	= Number($("#C60").html());	
	var C90 	= Number($("#C90").html());	
	var CPast30 = Number($("#CPast30").html());	
	
	if(LP30>1){$("#LP30txt").html("Permits/Licenses Are Due For Renewal")}
		else{$("#LP30txt").html("Permit/License is Due For Renewal")}
	if(LP60>1){$("#LP60txt").html("Permits/Licenses Are Due For Renewal")}
		else{$("#LP60txt").html("Permit/License is Due For Renewal")}
 	if(LP90>1){$("#LP90txt").html("Permits/Licenses Are Due For Renewal")}
		else{$("#LP90txt").html("Permit/License is Due For Renewal")}
		
	if(LPPast>1){$("#LPPasttxt").html("Permits/Licenses Have Passed their Renewal Dates")}
		else{$("#LPPasttxt").html("Permit/License Has Passed Its Renewal Date")}

	if(C30>1){$("#C30txt").html("Certificates Are Due For <br>Renewal")}
		else{$("#C30txt").html("Certificate is Due For <br>Renewal")}
	if(C60>1){$("#C60txt").html("Certificates Are Due For <br>Renewal")}
		else{$("#C60txt").html("Certificate is Due For <br>Renewal")}
 	if(C90>1){$("#C90txt").html("Certificates Are Due For <br>Renewal")}
		else{$("#C90txt").html("Certificate is Due For <br>Renewal")}
		
	if(CPast30>1){$("#CPast30txt").html("Certificates Have Passed their Renewal Dates")}
		else{$("#CPast30txt").html("Certificate Has Passed Its Renewal Date")}
		
		

}


var GetDate=""; 
function todayDate()
{  
	$.ajax({
		type:"POST",  
 		url: "api.php?action=todayDate", 
		success:function(response)
		{ 
			GetDate = response;
			CountPasDue=0,Count30Days=0,Count60Days=0,Count90Days=0;
			//console.log(GetDate)
			 D_certification();
			 D_license_permit();			 
			 D_inpection();
			 SetcountDocs();
		},
		error: function (xhr, status) 
		{  
   		}
 	});
}
 
 var CountPasDue=0,Count30Days=0,Count60Days=0,Count90Days=0;

function SetcountDocs()
{
	$("#CountPasDue").html(CountPasDue);
	$("#Count30Days").html(Count30Days);
	$("#Count60Days").html(Count60Days);
	$("#Count90Days").html(Count90Days);


		notifications();
}

function D_license_permit()
{   
var LP30=0,LP60=0,LP90=0,LPPast=0;
  var today = new Date(GetDate);
  
 loading();
  	$.ajax({
		type: "POST", 
		data:{admin:ADMIN}, 
 		url: "api.php?action=D_license_permit", 
		success:function(response)
		{
			 Cloading();
   			 if(response!='"No Records"')
			 {
				 //console.log(response);
				 response=JSON.parse(response);
				 var notify="";
				 for(var i=0;i<response.length;i++)
				 { 
 						var expiryDate= response[i]['ExpirationDate'];
						expiryDate = new Date(expiryDate.substr(0, 4),month=(expiryDate.substr(5, 2))-1,expiryDate.substr(8, 3));
						if(today<expiryDate)
						{
							var DateDifference = Math.floor((expiryDate - today) / (1000*60*60*24));
							//console.log("remaining"+DateDifference+" /"+response[i]['ExpirationDate']);
							if(DateDifference>=0 && DateDifference<31)
							{
								Count30Days = ++Count30Days;
								//$("#Count30Days").html(++Count30Days);
								LP30Arr.push(response[i]);
							}
							if(DateDifference>30 && DateDifference<61)
							{
								//$("#Count60Days").html(++Count60Days);
								Count60Days = ++Count60Days;
								LP60Arr.push(response[i]);
							}
							if(DateDifference>60 && DateDifference<91)
							{
								//$("#Count90Days").html(++Count90Days);
								Count90Days = ++Count90Days;
								LP90Arr.push(response[i]);
							}
						}
						else
						{
							var DateDifference = Math.floor((today - expiryDate) / (1000*60*60*24));
 							//$("#CountPasDue").html(++CountPasDue);
 							CountPasDue = ++CountPasDue;
							LPPastArr.push(response[i]);
						}
				 }
				// DashboardTxt();
				 //notifications();
				SetcountDocs();
   			 } 
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}	 



function D_certification()
{   
var C30=0,C60=0,C90=0,CPast30=0;
   var today = new Date(GetDate);
 loading();
  	$.ajax({
		type: "POST",  
		data:{admin:ADMIN},
 		url: "api.php?action=D_certification", 
		success:function(response)
		{ 
		Cloading();
   			 if(response!='"No Records"')
			 {
				 //console.log(response);
				 response=JSON.parse(response);
				 Cloading();
				 for(var i=0;i<response.length;i++)
				 { 
 						var expiryDate= response[i]['exp_date'];
						expiryDate = new Date(expiryDate.substr(0, 4),month=(expiryDate.substr(5, 2))-1,expiryDate.substr(8, 3));
						if(today<expiryDate)
						{
							var DateDifference = Math.floor((expiryDate - today) / (1000*60*60*24));
 							if(DateDifference>=0 && DateDifference<31)
							{
								//$("#Count30Days").html(++Count30Days);
								Count30Days = ++Count30Days;
								C30Arr.push(response[i]); 
							}
							if(DateDifference>30 && DateDifference<61)
							{
								//$("#Count60Days").html(++Count60Days);
								C60Arr.push(response[i]);
								Count60Days = ++Count60Days;

							}
							if(DateDifference>60 && DateDifference<91)
							{
							//	$("#Count90Days").html(++Count90Days);
								C90Arr.push(response[i]);
								Count90Days = ++Count90Days;
							}
						}
						else
						{
							var DateDifference = Math.floor((today - expiryDate) / (1000*60*60*24));
 							//$("#CountPasDue").html(++CountPasDue);
 							CountPasDue = ++CountPasDue;
							CPastArr.push(response[i]);
						}
						
				 }
				 //DashboardTxt();
				// notifications();
				SetcountDocs();
   			 } 
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}	 

//var IN30Arr=[],IN60Arr=[],IN90Arr=[],INPastArr=[];
function D_inpection()
{   
var IN30=0,IN60=0,IN90=0,INPast30=0;
   var today = new Date(GetDate);
 //loading();
  	$.ajax({
		type: "POST",  
		data:{admin:ADMIN},
 		url: "api.php?action=D_inpection", 
		success:function(response)
		{ 
 		//Cloading();
   			 if(response!='"No Records"')
			 {
				 response=JSON.parse(response);
				 //console.log(response);
				  Cloading();
				 for(var i=0;i<response.length;i++)
				 { 
 						var expiryDate= response[i]['followUp_date'];
						expiryDate = new Date(expiryDate.substr(0, 4),month=(expiryDate.substr(5, 2))-1,expiryDate.substr(8, 3));
						if(today<expiryDate)
						{
							var DateDifference = Math.floor((expiryDate - today) / (1000*60*60*24));
 							if(DateDifference>=0 && DateDifference<31)
							{
 								IN30Arr.push(response[i]); 
							}
							if(DateDifference>30 && DateDifference<61)
							{
 								IN60Arr.push(response[i]);
							}
							if(DateDifference>60 && DateDifference<91)
							{
 								IN90Arr.push(response[i]);
							}
						}
						else
						{
							var DateDifference = Math.floor((today - expiryDate) / (1000*60*60*24));
 							INPastArr.push(response[i]);
						}
 				 }
				 //DashboardTxt();
				// notifications();
				SetcountDocs();
   			 } 
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}	 


function getProfile()
{   
loading();
$("#firstName").val($.cookie("fname"));
$("#lastName").val($.cookie("lname"));
$("#email").val($.cookie("email"));
		
 	$.ajax({
		type: "POST",  
		data:{admin:ADMIN},
 		url: "http://hivelet.com/rcm/test/api.php?action=getProfile", 
		success:function(response)
		{
			Cloading();
   			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
 				 for(var i=0;i<response.length;i++)
				 { 
  					$.cookie("fname", response[0]['fname']);
 					$.cookie("lname", response[0]['lname']);
					$.cookie("email", response[0]['email']);
 				 }
   			 }
			 else{ InfoAlert("No records found.");Cloading();}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}	 
 

function UpdateProfile()
{   
 	firstName	=	$("#firstName").val();
	lastName	=	$("#lastName").val();
	email		=	$("#email").val();
	if(firstName!="" && lastName!="" && email!="" && validateEmail(email)!=false)
	{
		loading(); 	
		$.ajax({
			type: "POST",  
			data:{admin:ADMIN,firstName:firstName,lastName:lastName,email:email},
			url: "http://hivelet.com/rcm/test/api.php?action=UpdateProfile", 
			success:function(response)
			{
				Cloading();
				 if(response=='"success"')
				 {
					 SAlert("Profile has been updated.");
					 
						$.cookie("fname", $("#firstName").val());
						$.cookie("lname", $("#lastName").val());
						$.cookie("email", $("#email").val());
				 username();
				 }
			}, 
			error: function (xhr, status) 
			{  Cloading();
				DSAlert("Unable to proceed, please try again.","margin-top0px");
			}
		});
	}
	else{DSAlert("Please fill-in all the mandatory fields.","margin-top0px");Cloading();}
}	 
 


function UpdatePassword()
{ 


   
   	oldPass		=	$("#oldPass").val();
	newPass		=	$("#newPass").val();
	confirmPass =	$("#confirmPass").val();
	
	if(oldPass!="" && newPass!="" && confirmPass!="" && newPass==confirmPass && checkPassword(newPass)==true)
	{
		loading(); 	
		$.ajax({
			type: "POST",  
			data:{admin:ADMIN,newPass:newPass,oldPass:oldPass},

			url: "http://hivelet.com/rcm/test/api.php?action=UpdatePassword", 
			success:function(response)
			{
				Cloading();
				 if(response=='"success"')
				 {
					SAlert("Password has been updated.");
					$("#oldPass").val("");
					$("#newPass").val("");
					$("#confirmPass").val("");
					}
				 else
				 {
					 DSAlert("Password has not been updated.","margin-top0px");
				 }
			}, 
			error: function (xhr, status) 
			{  Cloading();
				DSAlert("Unable to proceed, please try again.","margin-top0px");
			}
		});
	}
	else{
		
		if(oldPass=="" || newPass=="" || confirmPass==""){
		  DSAlert("Please fill-in all the mandatory fields.","margin-top0px");
		  Cloading();
		}
		
		if(newPass!=confirmPass){
		  DSAlert("Password does not match.","margin-top0px");
		  Cloading();
		}
		
		if(checkPassword(newPass)!=true && newPass!=""){
			DSAlert("Password must be of minimum 8 characters containing a capital letter, a digit and a special character.","margin-top0px");
		    Cloading();
			}
		
		
		
		
		}
}	

 


function AddNotifyEmail()
{   
 	NotifyEmail1	=	$("#NotifyEmail").val(); 
 	fname2	=	$("#fname").val(); 
 	lname2	=	$("#lname").val(); 
	if(NotifyEmail1!="" && validateEmail(NotifyEmail1)!=false)
	{
		loading(); 	
		$.ajax({
			type: "POST", 
			data:{admin:ADMIN,email:NotifyEmail1,fname:fname2,lname:lname2},
			url: "http://hivelet.com/rcm/test/api.php?action=AddNotifyEmail", 
			success:function(response)
			{
					
				$("#NotifyEmail").val(""); 
				$("#fname").val(""); 
				$("#lname").val("");
  				if(response=='"success"')
				 {
					 closePupop();
					SAlert("Record has been added.");
					GetNotifyEmail(); 
				 }
				 else if(response=='"Exist"')
				 {
					closePupop();
					DSAlert("Email already exist.");
					Cloading();
 				 }
				 else
				 {
					 Cloading();
				 }
			}, 
			error: function (xhr, status) 
			{  Cloading();
				DSAlert("Unable to proceed, please try again.","margin-top0px");
			}
		});
	}
	else{DSAlert("Please fill-in all the mandatory fields.","margin-top0px");Cloading();}
}	 
 


function GetNotifyEmail()
{  
loading();
 	$.ajax({
		type: "POST", 
		data:{admin:ADMIN},
 		url: "http://hivelet.com/rcm/test/api.php?action=GetNotifyEmail", 
		success:function(response)
		{
			//console.log(response);
			Cloading();
  			 if(response!='"No Records"')
			 {
				 document.getElementById("AllNotifyEmail").innerHTML ="";
				 response=JSON.parse(response);
				 for(var i=0;i<response.length;i++)
				 { 
  					 document.getElementById("AllNotifyEmail").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['fname']+'</td>\
					<td align="center">'+response[i]['lname']+'</td>\
					<td align="center">'+response[i]['email']+'</td>\
					<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="deleteBox('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 } 				 
  			 }else{ //InfoAlert("No records found.");
			 document.getElementById("AllNotifyEmail").innerHTML="";}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			 
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}


function DeleteNotifyEmail()
{  
loading();
	$.ajax({
		type: "POST",
 		data:{DeleteID:DeleteID},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/api.php?action=DeleteNotifyEmail", 
		success:function(response)
		{
  			 if(response=='success')
			 {
 				 GetNotifyEmail();
 				 SAlert("Record has been deleted!");
				  closeDelPupop();
 			 }
			 else{ DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	}
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	
   		}
 	});
}


function SendEmail()
{  
//emaiTo emaiCC emaiBC Fromemail2
var emaiTo = $("#emaiTo").val(); 
var emaiCC = $("#emaiCC").val();
var emaiBC = $("#emaiBC").val(); 

name = $.cookie('fname');
Fromemail = $.cookie('email');


if(emaiTo!="" && validateEmail(emaiTo)==true){

  if(emaiCC!=""  && validateEmail(emaiCC)==false)
  {
	 $("#emailError").fadeIn("slow");
	 $("#emailError").html("<i class='fa fa-exclamation-circle font-size22px  pull-left'></i>Please enter a valid email cc address.");
	 setTimeout(function(){ $("#emailError").fadeOut("slow"); }, 4000);
	 Cloading(); 
	 return;
	  
  }
  if(emaiBC!=""  && validateEmail(emaiBC)==false)
  {
	 $("#emailError").fadeIn("slow");
	 $("#emailError").html("<i class='fa fa-exclamation-circle font-size22px  pull-left'></i>Please enter a valid email bcc address.");
	 setTimeout(function(){ $("#emailError").fadeOut("slow"); }, 4000);
	 Cloading(); 
	  return;
	  
  }




loading(); 
	$.ajax({
		type: "POST",
 		data:{emailID:emailID,doc:docType,admin:name,emaiTo2:emaiTo,emaiCC2:emaiCC,emaiBC2:emaiBC,Fromemail2:Fromemail},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/email/sendEmail.php?action=emailID", 
		success:function(response)
		{
			
  			 if(response=='success')
			 {
 				  SAlert("Email sent successfully!");
				  closePupop();
				  Cloading();
				  $("#emaiTo").val("");	
				  $("#emaiCC").val("");	
				  $("#emaiBC").val("");	
				  
 			 }
			 else{ 
			   
					$("#emailError").fadeIn("slow");
					$("#emailError").html("<i class='fa fa-exclamation-circle font-size22px  pull-left'></i>Please enter a valid email address.");
					setTimeout(function(){ $("#emailError").fadeOut("slow"); }, 4000);
					Cloading();
				}
   		}, 
		error: function (xhr, status) 
		{  
					$("#emailError").fadeIn("slow");
					$("#emailError").html("<i class='fa fa-exclamation-circle font-size22px  pull-left'></i>Please enter a valid email address.");
					setTimeout(function(){ $("#emailError").fadeOut("slow"); }, 4000);
					Cloading();	
		}
 	});
	
}

else {
	  
	$("#emailError").fadeIn("slow");
    $("#emailError").html("<i class='fa fa-exclamation-circle font-size22px  pull-left'></i>Please enter a valid email address.");
	setTimeout(function(){ $("#emailError").fadeOut("slow"); }, 4000);
	Cloading();	
	
	}//main else 
	
	
	
}




function AddVendor()
{   
 	FirstName	=	$("#FirstName").val();  
 	/*LastName	=	$("#LastName").val(); */ 
 	EmailAddress=	$("#EmailAddress").val();  
 	PhoneNumber	=	$("#PhoneNumber").val();  
 	CompanyName	=	$("#CompanyName").val();  
 	Expertise	=	$("#Expertise").val();  
 
 	if(FirstName!=""  && EmailAddress!="" && PhoneNumber!="" &&  Expertise!="" && CompanyName!="" && validateEmail(EmailAddress)!=false)
	{
		loading(); 	
		$.ajax({
			type: "POST", 
			data:{admin:ADMIN,FirstName:FirstName,EmailAddress:EmailAddress,PhoneNumber:PhoneNumber,CompanyName:CompanyName,Expertise:Expertise},
			url: "http://hivelet.com/rcm/test/api.php?action=AddVendor", 
			success:function(response)
			{
    			if(response=='"success"')
				{
 				 	GetAllVendor();
 					SAlert("Record has been added.");
					$("#FirstName").val("");  
					$("#EmailAddress").val("");  
					$("#PhoneNumber").val("");  
					$("#CompanyName").val("");  
					$("#Expertise").val(""); 

				 } 
				 else
				 {
					 Cloading();
				 }
			}, 
			error: function (xhr, status) 
			{  Cloading();
				DSAlert("Unable to proceed, please try again.","margin-top0px");
			}
		});
	}
	else{ 
	   
	   if(!validateEmail(EmailAddress) && EmailAddress!="" ){DSAlert("Please enter a valid email address.","margin-top0px");Cloading();}
	   else{DSAlert("Please fill-in all the mandatory fields.","margin-top0px");Cloading();}
	
	}
}	 
 




function GetAllVendor()
{  
loading();
 	$.ajax({
		type: "POST", 
		data:{admin:ADMIN},
 		url: "http://hivelet.com/rcm/test/api.php?action=GetAllVendor", 
		success:function(response)
		{
			//console.log(response);
			Cloading();

  			 if(response!='"No Records"')
			 {
				 document.getElementById("AllVendorsData").innerHTML ="";
				 response=JSON.parse(response);
				 for(var i=0;i<response.length;i++)
				 { 
  					document.getElementById("AllVendorsData").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['FirstName']+'</td>\
 					<td align="center">'+response[i]['EmailAddress']+'</td>\
					<td align="center">'+response[i]['PhoneNumber']+'</td>\
					<td align="center">'+response[i]['CompanyName']+'</td>\
					<td align="center">'+response[i]['Expertise']+'</td>\
					<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="deleteBox('+response[i]['id']+')">Delete</span></td>\</tr>';
				 } 				 
  			 }
  			 else{ InfoAlert("No records found.");
			 document.getElementById("AllVendorsData").innerHTML="";
			}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			 
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}






function DeleteVendor()
{  
loading();
	$.ajax({
		type: "POST",
 		data:{DeleteID:DeleteID},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/api.php?action=DeleteVendor", 
		success:function(response)
		{
  			 if(response=='success')
			 {
 				 GetAllVendor();
 				 SAlert("Record has been deleted!");
				 closeDelPupop();
 			 }
			 else{ DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	}
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	
   		}
 	});
}



function AddTask()
{  

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today =  mm+ '/' + dd + '/' + yyyy;
 
 	DateOfTask = today;  
 	TaskType = $("#TaskType").val();  
 	TaskPriority = "High";   
 	if(TaskType!="" && TaskPriority!="") {
		//loading(); 	
		$.ajax({
			type: "POST", 
			data:{admin:ADMIN,DateOfTask:DateOfTask,TaskType:TaskType,TaskPriority:TaskPriority},
			url: "api.php?action=AddTask", 
			success:function(response)
			{
     			if(response=='"success"')
				{
 				 	GetAlltask();
 					SAlert("Record has been added.");
 					$("#TaskType").val("");  
  				 } 
				 else
				 {
					 Cloading();
				 }
			}, 
			error: function (xhr, status) 
			{  Cloading();
				DSAlert("Unable to proceed, please try again.","margin-top0px");
			}
		});
	}
	else{DSAlert("Please fill-in all the mandatory fields.","margin-top0px");Cloading();}
}	 
function DatatableInit2()
{
 	$('#myTable').DataTable({  
	"ordering": false,
	"paging": false,
	"searching": false,
	   "bInfo" : false,
 		dom: 'lBfrtip',
 		buttons: [
        {
            extend: 'csvHtml5',
             exportOptions: {
               columns: [ 0, 1,2,3,4]
            }
        }
    ]
	});
	
  	$(".buttons-csv").addClass("btn btn-darkBrown col-2 pull-right");
 	$(".buttons-csv").html("<span>EXPORT IN EXCEL</span>");

} 

function GetAlltask()
{  
	var tbl ="";
 	//loading();
 	$.ajax({
		type: "POST", 
		data:{admin:ADMIN},

 		url: "api.php?action=GetAlltask", 
		success:function(response)
		{
    response = JSON.parse(response);
			console.log(response);
			if(response!='"No Records"')
			 {
			 	 for(var i=0;i<response.length;i++)
				 {

			 	tbl +='<div href="#" class="list-group-item list-group-item" style="border-bottom: 2px solid #ddd 		\		!important;border:none" >\
					'+response[i]['tasktype']+ '\
					<a href="#" class="button button-3d button-mini button-rounded button-red pull-right" style="margin:0px;">\
					<i class="icon-remove ml-0"></i></a>\
					</div>';
				}
 			 } 
			 $('.todoList').html(tbl)
    		}, 
		error: function (xhr, status) 
		{  Cloading();
			 
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}

var TaskID;
function gettask(id)
{
   TaskID=id;
   loading();
	$("#TaskNamePOP").val("");
	
   	$.ajax({
		type: "POST",  
 		url: "http://hivelet.com/rcm/test/api.php?action=GetTask", 
		data:{TaskID:TaskID},
		success:function(response)
		{
			console.log(response)
			Cloading();
			
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 console.log(response);
				 for(var i=0;i<response.length;i++)
				 {
						$("#TaskNamePOP").val(response[i]['tasktype']);
						$("#TaskPriorityPop").val(response[i]['taskpriority']); 
						$("#TaskStatusPop").val(response[i]['Status']); 
						
					 finishBox();
 				 }
  			 }else{  InfoAlert("No records found."); }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");

   		}
 	});
	
}




function deletTask()
{  
loading();
	$.ajax({
		type: "POST",
 		data:{DeleteID:DeleteID},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/api.php?action=deletTask", 
		success:function(response)
		{
  			 if(response=='success')
			 {
 				 GetAlltask();
 				 SAlert("Record has been deleted!");
				  closeDelPupop();
 			 }
			 else{ DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	}
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.","margin-top0px");closeDelPupop();Cloading();	
   		}
 	});
}


function updatetask()
{
	
	var todayComplete = new Date();
	var dd = todayComplete.getDate();
	var mm = todayComplete.getMonth()+1; 
	var yyyy = todayComplete.getFullYear();
	
	if(dd<10) {
	dd = '0'+dd
	} 
	
	if(mm<10) {
	mm = '0'+mm
	} 
	
	todayComplete = mm + '/' + dd + '/' + yyyy;
	

   TaskNamePOP = $("#TaskNamePOP").val();
   TaskPriorityPop = $("#TaskPriorityPop").val();
   TaskStatusPop = $("#TaskStatusPop").val();
   TaskCompletion = todayComplete;
   
    if(TaskStatusPop!="Complete"){TaskCompletion="";}
	
	if(TaskNamePOP!=""){
	
	
	  loading(); 
		$.ajax({
		type: "POST",
 		data:{TaskID:TaskID,TaskNamePOP:TaskNamePOP,TaskPriorityPop:TaskPriorityPop,TaskStatusPop:TaskStatusPop,TaskCompletion:TaskCompletion},
		dataType: 'json',
 		url: "http://hivelet.com/rcm/test/api.php?action=updatetask", 
		success:function(response)
		{
			 if(response=='success')
			 {
 				 GetAlltask();
				 closeFinishPupop();
				 SAlert("Record has been updated.");
			 }
			 else{ Cloading();}
   		}, 
		error: function (xhr, status) 
		{  
			Cloading();	
			//DSAlert("Unable to proceed, please try again.","margin-top0px");
			$("#Tupdate").fadeIn("slow");
		$("#Tupdate").html("<i class='fa fa-exclamation-circle font-size18px pull-left'></i>Please fill-in all the mandatory fields.");
		setTimeout(function(){ $("#Tupdate").fadeOut("slow"); }, 4000);
   		}
 	});
	}
	else{
		// DSAlert("Please fill-in all the mandatory fields.","margin-top0px");
		$("#Tupdate").fadeIn("slow");
		$("#Tupdate").html("<i class='fa fa-exclamation-circle font-size18px pull-left'></i>Please fill-in all the mandatory fields.");
		setTimeout(function(){ $("#Tupdate").fadeOut("slow"); }, 4000);
		 Cloading();
		 }
	
}



function AddRestaurant()
{
	restaurant = $("#restaurant_name").val();
 	if(restaurant!="") {
		loading(); 	
		$.ajax({
			type: "POST", 
			data:{hotelname:restaurant,admin:ADMIN},
			url: "http://hivelet.com/rcm/test/api.php?action=AddRestaurant", 
			success:function(response)
			{
				//console.log(response);
    			if(response=='"success"')
				{
 				 	 GetRestaurant();
 					SAlert("Record has been added.");
					//$("#restMsg").fadeIn("slow");
					//$("#restMsg").addClass("alert-successP").removeClass("alert-dangerP");
					//$("#restMsg").html("Restaurant Added Successfully");
					// setTimeout(function(){ $("#restMsg").fadeOut("slow"); }, 2000);
					
					
					$("#restaurant_name").val("");  
					Cloading();
					openPupopRestclose();
				 } 
				 else
				 {
					 Cloading();
				 }
			}, 
			error: function (xhr, status) 
			{  Cloading();
				DSAlert("Unable to proceed, please try again.","margin-top0px");
			}
		});
	}
	else{
		  $("#restMsg").fadeIn("slow");
		  $("#restMsg").addClass("alert-danger").removeClass("alert-successP");;
		  $("#restMsg").html("<i class='fa fa-exclamation-circle font-size22px  pull-left'></i>Enter a valid resturant name.");
		  //setTimeout(function(){ $("#restMsg").fadeOut("slow"); }, 2000);
		  Cloading();
		}
}

function GetRestaurant()
{  
loading();
 	$.ajax({
		type: "POST", 
		data:{admin:ADMIN},
 		url: "http://hivelet.com/rcm/test/api.php?action=GetRestaurant", 
		success:function(response)
		{
			//console.log(response);
			
			Cloading();

  			 if(response!='"No Records"')
			 {
				
				 document.getElementById("AllRestaurant").innerHTML ="";
				 response=JSON.parse(response);
				 
				 for(var i=0;i<response.length;i++)
				 { 
				 	document.getElementById("AllRestaurant").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
 					<td align="center">'+response[i]['restaurant_name']+'</td>\
					<td align="center" class="p-0 colorBlue">'+'<span class="cursor" onClick="getrestaurent('+response[i]['id']+')">View</span></td></tr>';
				 } 	
				
				}
  			 else{ 
			 
			 InfoAlert("No records found.");
			 document.getElementById("AllRestaurant").innerHTML="";
			}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			 
			DSAlert("Unable to proceed, please try again.","margin-top0px");
   		}
 	});
}
var restID;
function getrestaurent(id)
{
   restID=id;
   loading();
	$("#restaurant_namePOP").val("");
	
   	$.ajax({
		type: "POST",  
 		url: "http://hivelet.com/rcm/test/api.php?action=GetRestaurant2", 
		data:{restID:restID},
		success:function(response)
		{
			//console.log(response)
			Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 console.log(response);
				 for(var i=0;i<response.length;i++)
				 {
					 $("#restaurant_namePOP").val(response[i]['restaurant_name']);
					 
					 opnerestpopup();
 				 }
  			 }else{  InfoAlert("No records found."); }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");

   		}
 	});
	
}

function updateRest(){
	
	updaterest = $("#restaurant_namePOP").val();
	if(updaterest!="")
	{
		loading(); 	
		$.ajax({
			type: "POST",  
			data:{updaterest1:updaterest,restID:restID},
			url: "http://hivelet.com/rcm/test/api.php?action=UpdateRest", 
			success:function(response)
			{
				console.log(response);
				Cloading();
				 if(response=='"success"')
				 {
					SAlert("Restaurant has been updated.");
					//$("#restMsg1").fadeIn("slow");
					//$("#restMsg1").addClass("alert-successP").removeClass("alert-dangerP");
					//$("#restMsg1").html("Restaurant Added Successfully");
					// setTimeout(function(){ $("#restMsg1").fadeOut("slow"); }, 2000);
					opnerestpopupclose();
				 }
				 else
				 {
					// DSAlert("Restaurant has not been updated.","margin-top0px");
					$("#restMsg1").fadeIn("slow");
					$("#restMsg1").addClass("alert-danger").removeClass("alert-successP");;
					$("#restMsg1").html("<i class='fa fa-exclamation-circle font-size22px  pull-left'></i>Enter a valid resturant name.");
				 }
				 GetRestaurant();
			}, 
			error: function (xhr, status) 
			{  Cloading();
				//DSAlert("Unable to proceed, please try again.","margin-top0px");
				$("#restMsg1").fadeIn("slow");
				$("#restMsg1").addClass("alert-danger").removeClass("alert-successP");;
				$("#restMsg1").html("<i class='fa fa-exclamation-circle font-size22px  pull-left'></i>Enter a valid resturant name.");
			}
		});
	}
	else{
		//DSAlert("Please fill-in all the mandatory fields.","margin-top0px");
		  $("#restMsg1").fadeIn("slow");
		  $("#restMsg1").addClass("alert-danger").removeClass("alert-successP");;
		  $("#restMsg1").html("<i class='fa fa-exclamation-circle font-size22px  pull-left'></i>Enter a valid resturant name.");
		Cloading();}
}

var resturantdrop="";

function getAllrestaurant(){
	
	 	$.ajax({
		type: "POST",  
 		url: "http://hivelet.com/rcm/test/api.php?action=GetRestaurantAll", 
		data:{admin:ADMIN},
		success:function(response)
		{
			resturantdrop="";
			Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				  //console.log(response);
				resturantdrop+= "<option value='0'>-Select-</option>"; 
 				 for(var i=0;i<response.length;i++)
				 {
 					resturantdrop+= "<option value='" + response[i].id + "'>"+response[i].restaurant_name+"</option>"; 
  				 }
				 
				 $("#Restaurantdropdwon").html(resturantdrop);
				 $("#Restaurantdropdwonpopup").html(resturantdrop);
				 
  			 }else{  InfoAlert("No records found."); }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");

   		}
 	});
	
	
	
	
}

var RestaurantByEmployee = [];
function GetRestaurantByEmployee(){ 	
	 	$.ajax({
		type: "POST",  
 		url: "http://hivelet.com/rcm/test/api.php?action=GetRestaurantByEmployee", 
		data:{admin:ADMIN},
		success:function(response)
		{
			resturantdrop="";
			Cloading();
  			 if(response!='"No Records"')
			 {
 				 RestaurantByEmployee=JSON.parse(response);
   			 }else{  InfoAlert("No records found."); }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.","margin-top0px");

   		}
});}


function EmployeeRestaurant()
{
	var emp = $("#EmployeeSelect").val(); 
	if(emp=="-Select-"){$("#Restaurantdropdwon").val(0);}
	if(RestaurantByEmployee!="")
	{
		for(r in RestaurantByEmployee){
			if(RestaurantByEmployee[r].id==emp)
			{
				$("#Restaurantdropdwon").val(RestaurantByEmployee[r].resturant_id);				 
			}
		}
	}
}


function SuppEmail()
{
	 first=$.cookie("fname");
     last=$.cookie("lname");
     email=$.cookie("email");
	 
	
	 userDetails = first+" "+last+"<"+email+">";
	 Subject = $("#Subject").val();
	 Message = $("#Message").val();
	 
  if(Subject!="" && Message!="")
	{
		loading();
	  	$.ajax({
			type: "POST",
	 		data:{Subject:Subject,Message:Message,admin:userDetails},
			dataType: 'json',
	 		url: "http://hivelet.com/rcm/test/passwordreset.php?act=suppurt", 
			success:function(response)
			{
				Cloading();
				console.log(response);
				
	  			 if(response=='success')
				 { 	
					
					//SAlert("Email sent successfully!");
				$("#emailsupport").fadeIn("slow");
				$("#emailsupport").removeClass("alert-danger").addClass("alert-success");
		        $("#emailsupport").html("<i class='fa fa-exclamation-circle font-size18px  pull-left'></i>Your request has been sent successfully.");
		        setTimeout(function(){ $("#emailsupport").fadeOut("slow"); }, 4000);
				
				$("#Subject").val("");
	            $("#Message").val("");
					//suppClose();
					
 	 			 }
	  			 if(response=='Error')
	  			 {
	  			 	//DSAlert2('Unable to proceed, please try again.","margin-top0px');
				Cloading();
				$("#emailsupport").fadeIn("slow");
				$("#emailsupport").removeClass("alert-success").addClass("alert-danger");
		        $("#emailsupport").html("<i class='fa fa-exclamation-circle font-size18px  pull-left'></i>Unable to proceed, please try again.");
		        setTimeout(function(){ $("#emailsupport").fadeOut("slow"); }, 4000);
					
	  			 }
 	   		}, 
			error: function (xhr, status) 
			{  
			//  DSAlert("Unable to proceed, please try again.","margin-top0px");
			$("#emailsupport").fadeIn("slow");
			$("#emailsupport").removeClass("alert-success").addClass("alert-danger");
		    $("#emailsupport").html("<i class='fa fa-exclamation-circle font-size18px  pull-left'></i>Unable to proceed, please try again.");
		    setTimeout(function(){ $("#emailsupport").fadeOut("slow"); }, 4000);
		    Cloading();	
			//loginPage();
	   		}
	 	});
 	}
	else
	{
		 //DSAlert2("Please enter a valid email address.","margin-top3px");
		 $("#emailsupport").fadeIn("slow");
		 $("#emailsupport").removeClass("alert-success").addClass("alert-danger");
		 $("#emailsupport").html("<i class='fa fa-exclamation-circle font-size18px pull-left'></i>Please fill-in all the mandatory fields.");
		 setTimeout(function(){ $("#emailsupport").fadeOut("slow"); }, 4000);
		// emailsupport
		 Cloading();
	 } 
}





function getAlldocsdata(){
	
	//restName=$("#restName").val();
	restName="Res1";
	userID=ADMIN;
 	$.ajax({
			type: "POST",
	 		data:{restName:restName,userID:userID},
			url: "http://localhost/RCM-Toolv2/api.php?action=getAlldocsdata", 
			success:function(response)
			{
				
				
				response=JSON.parse(response);
				console.log(response);
				rows = response;
				csvContent = "data:text/csv;charset=utf-8,";
				rows.forEach(function(rowArray){
				row = rowArray.join(",");
				csvContent += row + "\r\n";
				}); 
				var encodedUri = encodeURI(csvContent);
				var link = document.createElement("a");
				link.setAttribute("href", encodedUri);
				link.setAttribute("download", "RCM Tool.csv");
				document.body.appendChild(link); 

                link.click();
 	   		}, 
			error: function (xhr, status) 
			{  
			  
			
			}
	 	});
}








