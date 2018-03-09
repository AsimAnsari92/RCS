<?php

header('Access-Control-Allow-Origin: *');  
include("class.phpmailer.php");
$db =getConnection();

 
function Pool30($db)
{ 
	$statement= $db->prepare("SELECT id as noteID,pool,doc_type,doc_id,is_notify,admin FROM schoolforms.rcm_notification_v2 where is_notify='no'    	 	and pool='30Pool' group by admin");
 	$statement->execute();
	
	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{	
		foreach($data as $d)
		{
 			$userData = array("admin" => $d['admin']);
			$Ustatement= $db->prepare("SELECT  rcm_notification_v2.id as id ,  rcm_notification_v2.pool,rcm_notification_v2.doc_type,
			rcm_notification_v2.doc_id,rcm_notification_v2.is_notify,rcm_users_v2.id as userID,rcm_users_v2.fname, rcm_users_v2.lname,rcm_users_v2.email from rcm_users_v2 inner join rcm_notification_v2 on rcm_users_v2.id=rcm_notification_v2.admin where rcm_notification_v2.pool='30Pool' and rcm_notification_v2.admin=:admin order by rcm_notification_v2.is_notify");
 			$Ustatement->execute($userData);
			if($user=$Ustatement->fetchAll(PDO::FETCH_ASSOC))
			{
				$UserData=array();
				array_push($UserData,$user[0]['fname'],$user[0]['email'],$user[0]['userID']);
 				foreach($user as $u)
				{
 					$Docs = array("doc_id"=>$u['doc_id']);
 					if($u['doc_type']=="rcm_license_permit_v2")
					{
						$Docsstatement1= $db->prepare("SELECT license FROM schoolforms.rcm_license_permit_v2 WHERE id=:doc_id");
						$Docsstatement1->execute($Docs);
						if($UserData1=$Docsstatement1->fetchAll(PDO::FETCH_ASSOC))
						{
							$UserData1=array("docs"=>$UserData1[0]['license'],"Title"=>'Permit/License');
  							array_push($UserData,$UserData1);
							$Updatestatement= $db->prepare("UPDATE schoolforms.rcm_notification_v2 SET is_notify='yes' where 														  			 				rcm_notification_v2.doc_id=:doc_id");
 							$Updatestatement->execute($Docs);
 						}
					}
					if($u['doc_type']=="rcm_certification_v2")
					{
						$Docsstatement2= $db->prepare("SELECT rcm_certification_v2.id as id,rcm_certification_v2.certification as  	 	 																								 						certification,rcm_certification_v2.employeeID as employeeID, rcm_certification_v2.issue_date as issue_date,	 		rcm_certification_v2.exp_date as exp_date,	rcm_certification_v2.comments as comments,	 rcm_certification_v2.c_file_path as c_file_path FROM schoolforms.rcm_certification_v2   WHERE rcm_certification_v2.id=:doc_id");
						$Docsstatement2->execute($Docs);
						if($UserData2=$Docsstatement2->fetchAll(PDO::FETCH_ASSOC))
						{ 
							$UserData2=array("docs"=>$UserData2[0]['certification'],"Title"=>$UserData2[0]['empname']);
  							array_push($UserData,$UserData2);
							$Updatestatement= $db->prepare("UPDATE schoolforms.rcm_notification_v2 SET is_notify='yes' where 														  			 				rcm_notification_v2.doc_id=:doc_id");
 							$Updatestatement->execute($Docs);						
						}
  					}
 					if($u['doc_type']=="rcm_inspection_v2")
					{
						$Docsstatement3= $db->prepare("SELECT inspection FROM schoolforms.rcm_inspection_v2 WHERE id=:doc_id");
						$Docsstatement3->execute($Docs);
						if($UserData3=$Docsstatement3->fetchAll(PDO::FETCH_ASSOC))
						{ 
							$UserData3=array("docs"=>$UserData3[0]['inspection'],"Title"=>'Inspection');
  							array_push($UserData,$UserData3);
							$Updatestatement= $db->prepare("UPDATE schoolforms.rcm_notification_v2 SET is_notify='yes' where 														  			 				rcm_notification_v2.doc_id=:doc_id");
 							$Updatestatement->execute($Docs);
						}
  					}
				}
				sendEmail($UserData,$db);
			}
		}
		 
  	}  	
} 
 
 //30 Days Pool  
function sendEmail($emailData,$db)
{
	$fname=$emailData[0];
	$email=$emailData[1];
	$userID=$emailData[2];
 
 	 unset($emailData[0]);
	 unset($emailData[1]);
	 unset($emailData[2]);
	 $data=""; 
 	 foreach($emailData as $d)
	 {
		 $data .="<li>".$d['docs']."</li>";
	 }	 
  	$mail = new PHPMailer();  
	$mail->From ="info@hivelet.com";
	$mail->FromName ="RCM Tool"; 
	$mail->addReplyTo("noreply@hivelet.com", "RCM Tool");
	$mail->isHTML(true);
	$mail->Subject = "30 Days Until Expiration"; 
 	$mail->AltBody = "Error";
	
	$statement= $db->prepare("SELECT email,fname FROM schoolforms.rcm_notify_email_v2 where admin=:admin");
 	$userData = array("admin" => $userID);
	$statement->execute($userData);
	$user=$statement->fetchAll(PDO::FETCH_ASSOC);
 	array_push($user,array("email"=>$email,"fname"=>$fname));
 	
 	foreach($user as $u)
	{
 		$mail2 = clone $mail;
 		$mail2->AddAddress($u["email"], $u["fname"]);
		$mail2->Body = "Hi ".$u["fname"].", <br/><br/> You have the following items that are 30 days away from its expiration date. 
		<br/><br/>
		<ol>".$data."</ol>
		<br/>
		Please <a href='hivelet.com/rcm/test/'>click here</a> to access RCM Tool and view the details. <br/><br/>Thank You.";
 		if(!$mail2->Send()) 
		{
			echo json_encode("Error");
		} 
		else 
		{  		
			echo json_encode($u["email"]." ");
		}
		
	}

	
}
Pool30($db);





?>