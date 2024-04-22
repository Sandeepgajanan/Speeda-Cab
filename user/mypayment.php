<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:login/userlogin.php");
}
?>


<?php include "header.php"; ?>

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">My Payment</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">My Payment</h6>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-5">My Payment</h1>
        <div class="row">
            <table class="table-responsive w-full rounded">
                <thead>
                    <tr>
                        <th class="border w-1/4 px-4 py-2">User Name</th>
                        <th class="border w-1/6 px-4 py-2">Cabname</th>
                        <th class="border w-1/6 px-4 py-2">Bookdate</th>
                        <th class="border w-1/6 px-4 py-2">PickupLoc</th>
                        <th class="border w-1/7 px-4 py-2">Droploc</th>
                        <th class="border w-1/5 px-4 py-2">Amount</th>
                        <th class="border w-1/5 px-4 py-2">Process</th>
                    </tr>
                </thead>
                <tbody>

                    <?php include "config.php";

                    $qry = mysqli_query($con, "SELECT * FROM payment INNER JOIN booking ON payment.bid=booking.bid INNER JOIN vehicle on vehicle.vid=booking.vid WHERE payment.uid=" . $_SESSION['uid']);
                    while ($row = mysqli_fetch_array($qry)) { ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo $_SESSION['uname']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['vname']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['bdate']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['pickuplocation']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['droplocation']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['amount']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['pstatus']; ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

</body>

</html>