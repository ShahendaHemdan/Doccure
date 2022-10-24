	<?php
include "connect.php";
error_reporting(E_ERROR | E_PARSE);
 session_start();
$userid=$_SESSION['userid'];
$q="SELECT * FROM `booking` WHERE `userid`=$userid";

$result=$connect->query($q);

?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/patient-dashboard.html  30 Nov 2019 04:12:16 GMT -->
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
			<?php include "header.php"; ?>
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
						
						<!-- Profile Sidebar -->
						 
						<?php include "pstientside.php"?>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
											
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Status</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>

<?php 
foreach($result as $r){
$delid=$r['id'];
$drid=$r['drid'];
$_SESSION['docid']=$drid;
$qdrname="SELECT * FROM `doctors` WHERE `id`=$drid ";
$drname=$connect->query($qdrname);
foreach($drname as $dr){
?>
																
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.php?id=<?=$drid?>" class="avatar avatar-sm mr-2">

																				<img class="avatar-img rounded-circle" src="<?=$dr['image'] ?>" alt="User Image">
																			</a>
																			<a href="doctor-profile.php?id=<?=$drid?>"><?= $dr['name'] ?> <span><?=substr( $dr['about'],0,7) ?></span></a>
																		</h2>
																	</td>
																	<td><?= $r['date']  ?> <span class="d-block text-info"><?= $r['time'] ?></span></td>
																	<td><?= $r['bookingdate'] ?></td>
																	<td>$<?= $dr['pricing'] ?></td>
																	
																	<td><span class="badge badge-pill bg-success-light"><?=$r['status'] ?></span></td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="deletbooking.php?delid=<?=$delid ?>" class="btn btn-sm bg-danger-light">
																				<i class="far fa-trash-alt"></i> Cancel
																			</a>
																			
																		</div>
																	</td>
																</tr>
															
															
<?php }} ?>												
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										
									</div>
									<!-- Tab Content -->
									
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
		
	</body>

<!-- doccure/patient-dashboard.html  30 Nov 2019 04:12:16 GMT -->
</html>