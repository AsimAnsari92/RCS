// JavaScript Document

function login()
{
	userEmail = $("#emaillAddLogin").val();
	UserPass = $("#passwordLogin").val();
 if(userEmail!="" && UserPass!="")
	{
	$.ajax({
		type: "POST",
 		data:{email:userEmail,password:UserPass},
		dataType: 'json',
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=loginUser",
		success:function(response)
		{
 			 //console.log(response=='success');
			 if(response=='success')
			 {
			 	window.location.href = "dashboard.php";
			 }
			 else
			 {
				 console.log(response);
			 }
   		}, 
		error: function (xhr, status) 
		{  
			//	console.log(xhr);
			 
   		}
 	});
	}else{DSAlert("Please enter valid credentials.");Cloading();} 
}


function AddEmployee()
{ 
	loading();
	EmployeeName		= $("#EmployeeName").val();
	TitleDesignation 	= $("#TitleDesignation").val();
	JoiningDate 		= $("#JoiningDate").val();
	CompletionOnboarding= $("#CompletionOnboarding").val();
	ProbationPeriod 	= $("#ProbationPeriod").val();
	DateOfBirth 		= $("#DateOfBirth").val();

	if(EmployeeName!="" && TitleDesignation!="" && JoiningDate!="" && CompletionOnboarding!="" && ProbationPeriod!="" && DateOfBirth!="")
	{
		
	$.ajax({
		type: "POST",
 		data:{emp_name:EmployeeName, title:TitleDesignation, joining_date:JoiningDate, completion_onboarding:CompletionOnboarding, probation_period:ProbationPeriod, dob:DateOfBirth},
		dataType: 'json',
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=addEmp",
		success:function(response)
		{
  			 if(response=='success')
			 {
				 getAllEmp();
				 SAlert("Employee add successfully.");
				//window.location.href = "dashboard.php";
			 }
			 else{Cloading();}
				
			}, 
			error: function (xhr, status) 
			{  
				Cloading();
				DSAlert("Unable to proceed, please try again.");

			}
 		});
	}
	else{DSAlert("All fields are mandatory.");Cloading();}
}


