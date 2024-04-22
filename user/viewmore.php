<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:login/userlogin.php");
}
?>

<?php include "header.php"; ?>

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Cab Booking</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">View More</h6>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container pt-5 pb-3">
        <?php
        include "config.php";
        $vid = $_GET['id'];
        $cab = mysqli_query($con, "SELECT * from `vehicle`,`driver` where vehicle.did=driver.did and vehicle.vid=" . $vid);
        $cabrow = mysqli_fetch_array($cab);
        ?>
        <h1 class="display-4 text-uppercase mb-5">More Details</h1>
        <div class="row align-items-center pb-2">
            <div class="col-lg-6 mb-4">
                <img class="img-fluid" src="<?php echo $cabrow['vimage']; ?>" alt="">
            </div>
            <div class="col-lg-6 mb-4">
                <h4 class="mb-2">Name:-<?php echo $cabrow['vname']; ?></h4>
                <div class="d-flex mb-3">
                    <h6 class="mr-2">CabNo:-<?php echo $cabrow['vno']; ?></h6><br>
                </div>
                <h6 class="mr-2">Drivername:-<?php echo $cabrow['dname']; ?></h6><br>
                <h6 class="mr-2">DriverNo:-<?php echo $cabrow['dcontact']; ?></h6>
            </div>
        </div>
        <div class="row mt-n3 mt-lg-0 pb-4">
            <div class="col-md-3 col-6 mb-2">
                <i class="fa fa-car text-primary mr-2"></i>
                <span>CabType:-<?php echo $cabrow['type']; ?></span>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <i class="fa fa-cogs text-primary mr-2"></i>
                <span>Amount:-<?php echo $cabrow['vamount']; ?></span>
            </div>
            <a class="btn btn-primary px-3" href="booknow.php?id=<?php echo $vid; ?>">GoForBook</a>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

</body>

</html>