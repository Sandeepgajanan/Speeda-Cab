<?php
include "config.php";
$id=$_GET['did'];
$qry=mysqli_query($con,"UPDATE `booking` SET `bstatus`='Confirmed' WHERE bid=".$id);
echo "<script>alert('Booking Confirmed Successfully');window.location='booking.php';</script>";
?>