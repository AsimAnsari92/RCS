<?php

header('Access-Control-Allow-Origin: *');  
function getConnection() 
{
	 
	$dbhost = "schoolforms.cjahuqpumuov.us-east-1.rds.amazonaws.com";
	$dbname = "schoolforms";
	$dbuser = "schoolforms";
	$dbpass = "melosh123";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

$db =getConnection();

$action=$_GET['action'];
 
if($action=='RegisterUser')
{
    RegisterUser($db);
}
if($action=='loginUser')
{
	loginUser($db);			
}
if($action=='ForgotPasswordEmail')
{
	ForgotPasswordEmail($db);			
}

if($action=='addEmp')
{
	addEmp($db);			
}
if($action=='updateEmp')
{
	updateEmp($db);			
} 
  
if($action=='deleteEmp')
{
	deleteEmp($db);			
} 
if($action=='getAllEmp')
{
	getAllEmp($db);			
} 
 
if($action=='getEmp')
{
	getEmp($db);			
} 
 
if($action=='getEmpNames')
{
	getEmpNames($db);			
}  

if($action=='getRestNames')
{
	getRestNames($db);			
}  


if($action=='Addcertification')
{
	Addcertification($db);			
} 

if($action=='UpdateCertification')
{
	UpdateCertification($db);			
} 
if($action=='deleteCertification')
{
	deleteCertification($db);			
} 
if($action=='getAllCertification')
{
	getAllCertification($db);			
}   
if($action=='getCertification')
{
	getCertification($db);			
}    


if($action=='AddLicense_permit')
{
	AddLicense_permit($db);			
}   
if($action=='UpdateLicense_permit')
{
	UpdateLicense_permit($db);			
}   
if($action=='deleteLicense_permit')
{
	deleteLicense_permit($db);			
}   
if($action=='getAllLicense')
{
	getAllLicense($db);			
} 
if($action=='getAllPermit')
{
	getAllPermit($db);			
} 



if($action=='getLicense_permit')
{
	getLicense_permit($db);			
} 
 
 
if($action=='Add_inspection')
{
	Add_inspection($db);			
} 
if($action=='Update_inspection')
{
	Update_inspection($db);			
} 
if($action=='delete_inspection')
{
	delete_inspection($db);			
} 
if($action=='getAll_inspection')
{
	getAll_inspection($db);			
} 
if($action=='get_inspection')
{
	get_inspection($db);			
} 
 
 
if($action=='D_license_permit')
{
	D_license_permit($db);			
} 

if($action=='D_certification')
{
	D_certification($db);			
} 

if($action=='D_inpection')
{
	D_inpection($db);			
} 
if($action=='todayDate')
{
	todayDate();			
} 


function todayDate()
{
	echo date("Y/m/d");
}



if($action=='getProfile')
{
	getProfile($db);			
} 
if($action=='UpdateProfile')
{
	UpdateProfile($db);			
} 
if($action=='UpdatePassword')
{
	UpdatePassword($db);			
} 
if($action=='AddNotifyEmail')
{
	AddNotifyEmail($db);			
}  
if($action=='GetNotifyEmail')
{
	GetNotifyEmail($db);			
} 
if($action=='DeleteNotifyEmail')
{
	DeleteNotifyEmail($db);			
} 

if($action=='AddVendor')
{
	AddVendor($db);			
}
if($action=='GetAllVendor')
{
	GetAllVendor($db);			
}  
if($action=='DeleteVendor')
{
	DeleteVendor($db);			
} 

if($action=='AddTask')
{
	AddTask($db);			
} 
 
if($action=='GetAlltask')
{
	GetAlltask($db);			
}
if($action=='GetTask')
{
	GetTask($db);			
}

if($action=='deletTask')
{
	deletTask($db);			
}
if($action=='updatetask')
{
	updatetask($db);			
}


if($action=='AddRestaurant')
{
	AddRestaurant($db);			
} 
if($action=='GetRestaurant')
{
	GetRestaurant($db);			
} 
if($action=='GetRestaurant2')
{
	GetRestaurant2($db);			
} 

if($action=='UpdateRest')
{
	UpdateRest($db);			
} 

if($action=='GetRestaurantAll')
{
	GetRestaurantAll($db);			
}  

if($action=='GetRestaurantByEmployee')
{
	GetRestaurantByEmployee($db);			
}  


if($action=='getEmpDocs')
{
	getEmpDocs($db);			
}  

if($action=='checkMail')
{
	checkMail($db);			
} 

if($action=='getAlldocsdata')
{
	getAlldocsdata($db);			
} 



function checkMail(){
	
	$Cemail = $_POST['Cemail'];
	$arrC = array("Cemail" => $Cemail);
	
	$statement= $db->prepare('SELECT email FROM	schoolforms.rcm_users_v2 WHERE email=:Cemail');
	
 	$statement->execute($arrC);
	
 	if($Ce=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($Ce);
  	}
	else
	{  echo json_encode("No Records"); 	}
 }






function getEmpDocs($db)
{
	$userID		=	$_POST['userID'];
	$arr = array("userID" => $userID);
	
	$statement2= $db->prepare('SELECT certification,issue_date,exp_date,c_file_path,employeeID FROM schoolforms.rcm_certification_v2 
where employeeID=:userID'); 
	$statementPermit= $db->prepare('SELECT license,lp_file_path,IssuanceDate,ExpirationDate FROM schoolforms.rcm_license_permit_v2 where  employeeID=:userID and doctype="Permit"');
	$statementLicense= $db->prepare('SELECT license,lp_file_path,IssuanceDate,ExpirationDate FROM schoolforms.rcm_license_permit_v2 where  employeeID=:userID and doctype="License"');
 
 	$statementLicense->execute($arr);
 	$statementPermit->execute($arr);
 	$statement2->execute($arr);
	
	$License=$statementLicense->fetchAll(PDO::FETCH_ASSOC);
	$Permit=$statementPermit->fetchAll(PDO::FETCH_ASSOC);
 	$certificate=$statement2->fetchAll(PDO::FETCH_ASSOC);
	 
	$arr1 = array("certificate" => $certificate,"License" => $License,"Permit" => $Permit);
 
	echo json_encode($arr1);
  	 
 }
 
 
 
 
 

function GetRestaurantByEmployee($db)
{
	$admin		=	$_POST['admin'];
	$arr = array("admin" => $admin);
	$statement= $db->prepare('SELECT id,resturant_id  FROM 	schoolforms.rcm_employee_v2 WHERE admin=:admin');
 	$statement->execute($arr);
 	if($LP=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($LP);
  	}
	else
	{  echo json_encode("No Records"); 	}
 }

  
 
 

function D_license_permit($db)
{
	$admin		=	$_POST['admin'];
	$arr = array("admin" => $admin);
	$statement= $db->prepare('select u.*,rcm_employee_v2.emp_name as empname FROM	schoolforms.rcm_license_permit_v2 u LEFT JOIN schoolforms.rcm_employee_v2 on u.employeeID=rcm_employee_v2.id WHERE u.admin=:admin order by u.ExpirationDate');
 	$statement->execute($arr);
 	if($LP=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($LP);
  	}
	else
	{  echo json_encode("No Records"); 	}
	
}
   
function D_certification($db)
{
	$admin		=	$_POST['admin'];
	$arr = array("admin" => $admin);
	$statement= $db->prepare('SELECT rcm_certification_v2.id as id,rcm_certification_v2.certification as certification,rcm_certification_v2.employeeID as employeeID,rcm_certification_v2.issue_date as issue_date, rcm_certification_v2.exp_date as exp_date,	rcm_certification_v2.comments as comments,	rcm_certification_v2.c_file_path as c_file_path,rcm_employee_v2.emp_name as empname FROM	schoolforms.rcm_certification_v2 LEFT JOIN schoolforms.rcm_employee_v2 on rcm_certification_v2.employeeID=rcm_employee_v2.id WHERE rcm_certification_v2.admin=:admin order by exp_date');
 	$statement->execute($arr);
 	if($LP=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($LP);
  	}
	else
	{  echo json_encode("No Records"); 	}
 }
  
function D_inpection($db)
{
	$admin		=	$_POST['admin'];
	$arr = array("admin" => $admin);
	$statement= $db->prepare('select rcm_notification_v2.id ,rcm_inspection_v2.followUp_date,rcm_inspection_v2.inspection,rcm_notification_v2.pool,rcm_notification_v2.doc_type,rcm_notification_v2.doc_id,rcm_notification_v2.is_notify,rcm_employee_v2.emp_name as empname from rcm_inspection_v2 inner join rcm_notification_v2 on rcm_inspection_v2.id=rcm_notification_v2.doc_id LEFT JOIN schoolforms.rcm_employee_v2 on rcm_inspection_v2.employeeID=rcm_employee_v2.id where rcm_inspection_v2.is_followUp="true" and rcm_notification_v2.admin=:admin');
 	$statement->execute($arr);
 	if($LP=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($LP);
  	}
	else
	{  echo json_encode("No Records"); 	}
}
   

function loginUser($db)
{
	$email		=	$_POST['email'];
	$password	=	$_POST['password'];
	$arr = array("email" => $email,"password" => $password);
	
	$statement1= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE email=:email AND pwd=:password AND status="inactive" ');
	$statement1->execute($arr);
	
 	if($data2=$statement1->fetchAll(PDO::FETCH_ASSOC))
	{
 		echo json_encode("inactive");
  	} 
	
	else {
	
   	$statement= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE email=:email AND pwd=:password AND status="active" ');
	$statement->execute($arr);
	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
 		echo json_encode($data);
  	}
	else 
	{  
	    echo json_encode("Error");
	}
	
	}
	
	
	
	
}
 

function RegisterUser($db)
{
	
	
	
    //firstname  lastname email password
	$fname		=	$_POST['firstname'];
	$lname		=	$_POST['lastname'];
	$email		=	$_POST['email'];
	$pwd		=	$_POST['password'];
	$status		=	'inactive';
	
	$arr2 = array("email" => $email);
	$statement1= $db->prepare('SELECT	email FROM	schoolforms.rcm_users_v2 WHERE email=:email');
	$statement1->execute($arr2);
	
	
 	if($data11=$statement1->fetchAll(PDO::FETCH_ASSOC))
	{
 		echo json_encode("exist");
  	} 
	else 
	{ 
	$statement= $db->prepare('INSERT INTO schoolforms.rcm_users_v2 (fname,lname,email,pwd,status) VALUES (?,?,?,?,?)');
	$arr = array();
	array_push($arr,$fname,$lname,$email,$pwd,$status);
 	if($statement->execute($arr))
	{
 		echo json_encode("success");
  	} else { echo json_encode("Error"); } }
	
	
	
	
  	
}
   
function addEmp($db){
	
$data=json_decode(stripslashes($_POST['objArr']));
	
	$EmployeeID		=	$data[0] -> EmployeeID;
	$EmployeeName	=	$data[0] -> EmployeeName;
	$TitleDesignation	=	$data[0] -> TitleDesignation;
	$JoiningDate		=	$data[0] -> JoiningDate;
	$CompletionOnboarding =	$data[0] -> CompletionOnboarding;
	$ProbationPeriod =	$data[0] -> ProbationPeriod;
	$DateOfBirth =	$data[0] -> DateOfBirth;
	$Resturantval = $data[0] -> Resturantval;
	$EmployeeComments = $data[0] -> EmployeeComments;
	$admin = $data[0] -> admin;
	$location="";
	$checkFile=true;
	if($_FILES["file"]["name"] != '')
	{
		$test = explode('.', $_FILES["file"]["name"]);
		$ext = end($test);
		$name = "EMP-".rand(100, 9999999999999).'-'.date("m-d-Y_H-i-s"). '.' . $ext;
		$location = '/home6/hiveletc/public_html/rcm/test/upload/'.$name;  
		//$location = 'upload/'.$name;  
 		$location1 = 'upload/'.$name;  
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $location))
		{
			$checkFile=true;
		}
	}
	else
	{
		$checkFile=true;
	}
	
	$arr = array();
	array_push($arr,$EmployeeName,$TitleDesignation,$JoiningDate,$CompletionOnboarding,$ProbationPeriod,$DateOfBirth,$admin,$Resturantval,$EmployeeID,$EmployeeComments,$location1);	
   	$statement= $db->prepare('INSERT INTO schoolforms.rcm_employee_v2
	(emp_name, title, joining_date, completion_onboarding, probation_period, dob, admin, resturant_id, employee_id, comments, file) VALUES	(?,?,?,?,?,?,?,?,?,?,?)');
  	
   	if($statement->execute($arr))
	{
 		if($checkFile)
		{
			echo json_encode("success");
		}
		else { echo json_encode("Error"); }
  	} else { echo json_encode("Error"); }
}	


