<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['did'])) {
    header("location:login/driverlogin.php");
}
?>

<?php include "header.php"; ?>

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Change Password</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Change Password</h6>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-5">Change Password</h1>
        <?php
        include "config.php";
        $uid = $_SESSION['did'];
        ?>

        <form action="" method="POST">
            <div class="form-group">
                <input type="password" class="form-control p-4" placeholder="Old Password" name="opwd"
                    required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control p-4" placeholder="New Password" name="npwd"
                    required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control p-4" placeholder="Confirm Password" name="cpwd"
                    required="required">
            </div>
            <div>
                <button class="btn btn-primary py-3 px-5" type="submit" name="change">Change</button>
            </div>
        </form>

        <?php
        include ('config.php');

        if (isset($_POST['change'])) {
            $opwd = $_POST['opwd'];
            $npwd = $_POST['npwd'];
            $cpwd = $_POST['cpwd'];
            $sql = mysqli_query($con, "SELECT * from driver where did='$uid' and password='$opwd'") or die(mysqli_error($con));
            $nrows = mysqli_num_rows($sql);
            if ($nrows == 1) {
                if ($npwd == $cpwd) {
                    $qry = mysqli_query($con, "UPDATE driver set password='$npwd' where did='$uid'") or die(mysqli_error($con));
                    if ($qry) {
                        echo '<script>alert("Successfully Changed the password");window.location="../index.php";</script>';
                    } else {
                        echo '<script>alert("Failed to change");</script>';
                    }
                } else {
                    echo '<script>alert("New Password and Confirm Password mismatch ...try again!!!!");</script>';
                }
            } else {
                echo '<script>alert("Current password is not matching...try again!!!!");</script>';
            }
        }
        ?>
    </div>
</div>

<?php include "footer.php"; ?>

</body>

</html>