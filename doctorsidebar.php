<?php
ob_start();
include "connect.php";
$id=$_SESSION['docid'];
$quser="SELECT * FROM `doctors` WHERE `id`=$id";
$doc=$connect->query($quser);
foreach($doc as $d){
     

 ?>




<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="<?= $d['image'] ?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><?= $d['name'] ?></h3>
											
											<div class="patient-details">
			                                	<h5 class="mb-0"><?= substr( $d['about'],0,40) ?></h5> 
											</div>
										</div>
									</div>
								</div>
<?php } ?>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="doctor-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="appointments.php">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											
										
											<li>
												<a href="doctor-profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>

											<li>
												<a href="doctor-change-password.php">
													<i class="fas fa-lock"></i>
													<span>Change Password </span>
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

<?php ob_end_flush();
 
