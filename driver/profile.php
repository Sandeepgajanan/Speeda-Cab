<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['did'])) {
    header("location:login/driverlogin.php");
}
?>
<?php include "header.php"; ?>

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Profile</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Profile</h6>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-5">My Profile</h1>
        <?php
        include "config.php";
        $did = $_SESSION['did'];
        $qry = mysqli_query($con, "SELECT * FROM driver where did=" . $did);
        $row = mysqli_fetch_array($qry);
        ?>

        <form action="" method="POST">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                        for="grid-password">
                        Name
                    </label>
                    <input type="text" class="form-control p-4" placeholder="Your Name" name="dname"
                        value="<?php echo $row['dname']; ?>">
                    <input type="hidden" name="did" value="<?php echo $did; ?>">
                </div>
                <div class="col-6 form-group">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                        for="grid-password">
                        Email
                    </label>
                    <input type="email" class="form-control p-4" name="demail" value="<?php echo $row['demail']; ?>"
                        placeholder="Your Email" required="required" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                    for="grid-password">
                    Password
                </label>
                <input type="text" class="form-control p-4" placeholder="Subject" name="dpassword"
                    value="<?php echo $row['password']; ?>" required="required" readonly>
            </div>

            <div class="form-group">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                    for="grid-password">
                    Contact
                </label>
                <input type="text" pattern="[1-9]{1}[0-9]{9}" maxlength="10" minlength="10" title="10 digits only"
                    class="form-control p-4" placeholder="Subject" name="dcontact"
                    value="<?php echo $row['dcontact']; ?>">
            </div>

            <div class="form-group">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                    for="grid-password">
                    Address
                </label>
                <textarea class="form-control py-3 px-4" rows="5" name="daddress"
                    placeholder="Message"><?php echo $row['daddress']; ?></textarea>
            </div>
            <div>
                <button class="btn btn-primary py-3 px-5" type="submit" name="edit">Change</button>
            </div>
        </form>

        <?php
        include "config.php";
        if (isset($_POST['edit'])) {
            $did = $_POST['did'];
            $dname = $_POST['dname'];
            $demail = $_POST['demail'];
            $dpassword = $_POST['dpassword'];
            $dcontact = $_POST['dcontact'];
            $daddress = $_POST['daddress'];
            $qry = mysqli_query($con, "UPDATE `driver` SET `dname`='" . $dname . "',`dcontact`='" . $dcontact . "',`demail`='" . $demail . "',`daddress`='" . $daddress . "',`password`='" . $dpassword . "' WHERE did=" . $did) or die(mysqli_error($con));
            echo "<script>alert('Driver Details Edited Successfully');window.location='index.php';</script>";
        }
        ?>
    </div>
</div>

<?php include "footer.php"; ?>

</body>

</html>