<?php
include "config.php";

$did=$_GET['did'];

$qry=mysqli_query($con,"DELETE FROM driver where did=".$did);

echo "<script>alert('Driver Details Deleted Successfully');window.location='Drivers.php';</script>";

?>