function getAllEmp()
{  
loading();
 
 	$.ajax({
		type: "POST",  
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=getAllEmp",
		success:function(response)
		{
			Cloading();
  			 if(response!='"No Records"')
			 {
				 document.getElementById("AllEmployeesData").innerHTML ="";
				 response=JSON.parse(response);
				 for(var i=0;i<response.length;i++)
				 {
					 document.getElementById("AllEmployeesData").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['emp_name']+'</td>\
					<td align="center">'+response[i]['title']+'</td>\
					<td align="center">'+response[i]['joining_date']+'</td>\
				<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="getEmp('+response[i]['id']+')">View</span> | <span class="cursor" onClick="deleteBox('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 }
				 
				 
 			 }else{ DSAlert("No Records.");}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			 
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}


function getEmp(id)
{  
loading();
	$("#EmployeeNamePOP").val("");
	$("#TitleDesignationPOP").val("");
	$("#JoiningDatePOP").val("");
	$("#CompletionOnboardingPOP").val( ""); 
	$("#DateOfBirthPOP").val(""); 
	$("#ProbationPeriodPOP").val(""); 
	$("#EmployeeidPOP").val( ""); 

   	$.ajax({
		type: "POST",  
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=getEmp",
		data:{userID:id},
		success:function(response)
		{
			Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 console.log(response);
				 for(var i=0;i<response.length;i++)
				 {
					 $("#EmployeeNamePOP").val( response[i]['emp_name']);
					 $("#TitleDesignationPOP").val( response[i]['title']);
					 $("#JoiningDatePOP").val( response[i]['joining_date']);
					 $("#CompletionOnboardingPOP").val( response[i]['completion_onboarding']); 
					 $("#DateOfBirthPOP").val( response[i]['dob']); 
					 $("#ProbationPeriodPOP").val( response[i]['probation_period']); 
					 $("#EmployeeidPOP").val( response[i]['id']); 
					 openPupop();
 				 }
  			 }else{  DSAlert("No Records."); }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.");

   		}
 	});
}



function updateEmp()
{ 
loading();
	EmployeeName		= $("#EmployeeNamePOP").val();
	TitleDesignation 	= $("#TitleDesignationPOP").val();
	JoiningDate 		= $("#JoiningDatePOP").val();
	CompletionOnboarding= $("#CompletionOnboardingPOP").val();
	ProbationPeriod 	= $("#ProbationPeriodPOP").val();
	DateOfBirth 		= $("#DateOfBirthPOP").val();
	uID		 			= $("#EmployeeidPOP").val();
	//emp_name title joining_date completion_onboarding probation_period dob
	$.ajax({
		type: "POST",
 		data:{emp_name:EmployeeName, title:TitleDesignation, joining_date:JoiningDate, completion_onboarding:CompletionOnboarding, probation_period:ProbationPeriod, dob:DateOfBirth,userID:uID},
		dataType: 'json',
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=updateEmp",
		success:function(response)
		{
			 if(response=='success')
			 {
 				 getAllEmp();
				 closePupop();
			 }
			 else{ Cloading();}
   		}, 
		error: function (xhr, status) 
		{  
			Cloading();	
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}

function deleteEmp()
{ 
loading();
	$.ajax({
		type: "POST",
 		data:{userID:DeleteID},
		dataType: 'json',
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=deleteEmp",
		success:function(response)
		{
 			
 			 if(response=='success')
			 {
 				 getAllEmp();
				 closeDelPupop();
				 SAlert("Employee delete successfully");
 			 }
			 else{ DSAlert("Unable to proceed, please try again.");closeDelPupop();}
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}
 
function getEmpNames()
{  
	$.ajax({
		type: "POST", 
		dataType: 'json',
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=getEmpNames",
		success:function(response)
		{
			document.getElementById("EmployeeSelect").innerHTML="";
 			 if(response!='"No Records"')
			 {
 				 for(var i=0;i<response.length;i++)
				 { 
			 document.getElementById("EmployeeSelect").innerHTML +='<option value="'+response[i]['id']+'">'+response[i]['emp_name']+'</option>';
  				 }
  			 }else{  }
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}

function Addcertification()
{ 
 	Certification1		= $("#Certification").val();
	Employee1			= $("#EmployeeSelect").val();
	IssuanceDate1 		= $("#IssuanceDate").val();
	ExpirationDate1		= $("#ExpirationDate").val();
	Comments1 			= $("#Comments").val(); 
 	var form_data = new FormData();
   		form_data.append("file", document.getElementById('file').files[0]);

var objArr = [];
objArr.push({"certification":Certification1, "employeeID": Employee1, "issue_date": IssuanceDate1, "exp_date": ExpirationDate1, "comments": Comments1}); 
form_data.append('objArr', JSON.stringify( objArr ));

 if(Certification1!="" && Employee1!="" && IssuanceDate1!="" && ExpirationDate1!="" && Comments1!="")
	{
		loading();
   	$.ajax({
		type: "POST",
 		data:form_data,
		contentType: false,
		cache: false,
		processData: false,
  		url: "http://localhost:8080/RCM-Tool/web/api.php?action=Addcertification",
		success:function(response)
		{
			//console.log(response);Cloading();
  			 if(response=='"success"')
			 {
 				  getAllCertification();
				  SAlert("CertificationSuccess add successfully");
			 } else{Cloading();}
   		}, 
		error: function (xhr, status) 
		{  
			Cloading();
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
	}
	else{ DSAlert("All fields are mandatory");Cloading();}
}



function getAllCertification()
{   
loading();
   	$.ajax({
		type: "POST",  
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=getAllCertification",
		success:function(response)
		{
			Cloading();
  			 if(response!='"No Records"')
			 {
				 console.log(response);
				 response=JSON.parse(response);
				 document.getElementById("AllCertificationData").innerHTML ="";
				 for(var i=0;i<response.length;i++)
				 {
					 document.getElementById("AllCertificationData").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['certification']+'</td>\
					<td align="center">'+response[i]['empname']+'</td>\
					<td align="center">'+response[i]['exp_date']+'</td>\
					<td align="center">'+response[i]['issue_date']+'</td>\
				<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="getCertification('+response[i]['id']+')">View</span> | <span  class="cursor" onClick="deleteBox('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 }
   			 }else{ DSAlert("No Records");}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}


function getCertification(id)
{  loading();
	 $("#CertificationPOP").val("");
	 $("#EmployeeSelectPOP").val("");
	 $("#IssuanceDatePOP").val("");
	 $("#ExpirationDatePOP").val("");
	 $("#CommentsPOP").val("");  
	 $("#Dlink").html("");  
 	 
   	$.ajax({
		type: "POST",  
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=getCertification",
		data:{certID:id},
		success:function(response)
		{Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 console.log(response);
				 for(var i=0;i<response.length;i++)
				 {
					 $("#CertificationPOP").val(response[i]['certification']);
					 $("#EmployeeSelectPOP").val(response[i]['empname']);
					 $("#IssuanceDatePOP").val( response[i]['issue_date']);
					 $("#ExpirationDatePOP").val(response[i]['exp_date']); 
					 $("#CommentsPOP").val(response[i]['comments']); 
 					 $("#CertIDPOP").val(response[i]['id']); 
 					 $("#EmployeeidPOP").val(response[i]['employeeID']);
 					$("#Dlink").html('<a href="http://localhost:8080/RCM-Tool/web/'+response[i]['c_file_path']+'" download>Download</a>');  
 
					 openPupop();
 				 }
  			 }else{  }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}

function UpdateCertification()
{
	loading();
	CertificationPOP	=	$("#CertificationPOP").val();
	EmployeeSelectPOP	=	$("#EmployeeSelectPOP").val();
	IssuanceDatePOP		=	$("#IssuanceDatePOP").val();
	ExpirationDatePOP	=	$("#ExpirationDatePOP").val();
	CommentsPOP			=	$("#CommentsPOP").val();
	CertIDPOP			=	$("#CertIDPOP").val();
	EmployeeidPOP		=	$("#EmployeeidPOP").val();
	//c_file_path			=	"sss";
	
	var form_data = new FormData();
	form_data.append("Ufile", document.getElementById('filePOP').files[0]);
		
 var data = [];
data.push({"certification":CertificationPOP, "employeeID": EmployeeidPOP, "issue_date": IssuanceDatePOP, "exp_date": ExpirationDatePOP, "comments": CommentsPOP,"certID":CertIDPOP});
 form_data.append('data', JSON.stringify(data));
 
 	$.ajax({
		type: "POST",
 		data:form_data,
		contentType: false,
		cache: false,
		processData: false,
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=UpdateCertification",
		success:function(response)
		{
 			 console.log(response);
			 if(response=='"success"')
			 {
				 closePupop();
 				 getAllCertification();
			 	//window.location.href = "dashboard.php";
			 }
			 else{ Cloading();}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}


function deleteCertification(id)
{   
loading();
	$.ajax({
		type: "POST",
 		data:{certID:DeleteID},
		dataType: 'json',
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=deleteCertification",
		success:function(response)
		{  			 //console.log(response=='success');
			 if(response=='success')
			 {
 				 getAllCertification();
				 closeDelPupop();
				 SAlert("Certificate delete successfully");
			 }
			 else{ console.log("error");}
   		}, 
		error: function (xhr, status) 
		{  
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}



  

function AddLicense_permit()
{ loading();
	License			= $("#License").val();
	Comments		= $("#Comments").val();
 	exampleInputFile= "exampleInputFile"; 
	if(License!="" && Comments!="" && exampleInputFile!="")
	{
  	$.ajax({
		type: "POST",  
 		data:{license:License, comments:Comments, lp_file_path:exampleInputFile},
  		url: "http://localhost:8080/RCM-Tool/web/api.php?action=AddLicense_permit",
		success:function(response)
		{
  			 if(response=='"success"')
			 {
				 getAllLicense_permit();
 				  
			 } else{Cloading();}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
	}
	else{DSAlert("Change a few things up and try submitting again.");Cloading();}
}



function getAllLicense_permit()
{   
loading();
  	$.ajax({
		type: "POST",  
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=getAllLicense_permit",
		success:function(response)
		{Cloading();
  			 if(response!='"No Records"')
			 {
				 console.log(response);
				 response=JSON.parse(response);
				 document.getElementById("getAllLicense_permit").innerHTML ="";
				 for(var i=0;i<response.length;i++)
				 {
					 document.getElementById("getAllLicense_permit").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['license']+'</td>\
				<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="getLicense_permit('+response[i]['id']+')">View</span> | <span class="cursor" onClick="deleteCertification('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 }
   			 }else{ alert("No Records");}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}


 

function getLicense_permit(id)
{  loading();
	 $("#CertificationPOP").val("");
	 $("#EmployeeSelectPOP").val("");
	 $("#IssuanceDatePOP").val("");
	 $("#ExpirationDatePOP").val("");
	 $("#CommentsPOP").val("");  
	 
   	$.ajax({
		type: "POST",  
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=getLicense_permit",
		data:{certID:id},
		success:function(response)
		{Cloading();
  			 if(response!='"No Records"')
			 {
 				 response=JSON.parse(response);
				 console.log(response);
				 for(var i=0;i<response.length;i++)
				 {
					 $("#CertificationPOP").val(response[i]['certification']);
					 $("#EmployeeSelectPOP").val(response[i]['empname']);
					 $("#IssuanceDatePOP").val( response[i]['issue_date']);
					 $("#ExpirationDatePOP").val(response[i]['exp_date']); 
					 $("#CommentsPOP").val(response[i]['comments']); 
 					 $("#CertIDPOP").val(response[i]['id']); 
 					 $("#EmployeeidPOP").val(response[i]['employeeID']); 
					 openPupop();
 				 }
  			 }else{  }
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}






function Add_inspection()
{ loading();
	Inspection			= $("#Inspection").val();
	Comments			= $("#Comments").val();
	InspectionDate		= $("#InspectionDate").val();
 	exampleInputFile	= "exampleInputFile"; 
	if(Inspection!="" && Comments!="" && InspectionDate!="" && exampleInputFile!="")
	{ 
  	$.ajax({
		type: "POST",  
 		data:{inspection:Inspection, date_of_inspection:InspectionDate, comments:Comments, insp_file_path:exampleInputFile},
  		url: "http://localhost:8080/RCM-Tool/web/api.php?action=Add_inspection",
		success:function(response)
		{
  			 if(response=='"success"')
			 {
				  getAll_inspection();
 				  console.log("success");
			 } else{Cloading();}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
	}
	else{DSAlert("Change a few things up and try submitting again.");Cloading();}
}


function getAll_inspection()
{   
loading();
 document.getElementById("ListInspections").innerHTML ="";
 	$.ajax({
		type: "POST",  
 		url: "http://localhost:8080/RCM-Tool/web/api.php?action=getAll_inspection",
		success:function(response)
		{Cloading();
  			 if(response!='"No Records"')
			 {
				 console.log(response);
				 response=JSON.parse(response);
				 for(var i=0;i<response.length;i++)
				 {
					 document.getElementById("ListInspections").innerHTML +='<tr>\
					<td align="center">'+(i+1)+'</td>\
					<td align="center">'+response[i]['inspection']+'</td>\
					<td align="center">'+response[i]['date_of_inspection']+'</td>\
				<td align="center" class="p-0 colorBlue"><span class="cursor" onClick="getLicense_permit('+response[i]['id']+')">View</span> | <span   class="cursor" onClick="deleteCertification('+response[i]['id']+')">Delete</span></td>\
					</tr>';
				 }
   			 }else{ alert("No Records");}
   		}, 
		error: function (xhr, status) 
		{  Cloading();
			DSAlert("Unable to proceed, please try again.");
   		}
 	});
}	