<?php
session_start();
include "connect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $encpass=md5($password ); 
  $qlogin="SELECT * FROM `users` WHERE email='$email'";
  $login=$connect->query($qlogin);
      foreach($login as $l){
            if($email==$l['email']&&$encpass==$l['password']){ 
		        $_SESSION['userid'] =$l['id']; 	
 	            header("Location: patient-dashboard.php");
                }//end of login


				else{ // not registerd
					        $_SESSION['lerror']="Wrong Email Or Password";
 				}
					}  // end of foreach
		if(!isset($email)){
			  $_SESSION['lerror']="Wrong Email ";
 		}
				   
}  //end of REQUEST_METHOD
?>

 


<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/login.html  30 Nov 2019 04:12:20 GMT -->
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

			<div class="content" >
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2"> 

							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">

										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
									<?php 
if(isset($_SESSION['lerror'])){ ?>
<div class="alert alert-danger text-center" role="alert" id="lerror">
	<?= $_SESSION['lerror'];
  ?>
</div>
<?php  } ?>	
									<div class="login-header">
											<h3>Patient Register <a href="doctor-register.php">Are you a Doctor?</a></h3>
										</div>


										
										<form action="login.php" method="post">
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="email">
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" name="password">
												<label class="focus-label">Password</label>
											</div>
											
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
											
											
											<div class="text-center dont-have">Don’t have an account? <a href="register.php">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			
		   
		</div>
		<!-- /Main Wrapper -->
		<script>
			var lerror=document.getElementById("lerror");
			setTimeout(()=>lerror.style.display="none",3000)
		</script>
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/login.html  30 Nov 2019 04:12:20 GMT -->
</html>