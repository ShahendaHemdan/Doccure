<?php
error_reporting(E_ERROR | E_PARSE);
ob_start();
session_start();
include "connect.php";
$id=$_SESSION['userid'];
$quser="SELECT * FROM `users` WHERE `id`=$id";
$user=$connect->query($quser);
foreach($user as $u){
   
    

 ?>


<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">

									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
        									<img src="<?= $u['image'] ?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><?= $u['fname'] ?></h3>
											<div class="patient-details">
<?php
 $dob=$u['dob'] ;
 $birthdayDate= strtotime(str_replace("/","-",$dob));       
 $tdate = time();
 
 $age = 0;
 while( $tdate > $birthdayDate = strtotime('+1 year', $birthdayDate))
 {
     ++$age;
     $age;
 }
 if(!$dob){
	$age="un known";
 }

?>
												<h5><i class="fas fa-birthday-cake"></i> <?= $u['dob'] ?>, <?=$age?> years</h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <?= $u['city'] ?>, <?= $u['country'] ?></h5>
											</div>
										</div>
									</div>

<?php } ?>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="patient-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="doctors.php">
													<i class="fas fa-user-md"></i>
													<span>Doctors</span>
												</a>
											</li>
											<li>
												<a href="profile-settings2.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="change-password.php">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="logout.php">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>

<?php ob_end_flush();
