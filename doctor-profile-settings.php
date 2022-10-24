<?php
include "connect.php";
session_start();
$id = $_SESSION["doctorid"];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phon'];
	$country = $_POST['country'];
	$about2 = $_POST['about'];
	$price = $_POST['pricing'];
	$about = mysqli_escape_string($connect, $about2);
	$t = time();
	$image = $_FILES['image'];
	$imgname = $_FILES['image']['name'];
	$imgtype = $_FILES['image']['type'];
	if ($imgtype == 'image/jpeg' || $imgtype == 'image/jpg' || $imgtype == 'image/png') {
		$imgoldlocation = $_FILES['image']['tmp_name'];
		$imgnewlocation = "img/$imgname";
		move_uploaded_file($imgoldlocation, $imgnewlocation);
		if ($fname && $lname && $phone && $country && $about && $price) {
			$q2 = "UPDATE `doctors` SET `image`='$imgnewlocation',`fname`='$fname',`lname`='$lname',`phon`='$phone',`country`='$country',`about`='$about',`pricing`='$price',`Date`=Now() WHERE `id`=$id";
			$update = $connect->query($q2);
			if ($update) {
				header("Location: doctor-dashboard.php");
				
			}
		} // null value
		else{
			 $_SESSION['error']="Please, Fill In All Fields Correctly";
			header("Location: doctor-profile-settings.php");

		}
	} // image type not supported

	else {
		  $_SESSION['error']="Image type is not supported";
		header("Location: doctor-profile-settings.php");
	}
}


?>


<!DOCTYPE html>
<html lang="en">

<!-- doccure/doctor-profile-settings.html  30 Nov 2019 04:12:14 GMT -->

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

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">

	<link rel="stylesheet" href="assets/plugins/dropzone/dropzone.min.css">

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
								<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Profile Settings</h2>
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
						<?php include "doctorsidebar.php" ?>
						<!-- /Profile Sidebar -->

					</div>
					<div class="col-md-7 col-lg-8 col-xl-9">
<?php 
if(isset($_SESSION['error'])){ ?>
<div class="alert alert-danger text-center" role="alert" id="error">
	<?=$_SESSION['error'] ?>
</div>
<?php } ?>
						<form action="doctor-profile-settings.php" method="post" enctype="multipart/form-data">
							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
														<?php
														$did = $_SESSION['docid'];
														$qimg = "SELECT  `image` FROM `doctors` WHERE `id`=$did";
														$img = $connect->query($qimg);
														foreach ($img as $img) {
														?>
															<img src="<?= $img['image'] ?>" alt="User Image">
														<?php } ?>
													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload Photo</span>
															<input type="file" class="upload" name="image">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Username <span class="text-danger">*</span></label>
												<input type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input type="email" class="form-control" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>First Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="fname">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Last Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="lname">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input type="text" class="form-control" name="phon">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input type="text" class="form-control" name="country">
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- /Basic Information -->

							<!-- About Me -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">About Me</h4>
									<div class="form-group mb-0">
										<label>Biography</label>
										<textarea class="form-control" rows="5" name="about"></textarea>
									</div>
								</div>
							</div>
							<!-- /About Me -->





							<!-- Pricing -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Pricing</h4>

									<div class="form-group mb-0">
										<div id="pricing_select">
											<input type="text" class="form-control" id="custom_rating_input" value="" placeholder="20" name="pricing">
										</div>

									</div>



								</div>
							</div>
							<!-- /Pricing -->





							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
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

	<!-- Select2 JS -->
	<script src="assets/plugins/select2/js/select2.min.js"></script>

	<!-- Dropzone JS -->
	<script src="assets/plugins/dropzone/dropzone.min.js"></script>

	<!-- Bootstrap Tagsinput JS -->
	<script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

	<!-- Profile Settings JS -->
	<script src="assets/js/profile-settings.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

	<script>
			var error=document.getElementById("error");
			setTimeout(()=>error.style.display="none",3000)
		</script>
</body>

<!-- doccure/doctor-profile-settings.html  30 Nov 2019 04:12:15 GMT -->

</html>