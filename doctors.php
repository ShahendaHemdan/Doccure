<?php
ob_start();
include "connect.php";

?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/favourites.html  30 Nov 2019 04:12:16 GMT -->
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
	<style>
		.img{
			height: 170px;
		}
	</style>
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
									<li class="breadcrumb-item active" aria-current="page">Doctors</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctors</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						
<?php include "pstientside.php"  ?>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row row-grid">
						
<?php 
$sql="SELECT * FROM `doctors`";
$doc=$connect->query($sql);
foreach($doc as $d){
	$did=$d['id'];
?>
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="doctor-profile.php?id=<?=$did?>">
												<img class="img" alt="User Image" src="<?= $d['image'] ?> ">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="doctor-profile.php?id=<?=$did?>"><?= $d['name'] ?></a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality"> <?= substr($d['about'],0,20) ?></p>
											
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i> <?= $d['country'] ?>,
												</li>
												
												<li>
													<i class="far fa-money-bill-alt"></i> <?= $d['pricing'] ?> $
													<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
												</li>
											</ul>
											<div class="row row-sm">
												<div class="col-6">
													<a href="doctor-profile.php?id=<?= $d['id'] ?>" class="btn view-btn">View Profile</a>
												</div>
												<div class="col-6">
													<a href="booking.php?id=<?= $d['id'] ?>" class="btn book-btn">Book Now</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
		
	<?php } ?>								
						
								
								
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
		
	</body>

<!-- doccure/favourites.html  30 Nov 2019 04:12:17 GMT -->
</html>

<?php ob_end_flush();
