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
        <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">BookNow</h6>
    </div>
</div>

<div class="container-fluid pb-5">
    <div class="container">
        <?php
        include "config.php";
        $id = $_GET['id'];
        $uid = $_SESSION['uid'];

        $qry = mysqli_query($con, "SELECT * FROM user where uid=" . $uid);
        $row = mysqli_fetch_array($qry);
        ?>
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Personal Detail</h2>
                <div class="mb-5">
                    <div class="row">
                        <div class="col-6 form-group">
                            <input type="text" class="form-control p-4" placeholder="First Name"
                                value="<?php echo $row['name']; ?>" required="required">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <input type="email" class="form-control p-4" value="<?php echo $row['emailid']; ?>"
                                placeholder="Your Email" required="required">
                        </div>
                        <div class="col-6 form-group">
                            <input type="text" class="form-control p-4" value="<?php echo $row['contno']; ?>"
                                placeholder="Mobile Number" required="required">
                        </div>
                    </div>
                </div>
                <h2 class="mb-4">Booking Detail</h2>
                <div class="mb-8">
                    <form action="" method="POST">
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="date" class="form-control" placeholder="Pickup Date" name="bdate"
                                        data-target="#date2" required="" data-toggle="datetimepicker"
                                        min="<?php echo date("Y-m-d", strtotime("today")); ?>" />
                                </div>
                            </div>

                            <div class="col-6 form-group">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4" name="pickuplocation" required=""
                                        placeholder="Pickup location" />
                                </div>


                            </div>
                            <div class="col-6 form-group">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4" placeholder="Droplocation" required=""
                                        name="droplocation" />
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                </div>
                            </div>



                            <div class="col-6 form-group">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4" name="phonenumber" required=""
                                        placeholder="Enter phonenumber" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-3" name="book"
                                value="BookNow">BookNow</button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['book'])) {
                        $vid = $_POST['id'];
                        $uid = $_SESSION['uid'];
                        $bdate = $_POST['bdate'];
                        $pickuplocation = $_POST['pickuplocation'];
                        $droplocation = $_POST['droplocation'];
                        $phonenumber = $_POST['phonenumber'];

                        $qry = mysqli_query($con, "INSERT INTO `booking`(`uid`, `vid`, `bdate`, `pickuplocation`, `droplocation`,`phonenumber`, `bstatus`) VALUES ('" . $uid . "','" . $vid . "','" . $bdate . "','" . $pickuplocation . "','" . $droplocation . "','" . $phonenumber . "','Booked')");

                        echo "<script>alert('Success');window.location='index.php';</script>";
                    }
                    ?>

                </div>
            </div>

        </div>

    </div>
</div>

<?php include "footer.php"; ?>

</body>

</html>