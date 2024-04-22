<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:login/userlogin.php");
}
?>

<?php include "header.php"; ?>

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Cab Listing</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Cab Listing</h6>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>
        <div class="row">
            <?php
            include "config.php";
            $cab = mysqli_query($con, "SELECT * FROM vehicle");
            while ($cabrow = mysqli_fetch_array($cab)) { ?>


                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <img class="img-fluid mb-4" src='<?php echo $cabrow['vimage']; ?>' alt="">
                        <h4 class="text-uppercase mb-4"><?php echo $cabrow['vname']; ?></h4>
                        <div class="d-flex justify-content-center mb-4">

                        </div>
                        <a class="btn btn-primary px-3" href="viewmore.php?id=<?php echo $cabrow['vid']; ?>">ViewMore</a>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>
<?php include "footer.php"; ?>

</body>

</html>