<?php
include "connect.php";
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
$qdel="DELETE FROM `booking` WHERE `id`=$id";
$del=$connect->query($qdel);
if($del){
    header("Location: patient-dashboard.php");

}
}