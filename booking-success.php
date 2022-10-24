<?php
include "connect.php";
session_start();
 $drid=$_SESSION['doctorid'];
 $userid=$_SESSION['userid'];
$q="SELECT * FROM `booking` WHERE `drid`=$drid AND `userid`=$userid ORDER BY `id` DESC LIMIT 1";
$result=$connect->query($q);
foreach ($result as $r){
	 

 ?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/booking-success.html  30 Nov 2019 04:12:16 GMT -->
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
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content success-page-cont">
				<div class="container-fluid">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">

							<!-- Success Card -->
							<div class="card success-card">
								<div class="card-body">
									<div class="success-cont">
										<i class="fas fa-check"></i>
<?php		
	$did=$r['drid'];
	$qname="SELECT `name` FROM doctors WHERE `id`=$did ";
	$name=$connect->query($qname);
 foreach($name as $n)  {
	 ?>
										<h3>Appointment booked Successfully!</h3>
										<p>Appointment booked with <strong><?= $n['name'] ?> </strong><br> on <strong><?= $r['date'] ?> at :  <?= $r['time'] ?></strong></p>
										<a href="doctors.php" class="btn btn-primary view-inv-btn">Go To Doctors</a>
<?php  } }?>

									</div>
								</div>
							</div>
							<!-- /Success Card -->
							
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
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/booking-success.html  30 Nov 2019 04:12:16 GMT -->
</html>