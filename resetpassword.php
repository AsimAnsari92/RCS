<?php
include("email/class.phpmailer.php");
$db =getConnection();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>RCM TOOL</title>
<link rel="icon" href="images/logo/favicon.png" type="images/logo/favicon.png" />
<link href="fonts/fontStyle.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<script src="js/jquery.js"></script>
<script src="js/webjs1.js"></script>
<script src="js/jquery.cookie.js"></script>
 <script src="js/new1.js"></script>
 
  
<style>
body{background-image:url(images/bg/bg-min.png);  background-repeat:no-repeat;}
</style>

</head>

<body >
<!--margin-topBotCenetr-->
<section class="overflow-hidden font-familyGothamNarrowBook margin-topBotCenetr">
<div class="container">
<div class="row">
<div class="col-6 p-0 font-familyRobotoRegular colorgray overflow-hidden m-auto">
 

<div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0 pull-left">

     <div class="col-12 bg-colorWhite border-box1px pb-4 height-398px" id="loginPage">
    <h5 class="colorDarkBlue font-familyRaleway mt-5 text-center">Password Reset</h5>
    <div class="col-lg-7 col-md-11 col-sm-12 col-12 m-auto p-0 mt-4">
     <div class="alert alert-success fadeIn mb-0 loginerorPop" id="AlertMsg" role="alert" style="display:none">
      <span id="AlertTxt">You successfully Add Data.</span>
    </div>
       <div class="form-group mt-5">
        <input type="password" class="form-control borderInputblue" id="NewPassword"   placeholder="New Password">
      </div>
      <div class="form-group mt-3">
        <input type="password" class="form-control borderInputblue" id="ConfirmPassword" placeholder="Confirm Password">
      </div>
      
     <div class="col p-0 mt-3">
        <input class="d-block btn btn-dark bg-blue col-lg-12 col-md-12 col-sm-12 col-12 m-auto font-size14px font-familyOpenSans" type="button" value="Reset" onClick="FuncResetPassword()">
    </div> 
      </div> 
    </div>
    
    
    
</div>
</div>




</div>
</div>
</section>

<?php

function decryptIt( $q ) {

    $cryptKey  = 'B3rmuda-01102017-0102PM';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");

    return( $qDecoded );
}

  $token    = $_GET['token'];
  $email    = $_GET['pr'];
  $token1 = str_replace(" ", "+", $token);
  $email1 = str_replace(" ", "+", $email);
  $token = decryptIt( $token1);
  $email = decryptIt( $email1 );
  $arr    = array("token" => $token,"email" => $email);
  $statement= $db->prepare('SELECT * FROM schoolforms.rcm_users_v2 WHERE email=:email AND forgotKey=:token  AND linkexpire="false"');
  $statement->execute($arr);
    if($data=$statement->fetchAll(PDO::FETCH_ASSOC))
    {
        echo "<input type='hidden' name='token' id='token' value='".$token."'>";
        echo "<input type='hidden' name='email' id='email' value='".$email."'>";
		
    }
    else
    {
 		header("Location:http://hivelet.com/rcm/test/linkExpired.php");
       /*echo "<script>alert('Link Expired');LogoutUser(); </script>";*/
    }

$arr1 = array("email" => $email );
	
	$statemen1t= $db->prepare('UPDATE schoolforms.rcm_users_v2 SET  linkexpire="true" WHERE email=:email');
	 $statemen1t->execute($arr1);
	 
	 ?>
<div class="col-12 pupopBg" id="loader" style="display:none;">
<div class="loader">Loading...</div>
<P class="loaderTxt">Loading, please wait.</P>
</div>


</body>
</html>
