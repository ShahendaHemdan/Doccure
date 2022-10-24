<?php
ob_start();
include "connect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
session_start();
$id=$_SESSION['userid'];
$oldpass=$_POST['oldpass'];
$hasholdpass=md5($oldpass);
$newpass=$_POST['newpass'];
$confnewpass=$_POST['confnewpass'];
$hashnewpass=md5($newpass);
$qselect="SELECT `password`  FROM `users` WHERE `id`=$id";
$select=$connect->query($qselect);

    foreach($select as $s){
		if($hasholdpass==$s['password']){
			if($newpass==$confnewpass){
			$qupdate="UPDATE `users` SET  `password`='$hashnewpass' WHERE `id`=$id";
			$update=$connect->query($qupdate);
		if($update)
		   header("Location: login.php");
		 
	}
	else
	{
		$_SESSION['cherror']="Confirm password does not match";
		header("Location: change-password.php");
	}
}
else{
	$_SESSION['cherror']="The old password does not match";
	header("Location: change-password.php");
}
} //end for ecah
}

?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/change-password.html  30 Nov 2019 04:12:18 GMT -->
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
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
				<!-- Header -->
				<?php include "header.php" ?>
				<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
					<?php
	include "pstientside.php" ;
	$id=$_SESSION['userid'];
?>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">
<?php 
if(isset($_SESSION['cherror'])){ ?>
<div class="alert alert-danger text-center" role="alert" id="cherror">
	<?=$_SESSION['cherror'] ?>
</div>
<?php } ?>	
											<!-- Change Password Form -->
											<form action="change-password.php" method="post">
												<div class="form-group">
													<label>Old Password</label>
													<input type="password" class="form-control" name="oldpass">
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control" name="newpass">
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control" name="confnewpass">
												</div>
												<div class="submit-section">
													<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
												</div>
											</form>
											<!-- /Change Password Form -->
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
   
		
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script>
			var cherror=document.getElementById("cherror");
			setTimeout(()=>cherror.style.display="none",3000)
		</script>
	</body>

<!-- doccure/change-password.html  30 Nov 2019 04:12:18 GMT -->
</html>

<?php  ob_end_flush();