<?php
include "config.php";
$id=$_GET['did'];
$qry=mysqli_query($con,"UPDATE `booking` SET `bstatus`='Rijected' WHERE bid=".$id);
echo "<script>alert('Booking Rejected');window.location='booking.php';</script>";
?>