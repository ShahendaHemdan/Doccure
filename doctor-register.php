<?php
include "connect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $encpass=md5($password );
  if($name&&$email&&$password){
  $qregister="INSERT INTO `doctors`( `name`, `email`, `password`,`date`) VALUES ('$name','$email','$encpass',Now())";
  $register=$connect->query($qregister);
  header("Location: doctorlogin.php");
  }//end pf null value
  else { //null value has been inserted
	session_start();
    $_SESSION['drerror']="Please, Fill In All Fields Correctly";
  }
}//end of REQUEST_METHOD

?>



<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/doctor-register.html  30 Nov 2019 04:12:15 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
						<!-- Header -->
						<?php include "header.php" ?>
						<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Doctor Register <a href="register.php">Not a Doctor?</a></h3>
										</div>
<?php 
if(isset($_SESSION['drerror'])){ ?>
<div class="alert alert-danger text-center" role="alert" id="drerror">
	<?php echo $_SESSION['drerror'] ?>
</div>
<?php } ?>
										<!-- Register Form -->
										<form action="doctor-register.php" method="post">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="name">
												<label class="focus-label">Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="email">
												<label class="focus-label">Email Address</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" name="password">
												<label class="focus-label">Create Password</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="doctorlogin.php">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
											
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script>
			var drerror=document.getElementById("drerror");
			setTimeout(()=>drerror.style.display="none",3000)
		</script>
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/doctor-register.html  30 Nov 2019 04:12:16 GMT -->
</html>