function updateEmp($db)
{ 	
	$data=json_decode(stripslashes($_POST['data']));
   	$EmployeeName			=	$data[0] -> EmployeeName;
 	$TitleDesignation		=	$data[0] -> TitleDesignation;
	$JoiningDate			=	$data[0] -> JoiningDate;
	$CompletionOnboarding	=	$data[0] -> CompletionOnboarding;
	$ProbationPeriod		=	$data[0] -> ProbationPeriod;
	$DateOfBirth			=	$data[0] -> DateOfBirth;
	$admin					=	$data[0] -> admin;
	$Restaurantdropdwonpopup=	$data[0] -> Restaurantdropdwonpopup;
	$CommentsPOP			=	$data[0] -> CommentsPOP;
	$EmployeeIDPOP			=	$data[0] -> EmployeeIDPOP;
	$uID					=	$data[0] -> uID;
	$location="";
	$checkFile=false;
 
 	if($_FILES["Ufile"]["name"] != '')
	{
		$test = explode('.', $_FILES["Ufile"]["name"]);
		$ext = end($test);
		$name = "EMP-".rand(100, 9999999999999).'-'.date("m-d-Y_H-i-s"). '.' . $ext;
		$location = '/home6/hiveletc/public_html/rcm/test/upload/'.$name;  
		//$location = 'upload/'.$name;  
		$location1 = 'upload/'.$name;  
		if(move_uploaded_file($_FILES["Ufile"]["tmp_name"], $location))
		{
			$checkFile=true;
			$arr = array("EmployeeName" => $EmployeeName,"TitleDesignation" => $TitleDesignation,"JoiningDate" => $JoiningDate,"CompletionOnboarding" => $CompletionOnboarding,"ProbationPeriod" => $ProbationPeriod,"DateOfBirth" => $DateOfBirth,"Restaurantdropdwonpopup"=>$Restaurantdropdwonpopup,"EmployeeIDPOP"=>$EmployeeIDPOP,"CommentsPOP"=>$CommentsPOP,"location1"=>$location1,"uID"=>$uID);
			
 			$statement= $db->prepare("UPDATE schoolforms.rcm_employee_v2 SET  emp_name =:EmployeeName,title =:TitleDesignation,joining_date =:JoiningDate,	completion_onboarding =:CompletionOnboarding,probation_period =:ProbationPeriod,	dob =:DateOfBirth,resturant_id =:Restaurantdropdwonpopup,employee_id =:EmployeeIDPOP,comments =:CommentsPOP,file =:location1 where id=:uID ");
		} 
 	}	
	else
	{ 		 
			$checkFile=true;	
			$arr = array("EmployeeName" => $EmployeeName,"TitleDesignation" => $TitleDesignation,"JoiningDate" => $JoiningDate,"CompletionOnboarding" => $CompletionOnboarding,"ProbationPeriod" => $ProbationPeriod,"DateOfBirth" => $DateOfBirth,"Restaurantdropdwonpopup"=>$Restaurantdropdwonpopup,"EmployeeIDPOP"=>$EmployeeIDPOP,"CommentsPOP"=>$CommentsPOP,"uID"=>$uID);
 
  			$statement= $db->prepare("UPDATE schoolforms.rcm_employee_v2 SET  emp_name =:EmployeeName,title =:TitleDesignation,joining_date =:JoiningDate,	completion_onboarding =:CompletionOnboarding,	probation_period =:ProbationPeriod,	dob =:DateOfBirth,resturant_id =:Restaurantdropdwonpopup,employee_id =:EmployeeIDPOP,comments =:CommentsPOP  where id=:uID");
	}
 	if($statement->execute($arr))
	{  
		if($checkFile){echo json_encode("success");}else { echo json_encode("Error"); }
	}
	else
	{ echo json_encode("error");  }	 	 
}
	
