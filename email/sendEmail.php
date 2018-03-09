<?php

header('Access-Control-Allow-Origin: *');  
include("class.phpmailer.php");

$db = getConnection();


	$emailID		= $_POST['emailID'];
	$admin			= $_POST['admin'];
	
	//emaiTo emaiCC emaiBC Fromemail2
	$emaiTo			= $_POST['emaiTo2'];
	$emaiCC			= $_POST['emaiCC2'];
	$emaiBC			= $_POST['emaiBC2'];
	$Fromemail			= $_POST['Fromemail2'];
 
	//$emailID		= '76';
	$doc			= $_POST['doc'];
	//$doc			= "inspection";
	$arr			= array("emailID" => $emailID);
	$data="";
	$attachment="";
	$Subject="";
	if($doc=="inspection")
	{
		$Subject = 'Inspection Details';
		$statement= $db->prepare('SELECT * FROM schoolforms.rcm_inspection_v2 where id=:emailID');
		$statement->execute($arr);
		if($d=$statement->fetchAll(PDO::FETCH_ASSOC))
		{
 			$data = 'Name: '.$d[0]['inspection'];
			$data .='<br/> Date of inspection: '.$d[0]['date_of_inspection'];
		
			if($d[0]['is_followUp']=="true")
			{
				$data .='<br/> Follow up date: '.$d[0]['followUp_date'];
			}
			if($d[0]['comments']!="")
			{
				$data .='<br/> Comments: '.$d[0]['comments'];
			}
			if($d[0]['insp_file_path']!="")
			{
				$attachment =$d[0]['insp_file_path'];
			}
  		} 
		
  	}
	
	if($doc=="certification")
	{
		$Subject = 'Certification Details';
		$statement= $db->prepare('SELECT * FROM schoolforms.rcm_certification_v2 where id=:emailID');
		$statement->execute($arr);
		if($d=$statement->fetchAll(PDO::FETCH_ASSOC))
		{ 
			$data = 'Name: '.$d[0]['certification'];
			$data .='<br/> Issuance Date: '.$d[0]['issue_date'];
			$data .='<br/> Expiration Date: '.$d[0]['exp_date'];
 			if($d[0]['comments']!="")
			{
				$data .='<br/> Comments: '.$d[0]['comments'];
			}
			if($d[0]['c_file_path']!="")
			{
				$attachment =$d[0]['c_file_path'];
			} 
		} 
   	}
	if($doc=="License_permit")
	{
		$Subject = 'License/Permit Details';
 		$statement= $db->prepare('SELECT * FROM schoolforms.rcm_license_permit_v2 where id=:emailID');
		$statement->execute($arr);
		if($d=$statement->fetchAll(PDO::FETCH_ASSOC))
		{ 
			$data = 'Name: '.$d[0]['license'];
			$data .='<br/> Issuance Date: '.$d[0]['IssuanceDate'];
			$data .='<br/> Expiration Date: '.$d[0]['ExpirationDate'];
 			if($d[0]['comments']!="")
			{
				$data .='<br/> Comments: '.$d[0]['comments'];
			}
			if($d[0]['lp_file_path']!="")
			{
				$attachment =$d[0]['lp_file_path'];
			} 
		} 
   	}
	
	  
   	$mail = new PHPMailer();  
	$mail->From ="info@hivelet.com";
	$mail->FromName ="RCM Tool"; 

	//$mail->From =$Fromemail;
	//$mail->FromName =$admin; 
	$mail->addAddress($emaiTo,"To User");
 	$mail->AddBCC($emaiBC, "BCC User");
	$mail->AddCC($emaiCC, "CC User");
	
	$mail->addReplyTo("noreply@hivelet.com", "RCM Tool");
	$mail->addAttachment('/home6/hiveletc/public_html/rcm/'.$attachment,substr($attachment,7));

	$mail->isHTML(true);
	$mail->Subject =$Subject; 
 	$mail->Body = "Hi, <br/><br/>Please find below the details of the record which has been emailed to you from <a href='hivelet.com/rcm/'>RCM Tool</a>
	<br/><br/>
	".$data."
 	<br/><br/>Thank You.";
 	 
	$mail->AltBody = "Error";

	if(!$mail->Send()) 
	{
	 	echo json_encode("Error");
	} 
	else 
	{  		
		echo json_encode("success");
	} 




?>