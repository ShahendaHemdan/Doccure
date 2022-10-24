<?php
include "connect.php";
session_start();
 $id=$_SESSION['userid'];
if($_SERVER['REQUEST_METHOD']=='POST')	{
    
$bod=$_POST['bod'];
$blood=$_POST['blood'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zipcode=$_POST['zipcode'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$country=$_POST['country'];
$t=time();
  $image=$_FILES['image'];
   $imgname=$_FILES['image']['name'];
   $imgtype=$_FILES['image']['type'];
   if($imgtype=='image/jpeg' || $imgtype=='image/jpg' || $imgtype=='image/png'){
        $imgoldlocation=$_FILES['image']['tmp_name'];
        $imgnewlocation="img/$t$imgname";
        move_uploaded_file($imgoldlocation,$imgnewlocation);
    if($bod&&$blood&&$address&&$city&&$state&&$zipcode&&$fname&&$lname&&$phone&&$country&&$imgnewlocation){
        $q="UPDATE `users` SET  `fname`='$fname',`lname`='$lname',`dob`='$bod',`blood`='$blood',`phone`='$phone',`address`='$address',`city`='$city',`state`='$state',`country`='$country',`zipcode`='$zipcode',`image`='$imgnewlocation',`date`=Now() WHERE `id`=$id";
        $result=$connect->query($q);
        if($result){
           
            header("Location: patient-dashboard.php");
        }

    }
    else{
        $_SESSION['serror']="Please, Fill In All Fields Correctly";
        header("Location: profile-settings2.php");
     }
    
 } else{
      $_SESSION['serror']="Image type is not supported";
      header("Location: profile-settings2.php");
 }

 
} //end of REQUEST_METHOD

else{
	header("Location: index.php");
}