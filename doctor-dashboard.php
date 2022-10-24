<?php
include "connect.php";
error_reporting(E_ERROR | E_PARSE);

if(!session_start()){
	session_start();
}
$drid=$_SESSION['docid'];

if(isset($_GET['bidsuc'])){
	 $bidsuc=$_GET['bidsuc'];
    $qsuc="UPDATE `booking` SET `status`='accepted'  WHERE `id`=$bidsuc";
	$suc=$connect->query($qsuc);
	if($suc){
	 header("Location: appointments.php");
	}
}


if(isset($_GET['biddel'])){
	 $biddel=$_GET['biddel'];
 	$qcancel="UPDATE `booking` SET `status`='deleted'  WHERE `id`=$biddel";
	$cancel=$connect->query($qcancel);
	if($cancel){
		header("Location: doctor-dashboard.php");
	}
}


?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:03 GMT -->
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
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							<!-- Profile Sidebar -->
							<?php
							include "doctorsidebar.php" ?>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
<?php 
$qcp="SELECT COUNT(`userid`) AS `cusers` FROM booking WHERE `drid`=$drid ;";
$cp=$connect->query($qcp);
foreach($cp as $cp){
?>
															<h6>Total Patient</h6>
															<h3><?= $cp['cusers'] ?></h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
<?php } ?>					
												
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Appoinments</h6>
<?php 
$qcp="SELECT COUNT(`id`) AS `count` FROM booking WHERE `status`='accepted' And `drid`=$drid ";
$cp=$connect->query($qcp);
foreach($cp as $cp){
?>
															<h3><?= $cp['count'] ?></h3>
<?php } ?>
															<p class="text-muted">06, Apr 2019</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointments">
							
										<!-- Appointment List -->
<?php 
$qdr="SELECT * FROM `booking` WHERE `drid`=$drid  AND `status`='pinding'";
$dr=$connect->query($qdr);
foreach($dr as $dr){
$bookid=$dr['id'];
$userid=$dr['userid'];
$quser="SELECT * FROM `users` WHERE `id`=$userid";
$user=$connect->query($quser);
foreach($user as $user){
?>
										<div class="appointment-list">
											<div class="profile-info-widget">
												<a href="#" class="booking-doc-img">
													<img src="<?=$user['image']?>" alt="User Image">
												</a>
												<div class="profile-det-info">
													<h3><a href="patient-profile.php"><?=$user['fname']?></a></h3>
													<div class="patient-details">
														<h5><i class="far fa-clock"></i> <?=$dr['date']?>, <?=$dr['time']?></h5>
														<h5><i class="fas fa-map-marker-alt"></i> <?=$user['country']?>, <?=$user['city']?></h5>
														<h5><i class="fas fa-envelope"></i> <?=$user['email']?></h5>
														<h5 class="mb-0"><i class="fas fa-phone"></i> <?=$user['phone']?></h5>
													</div>
												</div>
											</div>
											<div class="appointment-action">
		<!-- //////	 -->
												<a href="doctor-dashboard.php?bidsuc=<?=$bookid ?>" class="btn btn-sm bg-success-light">
													<i class="fas fa-check"></i> Accept
												</a>
												<a href="doctor-dashboard.php?biddel=<?=$bookid ?>" class="btn btn-sm bg-danger-light">
													<i class="fas fa-times"></i> Cancel
												</a>
											</div>
										</div>
<?php }} ?>
										<!-- /Appointment List -->						
 						
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
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:09 GMT -->
</html>