function deleteEmp($db)
{
	$userID		=	$_POST['userID'];
	$arr = array("userID" => $userID);
 	$statement= $db->prepare('DELETE FROM schoolforms.rcm_employee_v2 WHERE id=:userID');
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{  echo json_encode("error"); 	}  	
}

function getAllEmp($db)
{
	$admin		=	$_POST['admin'];
	$arr = array("admin" => $admin);
   	$statement= $db->prepare('SELECT rcm_employee_v2.id,rcm_employee_v2.employee_id,rcm_employee_v2.emp_name,rcm_restaurant_v2.restaurant_name,rcm_employee_v2.title,	
rcm_employee_v2.joining_date FROM schoolforms.rcm_employee_v2 inner join schoolforms.rcm_restaurant_v2 on rcm_employee_v2.resturant_id=rcm_restaurant_v2.id where rcm_restaurant_v2.user=:admin');
 	$statement->execute($arr);
 	if($emp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($emp);
  	}
	else
	{  echo json_encode("No Records"); 	}
}

function getEmp($db)
{
	$userID		= $_POST['userID'];
	$arr		= array("userID" => $userID);
	$statement= $db->prepare('SELECT * FROM	schoolforms.rcm_employee_v2 WHERE id=:userID');
 	$statement->execute($arr);
 	if($emp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($emp);
  	}
	else
	{  echo json_encode("No Records"); 	}
}


function getEmpNames($db)
{ 
	$admin		= $_POST['admin'];
	$arr		= array("admin" => $admin);
	$statement= $db->prepare('SELECT id,emp_name FROM schoolforms.rcm_employee_v2 WHERE admin=:admin order by emp_name ');
 	$statement->execute($arr);
 	if($emp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($emp);
  	}
	else
	{  echo json_encode("No Records"); 	}
}

function getRestNames($db)
{ 
	$admin		= $_POST['admin'];
	$arr		= array("admin" => $admin);
	$statement= $db->prepare('SELECT * FROM schoolforms.rcm_employee_v2 WHERE admin=:admin order by emp_name ');
 	$statement->execute($arr);
 	if($emp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($emp);
  	}
	else
	{  echo json_encode("No Records"); 	}
}




//certification
function Addcertification($db)
{
	$data=json_decode(stripslashes($_POST['objArr']));
	
	$certification		=	$data[0] -> certification;
	$employeeID			=	$data[0] -> employeeID;
	$issue_date			=	$data[0] -> issue_date;
	$exp_date			=	$data[0] -> exp_date;
	$comments			=	$data[0] -> comments;
	$admin				=	$data[0] -> admin;
 	$location="";
	$checkFile=false;
	if($_FILES["file"]["name"] != '')
	{
		$test = explode('.', $_FILES["file"]["name"]);
		$ext = end($test);
		$name = "CR-".rand(100, 9999999999999).'-'.date("m-d-Y_H-i-s"). '.' . $ext;
		$location = '/home6/hiveletc/public_html/rcm/test/upload/'.$name;  
		//$location = 'upload/'.$name;  
 		$location1 = 'upload/'.$name;  
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $location))
		{
			$checkFile=true;
		}
	}
 	else
	{
		$checkFile=true;
	}
	
	$arr = array();
	array_push($arr,$certification,$employeeID,$issue_date,$exp_date,$comments,$location1,$admin);	
   	$statement= $db->prepare('INSERT INTO schoolforms.rcm_certification_v2 (certification, employeeID, issue_date, exp_date, comments, c_file_path,admin) VALUES (?,?,?,?,?,?,?)');
  	
   	if($statement->execute($arr))
	{
 		if($checkFile)
		{
			$arr2 = array();
			$doc_id = $db->lastInsertId();
			array_push($arr2,'','rcm_certification_v2',$doc_id,'no',$admin);	
			$statement2= $db->prepare('INSERT INTO schoolforms.rcm_notification_v2 ( pool, doc_type, doc_id, is_notify,admin) VALUES (?,?,?,?,?)');
			$statement2->execute($arr2);
  			echo json_encode("success");
		}
		else { echo json_encode("Error"); }
  	} else { echo json_encode("Error"); }
}

