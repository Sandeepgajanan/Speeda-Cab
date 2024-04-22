<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['did'])) {
    header("location:login/driverlogin.php");
}
?>

<?php include "header.php"; ?>

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Booking</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">View Booking</h6>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-5">My Booking</h1>
        <table class="table-responsive w-full rounded" style="width: 100%;">
            <thead>
                <tr>
                    <th class="border w-1/4 px-4 py-2">User Name</th>
                    <th class="border w-1/4 px-4 py-2">Vehicle Name</th>
                    <th class="border w-1/6 px-4 py-2">Bookdate</th>
                    <th class="border w-1/6 px-4 py-2">PickupLoc</th>
                    <th class="border w-1/7 px-4 py-2">Droploc</th>
                    <th class="border w-1/7 px-4 py-2">PhoneNumber</th>
                    <th class="border w-1/5 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "config.php";
                $qry = mysqli_query($con, "SELECT * FROM `booking`,`user`,`vehicle` where booking.uid=user.uid and vehicle.vid=booking.vid and vehicle.did=" . $_SESSION['did']);
                while ($row = mysqli_fetch_array($qry)) {
                    if ($qry) { ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo $row['name']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['vname']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['bdate']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['pickuplocation']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['droplocation']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['phonenumber']; ?></td>
                            <td class="border px-4 py-2">
                                <?php
                                $st = $row['bstatus'];
                                if ($st == 'Booked') { ?>
                                    <a href="confirmbook.php?did=<?php echo $row['bid']; ?>"
                                        onclick="return confirm('Are You Sure To Edit');"
                                        class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                        <i class="fas fa-thumbs-up"></i>
                                    </a>
                                    <a href="rejectbook.php?did=<?php echo $row['did']; ?>"
                                        onclick="return confirm('Are You Sure To Delete');"
                                        class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                <?php } elseif ($st == 'Confirmed') { ?>
                                    <span class="btn btn-primary">Confirmed</span>
                                <?php } elseif ($st == 'Rijected') { ?>
                                    <span class="btn btn-primary">Rijected</span>
                                <?php } elseif ($st == 'PaymentDone') { ?>
                                    <span class="btn btn-primary">PaymentDone</span>
                                <?php } ?>
                            </td>
                        <?php } else { ?>
                            <h1>Booking Not available</h1>
                        <?php } ?>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include "footer.php"; ?>

</body>

</html>