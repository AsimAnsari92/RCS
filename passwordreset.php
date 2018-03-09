<?php

header('Access-Control-Allow-Origin:*');

include("email/class.phpmailer.php");

$db =getConnection();


function encryptIt( $q ) {
    $cryptKey  = 'B3rmuda-01102017-0102PM';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
     return( $qEncoded );
}

function decryptIt( $q ) {

    $cryptKey  = 'B3rmuda-01102017-0102PM';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");

    return( $qDecoded );
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} 

$action=$_GET['act'];
 

if($action=='ForgotPasswordEmail')
{
	ForgotPasswordEmail($db);			
}
if($action=='reset')
{
	resetP($db);			
}

if($action=='activate')
{
	activate($db);			
}

if($action=='FuncResetPassword')
{
	FuncResetPassword($db);			
}


if($action=='suppurt')
{
	suppurt($db);			
}

if($action=='ActivationEmail')
{
	ActivationEmail($db);			
}


function suppurt($db){
	
	 $Subject = $_POST['Subject'];
	 $Message = $_POST['Message'];
	 $admin = $_POST['admin'];
	 
	 $mail = new PHPMailer();  
	 $mail->From =$admin;
	 $mail->FromName =""; 
	 
 	 $mail->addAddress('uzair.islam@celeritas-solutions.com', 'RCM Support <info@hivelet.com>');
 	 $mail->addReplyTo("info@hivelet.com", "RCM Support");
 	 $mail->isHTML(true);
	 $mail->Subject ="RCM Support Message"; 
	 $mail->Body = "Subject:".$Subject."<br/>
	                Message: ".$Message." <br/><br/>Thank you.";
							 	 
			$mail->AltBody = "Error";

			if(!$mail->Send()) 
			{
			 	echo json_encode("Error");
			} 
			else 
			{  		
			    echo json_encode("success");
			} 
}

 
function FuncResetPassword($db)
{
	$NewPassword1= $_POST['NewPassword1'];
	$email1		= $_POST['email1'];
	$token1		= $_POST['token1'];
	$arr = array("token" => $token1,"email" => $email1);
$statement= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE email=:email AND forgotKey=:token');
$statement->execute($arr);

	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		$arr2 = array("pwd" => $NewPassword1,"token" => null,"linkexpire"=>null,"id" => $data[0]['id']);
		$statement2= $db->prepare('UPDATE schoolforms.rcm_users_v2 SET  pwd=:pwd,linkexpire=:linkexpire, forgotKey=:token WHERE id=:id');
		if($statement2->execute($arr2))
		{  
			echo json_encode("success");
		}
		else
		{ echo json_encode("Error");  }
	}
	else
	{
		header("Location:http://hivelet.com/rcm/test/linkExpired.php");
	}
}


 function resetP($db)
 {
 	$token		= $_GET['token'];
 	$email		= $_GET['pr'];
  	$token1 = str_replace(" ", "+", $token);
	$email1 = str_replace(" ", "+", $email);
 	$token = decryptIt( $token1);
	$email = decryptIt( $email1 );
  	$arr		= array("token" => $token,"email" => $email);
	$statement= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE email=:email AND forgotKey=:token AND linkexpire="false"');
   	$statement->execute($arr);
	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
		header("Location:http://hivelet.com/rcm/test/resetpassword.php?act=reset&token=".$token1."&pr=".$email1);
	}
	else
	{
		header("Location:http://hivelet.com/rcm/test/linkExpired.php");
	}

 }



 function activate($db)
 {
 	$token		= $_GET['token'];
 	$email		= $_GET['pr'];
  	$token1 = str_replace(" ", "+", $token);
	$email1 = str_replace(" ", "+", $email);
 	$token = decryptIt( $token1);
	$email = decryptIt( $email1 );
  	$arr		= array("token" => $token,"email" => $email);
	$statement= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE email=:email AND forgotKey=:token AND linkexpire="false"');
   	$statement->execute($arr);
	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
 		$arr1 = array("email" => $email );
 		$statemen1t= $db->prepare('UPDATE schoolforms.rcm_users_v2 SET linkexpire="true",status="active" WHERE email=:email');
		$statemen1t->execute($arr1);
		header("Location:http://hivelet.com/rcm/test/#accountactive");
		
 	}
	else
	{
		header("Location:http://hivelet.com/rcm/test/linkExpired.php");
	}

 }

