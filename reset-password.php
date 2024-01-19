<?php
session_start();
error_reporting(0);
include('includes/dbconnect.php');
error_reporting(0);

if(isset($_POST['reset']))
  {
  	$email=$_SESSION['email'];
    $mobile=$_SESSION['mobile'];
    $password=md5($_POST['newpassword']);
    $query=mysqli_query($con,"update admin set password='$password' where  email='$email' && mobile='$mobile' ");
   if($query)
   {
   	echo "<script>alert('Password successfully changed.');</script>";
   	session_destroy();
   }
   header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password | KHU-VMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" name="reset">
					<span class="login100-form-title">
						KHU VMS
					</span>
					
					<p style="text-align: center;">Reset Password</p>
					&nbsp;

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your new password">
						<input class="input100" type="password" name="newpassword" placeholder="New pasword">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please confirm your password">
						<input class="input100" type="password" name="confirmpassword" placeholder="Confirm new password">
						<span class="focus-input100"></span>
					</div> 
					&nbsp;

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="reset">
							Reset
						</button>
					</div>

					&nbsp;
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================
*scripts
===============================================================================================-->
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/login/vendor/select2/select2.min.js"></script>
	<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
	<script src="assets/login/js/main.js"></script>
<!--===============================================================================================
*/scripts
===============================================================================================-->
</body>
</html>