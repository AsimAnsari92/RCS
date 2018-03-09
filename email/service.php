<?php

header('Access-Control-Allow-Origin: *');
include("class.phpmailer.php");

$db =getConnection();

function rcm_certification($db)
{
	$statement= $db->prepare('SELECT rcm_notification_v2.id,rcm_certification_v2.exp_date, rcm_notification_v2.pool,rcm_notification_v2.doc_type,	rcm_notification_v2.doc_id,rcm_notification_v2.is_notify from rcm_certification_v2 inner join rcm_notification_v2 on rcm_certification_v2.id=rcm_notification_v2.doc_id');
 	$statement->execute();
 	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		$Today = date("Y-m-d");
 		foreach($data as $d)
		{
			$fromDate = $d['exp_date'];
 			$daysLeft = abs(strtotime($Today) - strtotime($fromDate));
			$days = $daysLeft/(60 * 60 * 24);
 			//printf(" Days difference between certification %s and %s = %d ", $fromDate, $Today, $days);
		if($Today<$d['exp_date'])
		{
				if($days>=0 && $days<31)
				{
					//echo "<br>"."30Pool <br>";	
					if($d['pool']!='30Pool' || $d['is_notify']=="no")
					{
						$arr = array("pool" => "30Pool","is_notify" => "no","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					}
					
				}
				if($days>30 && $days<61)
				{
					//echo "<br>"."60Pool <br>";
					if($d['pool']!='60Pool' || $d['is_notify']=="no")
					{
						$arr = array("pool" => "60Pool","is_notify" => "no","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					}
				}
				if($days>60 && $days<91)
				{
					 //echo "<br>"."90Pool <br>";
					 if($d['pool']!='90Pool' || $d['is_notify']=="no")
					{
						$arr = array("pool" => "90Pool","is_notify" => "no","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					}
				}
				if($days>90)
				{
					// echo "<br>"."OUT <br>";
						$arr = array("pool" => "","is_notify" => "yes","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					
				}
		}
		else
		{
			if($d['pool']!='pastDue' || $d['is_notify']=="no")
			{
				//echo "<br>"."PastDue <br>";
				$arr = array("pool" => "pastDue","is_notify" => "no","nid" => $d['id']);
				$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
				$statement->execute($arr);
			}
		}
		
		
 		}
  	}  	
} 
 
function rcm_license_permit($db)
{
	$statement= $db->prepare('SELECT  rcm_notification_v2.id ,rcm_license_permit_v2.ExpirationDate, rcm_notification_v2.pool,rcm_notification_v2.doc_type,rcm_notification_v2.doc_id,rcm_notification_v2.is_notify 
from rcm_license_permit_v2 inner join rcm_notification_v2 on rcm_license_permit_v2.id=rcm_notification_v2.doc_id');
 	$statement->execute();
 	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		$Today = date("Y-m-d");
 		foreach($data as $d)
		{
			$fromDate = $d['ExpirationDate'];
 			$daysLeft = abs(strtotime($Today) - strtotime($fromDate));
			$days = $daysLeft/(60 * 60 * 24);
 			//printf(" Days difference between license/permit %s and %s = %d", $fromDate, $Today, $days);
			
		if($Today<$d['ExpirationDate'])
		{
				if($days>=0 && $days<31)
				{
					//echo "<br>"."30Pool <br>";	
					if($d['pool']!='30Pool' || $d['is_notify']=="no")
					{
						$arr = array("pool" => "30Pool","is_notify" => "no","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					}
				}
				if($days>30 && $days<61)
				{
					//echo "<br>"."60Pool <br>";
					if($d['pool']!='60Pool' || $d['is_notify']=="no")
					{
						$arr = array("pool" => "60Pool","is_notify" => "no","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					}
				}
				if($days>60 && $days<91)
				{
					 //echo "<br>"."90Pool <br>";
					if($d['pool']!='90Pool' || $d['is_notify']=="no")
					{
						$arr = array("pool" => "90Pool","is_notify" => "no","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					}
				}
				if($days>90)
				{
					 //echo "<br>"."OUT <br>";
						$arr = array("pool" => "","is_notify" => "yes","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					
				}
		}
		else
		{
			if($d['pool']!='pastDue' || $d['is_notify']=="no")
			{
				//echo "<br>"."Pass Due <br>";
				$arr = array("pool" => "pastDue","is_notify" => "no","nid" => $d['id']);
				$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
				$statement->execute($arr);
			}
		}
		
  		}
  	}  	
} 
 
 
function rcm_inspection($db)
{
	$statement= $db->prepare('SELECT  rcm_notification_v2.id ,rcm_inspection_v2.followUp_date,  	rcm_notification_v2.pool,rcm_notification_v2.doc_type,rcm_notification_v2.doc_id,rcm_notification_v2.is_notify from rcm_inspection_v2 inner join rcm_notification_v2 on rcm_inspection_v2.id=rcm_notification_v2.doc_id where rcm_inspection_v2.is_followUp="true"');
 	$statement->execute();
 	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		$Today = date("Y-m-d");
 		foreach($data as $d)
		{
			$fromDate = $d['followUp_date'];
 			$daysLeft = abs(strtotime($Today) - strtotime($fromDate));
			$days = $daysLeft/(60 * 60 * 24);
 			//printf(" Days difference between inspection %s and %s = %d", $fromDate, $Today, $days);
			
		if($Today<$d['followUp_date'])
		{
				if($days>=0 && $days<31)
				{
					//echo "<br>"."30Pool <br>";	
					if($d['pool']!='30Pool' || $d['is_notify']=="no")
					{
						$arr = array("pool" => "30Pool","is_notify" => "no","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					}
				}
				if($days>30 && $days<61)
				{
					//echo "<br>"."60Pool <br>";
					if($d['pool']!='60Pool' || $d['is_notify']=="no")
					{
						$arr = array("pool" => "60Pool","is_notify" => "no","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					}
				}
				if($days>60 && $days<91)
				{
					 //echo "<br>"."90Pool <br>";
					if($d['pool']!='90Pool' || $d['is_notify']=="no")
					{
						$arr = array("pool" => "90Pool","is_notify" => "no","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					}
				}
				if($days>90)
				{
					// echo "<br>"."OUT <br>";
						$arr = array("pool" => "","is_notify" => "yes","nid" => $d['id']);
						$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
						$statement->execute($arr);
					
				}
		}
		else
		{
			if($d['pool']!='pastDue' || $d['is_notify']=="no")
			{
				//echo "<br>"."Pass Due <br>";
				$arr = array("pool" => "pastDue","is_notify" => "no","nid" => $d['id']);
				$statement= $db->prepare('UPDATE schoolforms.rcm_notification_v2 SET  pool=:pool, is_notify=:is_notify WHERE id=:nid');
				$statement->execute($arr);
			}
		}
		
  		}
  	}  	
} 
 


function rcm_weeklyNotify($db)
{
	$statement= $db->prepare("select * FROM schoolforms.rcm_notification_v2 where rcm_notification_v2.pool='30Pool' ");
 	$statement->execute();
 	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		if(date('D')=="Mon")
		{
 			foreach($data as $d)
			{
 				if($d['pool']=='30Pool')
				{
					$arr = array("is_notify" => "no","nid" => $d['id']);
					$statement= $db->prepare('update schoolforms.rcm_notification_v2 SET is_notify=:is_notify WHERE id=:nid');
					$statement->execute($arr);
				}
			}

		}
	}

}


rcm_license_permit($db);
rcm_certification($db);
rcm_inspection($db);
rcm_weeklyNotify($db);


?>