<?php

header('Access-Control-Allow-Origin: *');  
include("class.phpmailer.php");
$db =getConnection();

 
function Docs($db)
{  

	$statement= $db->prepare("select * FROM schoolforms.rcm_users_v2");
 	$statement->execute();
	
	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{	

$Totallp =array('ABC Manger License','Business License','Food Safety Facility Permit','Liquor License');

$Totalcertificate = array('TIPs Certification','Certificate of Occupancy','Food Service Manager Certification','Food Safety Handler Certification');

$TotalInspection =array('Health Inspection');
 

		foreach($data as $d)
		{
				$id = array("admin" => $d['id']);
			$UserData=array();
				array_push($UserData,$d['id'],$d['fname'],$d['email']);


				$UTotalcertificate = $Totalcertificate;
				$UTotalLP = $Totallp;
				$UTotalInspection = $TotalInspection;

			// rcm_certification
				$statement1= $db->prepare("select DISTINCT(certification),admin FROM schoolforms.rcm_certification_v2 where admin=:admin");
			$statement1->execute($id);
			if($certification=$statement1->fetchAll(PDO::FETCH_ASSOC))
			{
				foreach($certification as $c)
				{
 					if (($key = array_search($c['certification'], $UTotalcertificate)) !== false) {
					    unset($UTotalcertificate[$key]);
					}
				}
			} 

				$statement2= $db->prepare("select DISTINCT(license),admin FROM schoolforms.rcm_license_permit_v2 where admin=:admin");
			$statement2->execute($id);
			if($certification2=$statement2->fetchAll(PDO::FETCH_ASSOC))
			{
				foreach($certification2 as $c2)
				{
					if (($key2 = array_search($c2['license'], $UTotalLP)) !== false) {
					    unset($UTotalLP[$key2]);
					}
				}
			} 

			// TotalInspection
			$statement3= $db->prepare("select DISTINCT(inspection),admin FROM schoolforms.rcm_inspection_v2 where admin=:admin");
			$statement3->execute($id);
			if($certification3=$statement3->fetchAll(PDO::FETCH_ASSOC))
			{
				foreach($certification3 as $c3)
				{
					if (($key3 = array_search($c3['inspection'], $UTotalInspection)) !== false) {
					    unset($UTotalInspection[$key3]);
					}
				}
			} 

				array_push($UserData,$UTotalcertificate);
				array_push($UserData,$UTotalLP);
				array_push($UserData,$UTotalInspection);

	sendEmail($UserData,$db);
  
		}
   	}  	
} 
 
 //30 Days Pool  
function sendEmail($emailData,$db)
{
	//print_r($emailData);
	$userID=$emailData[0];
	$fname=$emailData[1];
	$email=$emailData[2];
 	 unset($emailData[0]);
	 unset($emailData[1]);
	 unset($emailData[2]);
	 $data=""; 

 	 foreach($emailData as $d =>$val)
	 {
 	 	foreach($val as $k)
	 	{
	 		$data .="<li>".$k."</li>";
	 	}
	 }	 
   
  
  	$mail = new PHPMailer();  
	$mail->From ="info@hivelet.com";
	$mail->FromName ="RCM Tool"; 
	$mail->addReplyTo("noreply@hivelet.com", "RCM Tool");
	$mail->isHTML(true);
	$mail->Subject = "Missing Items";
 	$mail->AltBody = "Error"; 
 
 	$mail->AddAddress($email, $fname);
	$mail->Body = "Hi ".$fname.", <br/><br/> Please see below the un-entered items. 
	<br/><br/>
	<ol>".$data."</ol>
	<a href='hivelet.com/rcm/test'>Click here</a> to access RCM Tool and enter the missing items.<br/><br/>Thank You.";
	
	if(!$mail->Send()) 
	{
		echo json_encode("Error");
	} 
	else 
	{  		
		//echo json_encode("Success");
	}
	 
}
 
 

 Docs($db);
?>