function UpdateCertification($db)
{ 
	$data=json_decode(stripslashes($_POST['data']));
	$certID			=	$data[0] -> certID;
 	$certification	=	$data[0] -> certification;
 	$issue_date		=	$data[0] -> issue_date;
	$exp_date		=	$data[0] -> exp_date;
	$comments		=	$data[0] -> comments;
	$location="";
	$checkFile=false;
	if($_FILES["Ufile"]["name"] != '')
	{
		$test = explode('.', $_FILES["Ufile"]["name"]);
		$ext = end($test);
		$name = "CR-".rand(100, 9999999999999).'-'.date("m-d-Y_H-i-s"). '.' . $ext;
		$location = '/home6/hiveletc/public_html/rcm/test/upload/'.$name;  
		$location1 = 'upload/'.$name;  
		if(move_uploaded_file($_FILES["Ufile"]["tmp_name"], $location))
		{
			$checkFile=true;
				$arr = array("certification" => $certification,"issue_date" => $issue_date,"exp_date" => $exp_date,"comments" => $comments,"c_file_path" => $location1,"certID" => $certID);
 			$statement= $db->prepare('UPDATE schoolforms.rcm_certification_v2 SET  certification=:certification,issue_date=:issue_date, exp_date=:exp_date, comments=:comments, c_file_path=:c_file_path WHERE id=:certID');
		} 
 	}	
	else
	 { 		 
		 $checkFile=true;	
		 $arr = array("certification" => $certification,"issue_date" => $issue_date,"exp_date" => $exp_date,"comments" => $comments,"certID" => $certID);
			 $statement= $db->prepare('UPDATE schoolforms.rcm_certification_v2 SET  certification=:certification, issue_date=:issue_date, exp_date=:exp_date, comments=:comments WHERE id=:certID');
	 }
		
   	if($statement->execute($arr))
	{  
		if($checkFile){echo json_encode("success");}else { echo json_encode("Error"); }
	}
	else
	{ echo json_encode("error");  }
}

function deleteCertification($db)
{
	$certID		=	$_POST['certID'];
	$arr = array("certID" => $certID);
  	$statement2= $db->prepare('SELECT c_file_path FROM schoolforms.rcm_certification_v2 WHERE id=:certID');
	$statement2->execute($arr);
	if($cert=$statement2->fetchAll(PDO::FETCH_ASSOC))
	{
 		unlink($cert[0]['c_file_path']); 
  	}
 	$statement= $db->prepare('DELETE FROM schoolforms.rcm_certification_v2 WHERE id=:certID');
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{  echo json_encode("error"); 	}
	
	$statement= $db->prepare('DELETE FROM schoolforms.rcm_notification_v2 WHERE doc_id=:certID');
	$statement->execute($arr);
	
}

function getAllCertification($db)
{
	$admin		=	$_POST['admin'];
	$arr = array("admin" => $admin);
   	$statement= $db->prepare('SELECT rcm_certification_v2.id as id,rcm_certification_v2.certification as certification,rcm_certification_v2.employeeID as 
employeeID,	rcm_certification_v2.issue_date as issue_date,	rcm_certification_v2.exp_date as exp_date,	
rcm_certification_v2.comments as comments,	rcm_certification_v2.c_file_path as c_file_path,rcm_employee_v2.emp_name as empname,
rcm_restaurant_v2.restaurant_name 
FROM	schoolforms.rcm_certification_v2 LEFT JOIN schoolforms.rcm_employee_v2 on rcm_certification_v2.employeeID=rcm_employee_v2.id  
LEFT join schoolforms.rcm_restaurant_v2 on rcm_employee_v2.resturant_id=rcm_restaurant_v2.id
WHERE rcm_certification_v2.admin=:admin order by id');
 	$statement->execute($arr);
 	if($cert=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($cert);
  	}
	else
	{  echo json_encode("No Records"); 	}
}

function getCertification($db)
{
	$certID		= $_POST['certID'];
	$arr		= array("certID" => $certID);
	$statement= $db->prepare('SELECT rcm_certification_v2.id as id,rcm_certification_v2.certification as certification,rcm_certification_v2.employeeID as employeeID,	rcm_certification_v2.issue_date as issue_date,	rcm_certification_v2.exp_date as exp_date,	rcm_certification_v2.comments as comments,	rcm_certification_v2.c_file_path as c_file_path,rcm_employee_v2.emp_name as empname FROM	schoolforms.rcm_certification_v2 LEFT JOIN schoolforms.rcm_employee_v2 on rcm_certification_v2.employeeID=rcm_employee_v2.id WHERE rcm_certification_v2.id=:certID');
 	$statement->execute($arr);
 	if($emp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($emp);
  	}
	else
	{  echo json_encode("No Records"); 	}
}

//	license permit
function AddLicense_permit($db)
{
	$data=json_decode(stripslashes($_POST['objArr']));
	
	$license		=	$data[0] -> license;
	$comments		=	$data[0] -> comments; 
	$IssuanceDate		=	$data[0] -> IssuanceDate; 
	$ExpirationDate		=	$data[0] -> ExpirationDate; 
	$admin				=	$data[0] -> admin; 
	$employeeID			=	$data[0] -> employeeID; 
	$doctype			=	$data[0] -> doctype; 

 	$lp_file_path="";
	$checkFile=false;
	if($_FILES["file"]["name"] != '')
	{
		$test = explode('.', $_FILES["file"]["name"]);
		$ext = end($test);
		$name = "LP-".rand(100, 9999999999).'-'.date("m-d-Y_H-i-s"). '.' . $ext;
		$location = '/home6/hiveletc/public_html/rcm/test/upload/'.$name;  
 		$lp_file_path = 'upload/'.$name;  
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $location))
		{
			$checkFile=true;
		} 
	} 
	else
	{
		$checkFile=true;
	}
	$arr = array();
	array_push($arr,$license,$comments,$lp_file_path,$IssuanceDate,$ExpirationDate,$admin,$employeeID,$doctype);	
   	$statement= $db->prepare('INSERT INTO schoolforms.rcm_license_permit_v2 (license, comments, lp_file_path, IssuanceDate, ExpirationDate,admin,employeeID,doctype) VALUES (?,?,?,?,?,?,?,?)');
	if($statement->execute($arr))
	{
 		if($checkFile)
		{
			$arr2 = array();
			$doc_id = $db->lastInsertId();
			array_push($arr2,'','rcm_license_permit_v2',$doc_id,'no',$admin);	
			$statement2= $db->prepare('INSERT INTO schoolforms.rcm_notification_v2 ( pool, doc_type, doc_id, is_notify,admin) VALUES (?,?,?,?,?)');
			$statement2->execute($arr2);
			
			echo json_encode("success");
		}
		else { echo json_encode("Error"); }
  	} else { echo json_encode("Error"); }
}