function ForgotPasswordEmail($db)
{
	$email		= $_POST['email'];
 
	$input = generateRandomString();
	$token = encryptIt( $input );
	$emailEnc = encryptIt($email);
 	$arr		= array("email" => $email);
	$statement= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE email=:email');
 	$statement->execute($arr);
 	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
   		  	$mail = new PHPMailer();  
			$mail->From ="info@hivelet.com";
			$mail->FromName ="RCM Tool"; 
 			$mail->addAddress($email,$data[0]['fname']);
 			$mail->addReplyTo("noreply@hivelet.com", "RCM Tool");
 			$mail->isHTML(true);
			$mail->Subject ='Password Reset'; 
		 	$mail->Body = "Hi ".$data[0]['fname'].", <br/><br/>You recently requested to reset your password for your RCM Tool account. Please <a href='http://hivelet.com/rcm/test/passwordreset.php?act=reset&token=".$token."&pr=".$emailEnc."'>Click Here</a> to reset it.
			<br/><br/>
			If you did not request a password reset, please ignore this email.
			<br/><br/>Thank You";
		 	 
			$mail->AltBody = "Error";

			if(!$mail->Send()) 
			{
			 	echo json_encode("Error");
			} 
			else 
			{  		
 			   	$arr = array("email" => $email,"token" => $input,"linkexpire" =>'false');
 			 	$statement= $db->prepare('UPDATE schoolforms.rcm_users_v2 SET forgotKey=:token,linkexpire=:linkexpire WHERE email=:email');
				if($statement->execute($arr))
				{  
					echo json_encode("success");
				}
				else
				{ echo json_encode("Error");  }
			} 
   	}
	else
	{  echo json_encode("No Records"); 	}
}



/*
function ForgotPasswordEmail($db)
{
	$email		= $_POST['email'];

	$input = generateRandomString();
	$token = encryptIt( $input );
	$emailEnc = encryptIt($email);
 	$arr		= array("email" => $email);
	$statement= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE email=:email');
 	$statement->execute($arr);
 	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
   		  	$mail = new PHPMailer();  
			$mail->From ="info@hivelet.com";
			$mail->FromName ="RCM Tool"; 
 			$mail->addAddress($email,$data[0]['fname']);
 			$mail->addReplyTo("noreply@hivelet.com", "RCM Tool");
 			$mail->isHTML(true);
			$mail->Subject ='Password Reset'; 
		 	$mail->Body = "Hi ".$data[0]['fname'].", <br/><br/>You recently requested to reset your password for your RCM Tool account. Please <a href='hivelet.com/rcm/passwordreset.php?act=reset&token=".$token."&pr=".$emailEnc."'>Click Here</a> to reset it.
			<br/><br/>
			If you did not request a password reset, please ignore this email.
			<br/><br/>Thank You";
		 	 
			$mail->AltBody = "Error";

			if(!$mail->Send()) 
			{
			 	echo json_encode("Error");
			} 
			else 
			{  		
			   	$arr = array("email" => $email,"token" => $input,"linkexpire" =>'false');
 			 	$statement= $db->prepare('UPDATE schoolforms.rcm_users_v2 SET forgotKey=:token,linkexpire=:linkexpire WHERE email=:email');
				if($statement->execute($arr))
				{  
					echo json_encode("success");
				}else
				{ echo json_encode("Error");  }
			} 
   	}
	else
	{  echo json_encode("No Records"); 	}
}*/

 

function ActivationEmail($db)
{
	$email		= $_POST['email'];

	$input = generateRandomString();
	$token = encryptIt( $input );
	$emailEnc = encryptIt($email);
 	$arr		= array("email" => $email);
	$statement= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE email=:email');
 	$statement->execute($arr);
 	if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
	{
   		  	$mail = new PHPMailer();  
			$mail->From ="info@hivelet.com";
			$mail->FromName ="RCM Tool"; 
 			$mail->addAddress($email,$data[0]['fname']);
 			$mail->addReplyTo("noreply@hivelet.com", "RCM Tool");
 			$mail->isHTML(true);
			$mail->Subject ='Account Activation'; 
		 	$mail->Body = "Dear ".$data[0]['fname'].", <br/><br/>Thank you for registering for RCM Tool. Please <a href='http://hivelet.com/rcm/test/passwordreset.php?act=activate&token=".$token."&pr=".$emailEnc."'>cick here</a> to activate your account.
			<br/><br/>In case of any problems, please email us at uzair.islam@celeritas-solutions.com<br/><br/> Thank you."; 		 	 
			$mail->AltBody = "Error";
 			if(!$mail->Send()) 
			{
			 	echo json_encode("Error");
			} 
			else 
			{  		
			   	$arr = array("email" => $email,"token" => $input,"linkexpire" =>'false');
 			 	$statement= $db->prepare('UPDATE schoolforms.rcm_users_v2 SET forgotKey=:token,linkexpire=:linkexpire WHERE email=:email');
				if($statement->execute($arr))
				{  
					echo json_encode("success");
				}else
				{ echo json_encode("Error");  }
			} 
   	}
	else
	{  echo json_encode("No Records"); 	}
}







































