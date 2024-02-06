<?php
session_start();
error_reporting(0);
include('includes/dbconnect.php');

if(isset($_POST['login']))
  {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select id from admin where  username='$username' && password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['khuvmsaid']=$ret['id'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | KHU-VMS</title>
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

				<!--alert when login details given are invalid-->
				<?php if($msg){ ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
					<?php echo $msg; ?>
				</div>
				<?php } ?>

				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" name="login">
					<span class="login100-form-title">
						KHU VMS
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="Forgot-password.php" class="txt2">
							Username / Password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Sign in
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