function UpdateLicense_permit($db)
{
	$data=json_decode(stripslashes($_POST['data']));
 	$LPID			=	$data[0] -> LPID;
 	$license		=	$data[0] -> license;
	$comments		=	$data[0] -> comments; 
	$IssuanceDate		=	$data[0] -> IssuanceDate; 
	$ExpirationDate		=	$data[0] -> ExpirationDate; 
	$lp_file_path="";
	$checkFile=false;

	if($_FILES["Ufile"]["name"] != '')
	{
		$test = explode('.', $_FILES["Ufile"]["name"]);
		$ext = end($test);
		$name = "LP-".rand(100, 9999999999999).'-'.date("m-d-Y_H-i-s"). '.' . $ext;
		$location = '/home6/hiveletc/public_html/rcm/test/upload/'.$name; 
 		$lp_file_path = 'upload/'.$name;  
		if(move_uploaded_file($_FILES["Ufile"]["tmp_name"], $location))	
		{
		   $checkFile=true;
		   $arr = array("license" => $license,"comments" => $comments,"lp_file_path" => $lp_file_path,"LPID" => $LPID,"IssuanceDate" => $IssuanceDate,"ExpirationDate" => $ExpirationDate);
  	$statement= $db->prepare('UPDATE schoolforms.rcm_license_permit_v2 SET  license=:license, comments=:comments, lp_file_path=:lp_file_path, IssuanceDate=:IssuanceDate , ExpirationDate=:ExpirationDate WHERE id=:LPID');
 		}
  	} 
	else
	{
		$checkFile=true;
		 $arr = array("license" => $license,"comments" => $comments,"LPID" => $LPID,"IssuanceDate" => $IssuanceDate,"ExpirationDate" => $ExpirationDate);
  	$statement= $db->prepare('UPDATE schoolforms.rcm_license_permit_v2 SET  license=:license, comments=:comments,IssuanceDate=:IssuanceDate , ExpirationDate=:ExpirationDate WHERE id=:LPID');
	}
    	
 	if($statement->execute($arr))
	{  
		if($checkFile){echo json_encode("success");}else { echo json_encode("Error"); }
	}
	else
	{ echo json_encode("error");  }
}

function deleteLicense_permit($db)
{
	$LPID		=	$_POST['LPID'];
	$arr = array("LPID" => $LPID);
	
	$statement2= $db->prepare('SELECT lp_file_path FROM schoolforms.rcm_license_permit_v2 WHERE id=:LPID');
	$statement2->execute($arr);
	if($lp=$statement2->fetchAll(PDO::FETCH_ASSOC))
	{
 		unlink($lp[0]['lp_file_path']); 
  	}  	
 	$statement= $db->prepare('DELETE FROM schoolforms.rcm_license_permit_v2 WHERE id=:LPID');
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{  echo json_encode("error"); 	}  
	
	$statement= $db->prepare('DELETE FROM schoolforms.rcm_notification_v2 WHERE doc_id=:LPID');
	$statement->execute($arr);	
}

function getAllLicense($db)
{
	$admin		=	$_POST['admin'];
	$arr = array("admin" => $admin);
  	//$statement= $db->prepare('SELECT u.*,rcm_employee_v2.emp_name as empname FROM	schoolforms.rcm_license_permit_v2 u  LEFT JOIN schoolforms.rcm_employee_v2 on u.employeeID=rcm_employee_v2.id  WHERE u.admin=:admin');

 	$statement= $db->prepare('SELECT u.*,rcm_employee_v2.emp_name as empname,rcm_restaurant_v2.restaurant_name  FROM	schoolforms.rcm_license_permit_v2 u  LEFT JOIN schoolforms.rcm_employee_v2 on u.employeeID=rcm_employee_v2.id LEFT join 
schoolforms.rcm_restaurant_v2 on rcm_employee_v2.resturant_id=rcm_restaurant_v2.id WHERE u.admin=:admin and  u.doctype="License"');
 	$statement->execute($arr);
 	if($LP=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($LP);
  	}
	else
	{  echo json_encode("No Records"); 	}
}


function getAllPermit($db)
{
	$admin		=	$_POST['admin'];
	$arr = array("admin" => $admin);

  	$statement= $db->prepare('SELECT u.*,rcm_employee_v2.emp_name as empname,rcm_restaurant_v2.restaurant_name  FROM	schoolforms.rcm_license_permit_v2 u  LEFT JOIN schoolforms.rcm_employee_v2 on u.employeeID=rcm_employee_v2.id LEFT join 
schoolforms.rcm_restaurant_v2 on rcm_employee_v2.resturant_id=rcm_restaurant_v2.id WHERE u.admin=:admin and  u.doctype="Permit"');
 	$statement->execute($arr);
 	if($LP=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($LP);
  	}
	else
	{  echo json_encode("No Records"); 	}
}

function getLicense_permit($db)
{
	$LPID		= $_POST['LPID'];
	$arr		= array("LPID" => $LPID);
	$statement= $db->prepare('SELECT u.*,rcm_employee_v2.emp_name as empname FROM	schoolforms.rcm_license_permit_v2 u  LEFT JOIN schoolforms.rcm_employee_v2 on u.employeeID=rcm_employee_v2.id  WHERE u.id=:LPID');
 	$statement->execute($arr);
 	if($LP=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($LP);
  	}
	else
	{  echo json_encode("No Records"); 	}
}


//	_inspection
function Add_inspection($db)
{
	
	$data=json_decode(stripslashes($_POST['objArr']));
	
	$inspection			=	$data[0] -> inspection;
	$date_of_inspection	=	$data[0] -> date_of_inspection; 
	$comments			=	$data[0] -> comments;  
	$admin				=	$data[0] -> admin;  
	$is_followUp		=	$data[0] -> is_followUp;  
	$followUp_date		=	$data[0] -> followUp_date;  
	$employeeID			=	$data[0] -> employeeID; 
	$InspectorName			=	$data[0] -> InspectorName;  
	$lp_file_path		=	""; 
	$checkFile=false;

 	if($_FILES["file"]["name"] != '')
	{
		$test = explode('.', $_FILES["file"]["name"]);
		$ext = end($test);
		$name = "IN-".rand(100, 9999999999).'-'.date("m-d-Y_H-i-s"). '.' . $ext;
		$location = '/home6/hiveletc/public_html/rcm/test/upload/'.$name; 
 		$lp_file_path = 'upload/' . $name;  
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $location))	
		{
		   $checkFile=true;
		} 
 	}
	else
	{
		 $checkFile=true;
	}
  	$statement= $db->prepare('INSERT INTO schoolforms.rcm_inspection_v2 (inspection, date_of_inspection, comments, insp_file_path,admin,is_followUp,followUp_date,employeeID,InspectorName) VALUES (?,?,?,?,?,?,?,?,?)');
	$arr = array();
	array_push($arr,$inspection,$date_of_inspection,$comments,$lp_file_path,$admin,$is_followUp,$followUp_date,$employeeID,$InspectorName);	
	if($statement->execute($arr))
	{
 		if($checkFile)
		{
			$arr2 = array();
			$doc_id = $db->lastInsertId();
			array_push($arr2,'','rcm_inspection_v2',$doc_id,'no',$admin);	
			$statement2= $db->prepare('INSERT INTO schoolforms.rcm_notification_v2 ( pool, doc_type, doc_id, is_notify,admin) VALUES (?,?,?,?,?)');
			$statement2->execute($arr2);
  			echo json_encode("success");
		}
		else { echo json_encode("Error"); }
   	} else { echo json_encode("Error"); }
}

