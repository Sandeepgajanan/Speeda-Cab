<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:login/userlogin.php");
}
?>

<?php include "header.php"; ?>

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Feedback</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Feedback</h6>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-3">Feedback</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7 mb-2 ">
                <div class="contact-form bg-light mb-4 p-5">
                    <?php
                    include "config.php";
                    $uid = $_SESSION['uid'];
                    $qry = mysqli_query($con, "SELECT * FROM user where uid=" . $uid);
                    $row = mysqli_fetch_array($qry);
                    ?>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Your Name"
                                    value="<?php echo $row['name']; ?>" required="required" readonly="">
                            </div>
                            <div class="col-6 form-group">
                                <input type="email" class="form-control p-4" value="<?php echo $row['emailid']; ?>"
                                    placeholder="Your Email" required="required" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control p-4" placeholder="Car" name="about"
                                required="required">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control py-3 px-4" rows="5" placeholder="Message" name="message"
                                required="required"></textarea>
                        </div>
                        <div>
                            <center><button class="btn btn-primary py-3 px-5" type="submit" name="send">Send
                                    Message</button></center>
                        </div>
                    </form>
                    <?php

                    include "config.php";
                    if (isset($_POST['send'])) {
                        $uid = $_SESSION['uid'];
                        $about = $_POST['about'];
                        $message = $_POST['message'];
                        $date = date('y-m-d');

                        $qry = mysqli_query($con, "INSERT INTO `feedback`(`uid`, `about`, `message`, `fdate`) VALUES ('" . $uid . "','" . $about . "','" . $message . "','" . $date . "')");
                        echo "<script>alert('Success');</script>";

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