<?php
include "config.php";

$vid=$_GET['vid'];

$qry=mysqli_query($con,"DELETE FROM vehicle where vid=".$vid);

echo "<script>alert('Driver Details Deleted Successfully');window.location='Cabs.php';</script>";

?>