function Update_inspection($db)
{
	$data=json_decode(stripslashes($_POST['data']));

	$inspID			=	$data[0] -> inspID; 
 	$inspection		=	$data[0] -> inspection;
	$date_of_inspection	=$data[0]-> date_of_inspection; 
	$comments		=	$data[0] -> comments;  
	
	$is_followUp	=	$data[0] -> is_followUp;  
	$followUp_date	=	$data[0] -> followUp_date;
	
	if($is_followUp=="false")
	{
 		$notifyarr = array("inspID" => $inspID);
  		$statementnotify= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET is_notify ="yes" WHERE doc_id=:inspID');
		$statementnotify->execute($notifyarr);
 	}	
	else
	{
		$notifyarr = array("inspID" => $inspID);
  		$statementnotify= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET is_notify ="no" WHERE doc_id=:inspID');
		$statementnotify->execute($notifyarr);
	}
	
	$lp_file_path="";
	$checkFile=false;
	if($_FILES["Ufile"]["name"] != '')
	{
		$test = explode('.', $_FILES["Ufile"]["name"]);
		$ext = end($test);
		$name = "IN-".rand(100, 9999999999999).'-'.date("m-d-Y_H-i-s"). '.' . $ext;
        $location = '/home6/hiveletc/public_html/rcm/test/upload/'.$name; 
 		$lp_file_path = 'upload/'.$name;  
		if(move_uploaded_file($_FILES["Ufile"]["tmp_name"], $location))	
		{
		   $checkFile=true;
		   $arr = array("inspID" => $inspID,"inspection" => $inspection,"date_of_inspection" => $date_of_inspection,"comments" => $comments,"insp_file_path" => $lp_file_path,"is_followUp" => $is_followUp,"followUp_date" => $followUp_date);
		   
 		   $statement= $db->prepare('UPDATE schoolforms.rcm_inspection_v2 SET  inspection=:inspection, date_of_inspection=:date_of_inspection, comments=:comments,insp_file_path=:insp_file_path,is_followUp=:is_followUp,followUp_date=:followUp_date WHERE id=:inspID');
		}
 	} 
	else
	{
		$checkFile=true;
	$arr = array("inspID" => $inspID,"inspection" => $inspection,"date_of_inspection" => $date_of_inspection,"comments" => $comments,"is_followUp" => $is_followUp,"followUp_date" => $followUp_date);
  	$statement= $db->prepare('UPDATE schoolforms.rcm_inspection_v2 SET  inspection=:inspection, date_of_inspection=:date_of_inspection, comments=:comments,is_followUp=:is_followUp,followUp_date=:followUp_date WHERE id=:inspID');
	}
 	
 	if($statement->execute($arr))
	{  
		if($checkFile){echo json_encode("success");}else { echo json_encode("Error"); }
	}
	else
	{ echo json_encode("error");  }
}

function delete_inspection($db)
{
	$inspID		=	$_POST['inspID'];
	$arr = array("inspID" => $inspID);
	
	$statement2= $db->prepare('SELECT insp_file_path FROM schoolforms.rcm_inspection_v2 WHERE id=:inspID');
	$statement2->execute($arr);
	if($lp=$statement2->fetchAll(PDO::FETCH_ASSOC))
	{
 		unlink($lp[0]['insp_file_path']); 
  	} 	
 	$statement= $db->prepare('DELETE FROM schoolforms.rcm_inspection_v2 WHERE id=:inspID');
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{  echo json_encode("error"); 	}  	
	
	$statement= $db->prepare('DELETE FROM schoolforms.rcm_notification_v2 WHERE doc_id=:inspID');
	$statement->execute($arr);	
}

function getAll_inspection($db)
{
	$admin		=	$_POST['admin'];
	$arr = array("admin" => $admin);
   	$statement= $db->prepare('SELECT u.*,rcm_employee_v2.emp_name as empname,rcm_restaurant_v2.restaurant_name FROM schoolforms.rcm_inspection_v2 u LEFT JOIN schoolforms.rcm_employee_v2 on u.employeeID=rcm_employee_v2.id inner join schoolforms.rcm_restaurant_v2 on rcm_employee_v2.resturant_id=rcm_restaurant_v2.id  WHERE u.admin=:admin');
 	$statement->execute($arr);
 	if($LP=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($LP);
  	}
	else
	{  echo json_encode("No Records"); 	}
}

