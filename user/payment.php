<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:login/userlogin.php");
}
?>

<?php include "header.php"; ?>

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Payment</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Payment</h6>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        include "config.php";
        $uid = $_SESSION['uid'];
        $id1 = $_GET['bid'];
        $id = $_GET['amt'];
        $qry = mysqli_query($con, "SELECT * FROM `booking`,vehicle WHERE booking.vid=vehicle.vid and bid=" . $id1);
        $row = mysqli_fetch_array($qry);
        ?>
        <form action="" method="POST" style="width:100%;">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form to add Payment</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-success">
                                <label for="successInput">Bookingid</label>
                                <input type="text" id="successInput" class="form-control" name="id1"
                                    value="<?php echo $id1; ?>" readonly="TRUE">
                            </div>
                            <div class="form-group has-success">
                                <label for="successInput">Title</label>
                                <input type="text" id="successInput" value="<?php echo $row['vname']; ?>"
                                    class="form-control" name="title" readonly="TRUE">
                                <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                            </div>
                            <div class="form-group has-success">
                                <label for="successInput">PaymentMethod</label>
                                <label for="chkYes">
                                    <input type="radio" id="chkYes" value="card" name="chkPassPort" required="" />
                                    Card
                                </label>
                                <label for="chkNo">
                                    <input type="radio" id="chkNo" value="cash" name="chkPassPort" required="" />
                                    Cash
                                </label>
                                <hr />
                                <div id="dvPassport" style="display: none">
                                    CardHolderName:
                                    <input type="text" id="txtPassportNumber" pattern="[A-Za-z\s]+"
                                        title="characters ad space only" class="form-control" />

                                    CardNumber:
                                    <input type="text" id="txtPassportNumber" pattern="^\d{16}$"
                                        title="16 digit numbers only" minlength="16"
                                        placeholder="Enter 16 digit Card Number" maxlength="16" class="form-control" />

                                    CVV:
                                    <input type="text" id="txtPassportNumber" pattern="^\d{3}$" title="3 digits only"
                                        maxlength="3" minlength="3" class="form-control" placeholder="Enter cvv"
                                        class="form-control" />

                                    ExpDate:
                                    <input type="date" id="txtPassportNumber" class="form-control"
                                        min="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label for="successInput">Amount</label>
                                <input type="number" id="successInput" class="form-control" name="amount"
                                    value="<?php echo $id; ?>" readonly="TRUE">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success" name="add" type="submit">Pay</button>
                    <button class="btn btn-danger" type="reset">Cancel</button>
                </div>
            </div>
        </form>
        <?php
        include "config.php";
        if (isset($_POST['add'])) {
            $uid = $_POST['uid'];
            $id1 = $_POST['id1'];
            $amount = $_POST['amount'];
            $chkPassPort = $_POST['chkPassPort'];
            $qry = mysqli_query($con, "INSERT INTO `payment`(`bid`, `uid`, `amount`, `method`, `pstatus`) VALUES ('" . $id1 . "','" . $uid . "','" . $amount . "','" . $chkPassPort . "','Paid')");
            $qry = mysqli_query($con, "UPDATE `booking` SET `bstatus`='PaymentDone' WHERE bid=" . $id1);
            echo "<script>alert('Payment done');window.location='index.php';</script>";
        }
        ?>
    </div>
</div>

<?php include "footer.php"; ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
<script type="text/javascript">
    $(function () {
        $("input[name='chkPassPort']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });
</script>

</body>

</html>