function get_inspection($db)
{
	$inspID		= $_POST['inspID'];
	$arr		= array("inspID" => $inspID);
	$statement= $db->prepare('SELECT u.*,rcm_employee_v2.emp_name as empname FROM schoolforms.rcm_inspection_v2 u
 LEFT JOIN schoolforms.rcm_employee_v2 on u.employeeID=rcm_employee_v2.id  WHERE u.id=:inspID');
 	$statement->execute($arr);
 	if($insp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($insp);
  	}
	else
	{  echo json_encode("No Records"); 	}
}

 
function getProfile($db)
{
	$admin		= $_POST['admin'];
	$arr		= array("admin" => $admin);
	$statement= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE id=:admin');
 	$statement->execute($arr);
 	if($insp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($insp);
  	}
	else
	{  echo json_encode("No Records"); 	}
}

function UpdateProfile($db)
{
	$firstName	=	$_POST['firstName'];
	$lastName	=	$_POST['lastName'];
	$email		=	$_POST['email'];
	$admin		=	$_POST['admin']; 
	
	$arr = array("firstName" => $firstName,"lastName" => $lastName,"email" => $email,"admin" => $admin);
 	$statement= $db->prepare('UPDATE schoolforms.rcm_users_v2 SET fname=:firstName, lname=:lastName, email=:email  WHERE id=:admin');
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{ echo json_encode("error");  }

} 

function UpdatePassword($db)
{
	$admin		=	$_POST['admin'];
	$oldPass	=	$_POST['oldPass'];
	$newPass	=	$_POST['newPass']; 
	
	$arr2 = array("oldPass" => $oldPass,"admin" => $admin);
	$statement2= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE id=:admin and pwd=:oldPass');
 	$statement2->execute($arr2);
 	if($emp2=$statement2->fetchAll(PDO::FETCH_ASSOC))
	{
		$arr = array("newPass" => $newPass,"admin" => $admin);
		$statement= $db->prepare('UPDATE schoolforms.rcm_users_v2 SET pwd=:newPass  WHERE id=:admin');
		if($statement->execute($arr))
		{  
			echo json_encode("success");
		}
		else
		{ echo json_encode("error");  }
	}
	else
		{ echo json_encode("error");  }
	
	
 }

function AddNotifyEmail($db)
{
	$admin			=	$_POST['admin'];
	$email			=	$_POST['email']; 
	$fname			=	$_POST['fname']; 
	$lname			=	$_POST['lname']; 	
	$arr2 = array("admin" => $admin,"email" => $email);
	$statement2= $db->prepare('SELECT * FROM schoolforms.rcm_notify_email_v2 WHERE admin=:admin and email=:email');
 	$statement2->execute($arr2);
 	if($emp2=$statement2->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode("Exist");
	}
	else
	{
		$statement= $db->prepare('INSERT INTO schoolforms.rcm_notify_email_v2 (admin, email,fname,lname) VALUES (?,?,?,?)');
		$arr = array();
		array_push($arr,$admin,$email,$fname,$lname);	
		if($statement->execute($arr))
		{  
			echo json_encode("success");
		}
		else
		{ echo json_encode("error");  }
	}
}
 
function GetNotifyEmail($db)
{	
	$admin		= $_POST['admin'];
	$arr		= array("admin" => $admin);
	$statement= $db->prepare('SELECT * FROM	schoolforms.rcm_notify_email_v2 WHERE admin=:admin');
 	$statement->execute($arr);
 	if($emp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($emp);
  	}
	else
	{  echo json_encode("No Records"); 	}
 }

function  DeleteNotifyEmail($db)
{	
	$DeleteID		= $_POST['DeleteID'];
	$arr			= array("DeleteID" => $DeleteID);
	$statement= $db->prepare('DELETE FROM schoolforms.rcm_notify_email_v2 WHERE id=:DeleteID');
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{  echo json_encode("error"); 	}  	

}
 

function AddVendor($db)
{
	$admin			=$_POST['admin'];
	$FirstName		=$_POST['FirstName']; 
	/*$LastName		=$_POST['LastName']; */
	$EmailAddress	=$_POST['EmailAddress']; 
	$PhoneNumber	=$_POST['PhoneNumber']; 
	$CompanyName	=$_POST['CompanyName']; 
	$Expertise		=$_POST['Expertise'];  
	$statement= $db->prepare('INSERT INTO schoolforms.rcm_vendor_v2 (FirstName, EmailAddress, PhoneNumber, CompanyName, Expertise, admin) VALUES (?,?,?,?,?,?)');
	$arr = array();
	array_push($arr,$FirstName,$EmailAddress,$PhoneNumber,$CompanyName,$Expertise,$admin);	
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{ echo json_encode("error");  }
	 
}


function GetAllVendor($db)
{	
	$admin		= $_POST['admin'];
	$arr		= array("admin" => $admin);
	$statement= $db->prepare('SELECT * FROM	schoolforms.rcm_vendor_v2 WHERE admin=:admin');
 	$statement->execute($arr);
 	if($emp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($emp);
  	}
	else
	{  echo json_encode("No Records"); 	}
 }


function DeleteVendor($db)
{	
	$DeleteID		= $_POST['DeleteID'];
	$arr			= array("DeleteID" => $DeleteID);
	$statement= $db->prepare('DELETE FROM schoolforms.rcm_vendor_v2 WHERE id=:DeleteID');
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{  echo json_encode("error"); 	}  	
 }
 
 
 
function Addtask($db)
{
	$admin			=$_POST['admin'];
	$DateOfTask		=$_POST['DateOfTask']; 
	$TaskType		=$_POST['TaskType']; 
	$TaskPriority	=$_POST['TaskPriority'];
	$DateOfTaskCompletion = "";
	/*$DateOfTaskCompletion	=$_POST['DateOfTaskCompletion'];*/ 
	$TaskStatus	="Pending"; 
	
	$statement= $db->prepare('INSERT INTO schoolforms.rcm_tasks_v2 ( taskdate, tasktype, taskpriority, taskcompdate, admin, Status) VALUES ( ?,?,?,?,?,?)');

	$arrtask = array();
	array_push($arrtask,$DateOfTask,$TaskType,$TaskPriority,$DateOfTaskCompletion,$admin,$TaskStatus);	
	if($statement->execute($arrtask))
	{  
		echo json_encode("success");
	}
	else
	{ echo json_encode("error");  }
	 
}
 
function GetAlltask($db)
{	
	$admin		= $_POST['admin'];
	$arrtask2		= array("admin" => $admin);
	$statement= $db->prepare('SELECT * FROM	schoolforms.rcm_tasks_v2 WHERE admin=:admin order by id desc');
 	$statement->execute($arrtask2);
 	if($emp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($emp);
  	}
	else
	{  echo json_encode("No Records"); 	}
 }
 
function GetTask($db)
{	
	$TaskID = $_POST['TaskID'];
	$arrTaskID		= array("TaskID" => $TaskID);
	$statement= $db->prepare('SELECT * FROM	schoolforms.rcm_tasks_v2 WHERE id=:TaskID');
 	$statement->execute($arrTaskID);
 	if($tasks=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($tasks);
  	}
	else
	{  echo json_encode("No Records"); 	}
 }
 
function deletTask($db)
{
	$userID		=	$_POST['DeleteID'];
	$arr = array("userID" => $userID);
 	$statement= $db->prepare('DELETE FROM schoolforms.rcm_tasks_v2 WHERE id=:userID');
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{  echo json_encode("error"); 	}  	
}
 
 
function updatetask($db)
{
	
	
	
	$TaskNamePOP = $_POST['TaskNamePOP'];
    $TaskPriorityPop = $_POST['TaskPriorityPop'];
    $TaskStatusPop = $_POST['TaskStatusPop'];
	$userID		=	$_POST['TaskID'];
	$TaskCompletion = $_POST['TaskCompletion'];
	
	$arrC = array("userID" => $userID,"TaskNamePOP" => $TaskNamePOP,"TaskPriorityPop" => $TaskPriorityPop,"TaskStatusPop" => $TaskStatusPop,"TaskCompletion" => $TaskCompletion);
	
 	$statement= $db->prepare('UPDATE schoolforms.rcm_tasks_v2 SET	tasktype = :TaskNamePOP, taskpriority = :TaskPriorityPop, Status = :TaskStatusPop, taskcompdate =:TaskCompletion WHERE id=:userID ;');
	if($statement->execute($arrC))
	{  
		echo json_encode("success");
	}
	else
	{  echo json_encode("error"); 	}  	
	
}

 
function AddRestaurant($db)
{
	$restuarant = $_POST['hotelname'];
    $admin = $_POST["admin"];	
	$statement= $db->prepare('INSERT INTO schoolforms.rcm_restaurant_v2	(restaurant_name,user) VALUES (?,?)');

	$arrestaurant = array();
	array_push($arrestaurant,$restuarant,$admin);
		
	if($statement->execute($arrestaurant))
	{  
		echo json_encode("success");
	}
	else
	{ echo json_encode("error");  }
	 
}

function GetRestaurant($db)
{	
	$admin = $_POST['admin'];
	$arrest		= array("admin" => $admin);
	$statement= $db->prepare('SELECT * FROM	schoolforms.rcm_restaurant_v2 WHERE user=:admin');
 	$statement->execute($arrest);
 	if($emp=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($emp);
  	}
	else
	{  echo json_encode("No Records"); 	}
 }
 
function GetRestaurant2($db)
{	
	$restID = $_POST['restID'];
	$arrestID		= array("restID" => $restID);
	$statement= $db->prepare('SELECT * FROM	schoolforms.rcm_restaurant_v2 WHERE id=:restID');
 	$statement->execute($arrestID);
 	if($resturants=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($resturants);
  	}
	else
	{  echo json_encode("No Records"); 	}
 }
 
 function UpdateRest($db)
{
	$updaterest	=	$_POST['updaterest1'];
	$restID =$_POST['restID'];
	
	$arr = array("restaurant_name" => $updaterest,"restID" => $restID);
	
 	$statement= $db->prepare('UPDATE schoolforms.rcm_restaurant_v2 SET restaurant_name=:restaurant_name  WHERE id=:restID');
	if($statement->execute($arr))
	{  
		echo json_encode("success");
	}
	else
	{ echo json_encode("error");  }

}


function GetRestaurantAll($db)
{
	$User	=	$_POST['admin'];
	
	$arr = array("username" => $User);
	
 	$statement= $db->prepare('SELECT * FROM	schoolforms.rcm_restaurant_v2 WHERE user=:username');
	
	$statement->execute($arr);
	if($resturants=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		echo json_encode($resturants);
  	}
	else
	{  echo json_encode("No Records"); 	}

}
 
 
function getAlldocsdata($db)
{
	
	
	$restName = $_POST['restName'];
	$userID = $_POST['userID'];
	
	$arrNew = array("restName" => $restName,"userID" => $userID);
	
	$statementEmp= $db->prepare("SELECT rcm_employee_v2.id,rcm_employee_v2.employee_id,rcm_employee_v2.emp_name,rcm_restaurant_v2.restaurant_name,rcm_employee_v2.title,	
rcm_employee_v2.joining_date FROM schoolforms.rcm_employee_v2 inner join schoolforms.rcm_restaurant_v2 on rcm_employee_v2.resturant_id=rcm_restaurant_v2.id where rcm_restaurant_v2.user=:userID and rcm_restaurant_v2.restaurant_name=:restName");

    $statementEmp->execute($arrNew);
	$employee=$statementEmp->fetchAll(PDO::FETCH_ASSOC);
	$formatEmployee = array();
	//$colnames = array("ID, Employee ID, Employee Name, Restaurant Name, Titlle, Date of Hire");
	//array_push($formatEmployee, $colnames);
	
		foreach ($employee as $emp) {
 			
 			$arr = array("userID" => $emp['id']);			
			$UserData=array();
 			$emp = implode(', ', $emp);
			array_push($UserData,$emp);
					 
			$certification= $db->prepare('SELECT certification,issue_date,exp_date FROM schoolforms.rcm_certification_v2 
			where employeeID=:userID'); 
		$certification->execute($arr);
			if($certificates=$certification->fetchAll(PDO::FETCH_ASSOC))
			{
				 foreach ($certificates as $certificate)
				 {
					 $tags = implode(', ', $certificate);
				 	 array_push($UserData,$tags);
				 }
 			}
			
			
			$statementPermit= $db->prepare('SELECT license,IssuanceDate,ExpirationDate FROM schoolforms.rcm_license_permit_v2 where  employeeID=:userID and doctype="Permit"'); 
			
			$statementPermit->execute($arr);
			if($Permits=$statementPermit->fetchAll(PDO::FETCH_ASSOC))
			{
				 foreach ($Permits as $Permit)
				 {
					 $tags = implode(', ', $Permit);
				 	 array_push($UserData,$tags);
				 }
 			} 
			
 			$statementLicense= $db->prepare('SELECT license,IssuanceDate,ExpirationDate FROM schoolforms.rcm_license_permit_v2 where  employeeID=:userID and doctype="License"'); 
			
			$statementLicense->execute($arr);
			if($Licenses=$statementLicense->fetchAll(PDO::FETCH_ASSOC))
			{
				 foreach ($Licenses as $License)
				 {
					 $tags = implode(', ', $License);
				 	 array_push($UserData,$tags);
				 }
 			} 
			
			
			array_push($formatEmployee,$UserData); 
 		} 
		
		
	    echo json_encode($formatEmployee); 
} 


 ?>