<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
?>
<div class="mx-auto bg-grey-lightest">
    <div class="min-h-screen flex flex-col">
        <?php include "header.php"; ?>
        <div class="flex flex-1">
            <?php include "sidebar.php"; ?>
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">
                <div class="flex flex-col">
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                    </div>
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                        <tr>
                                            <th class="border w-1/4 px-4 py-2">User Name</th>
                                            <th class="border w-1/6 px-4 py-2">Cabname</th>
                                            <th class="border w-1/6 px-4 py-2">Bookdate</th>
                                            <th class="border w-1/6 px-4 py-2">Price</th>
                                            <th class="border w-1/7 px-4 py-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "config.php";
                                        $qry = mysqli_query($con, "SELECT * FROM payment INNER join booking on payment.bid=booking.bid INNER JOIN vehicle ON booking.vid=vehicle.vid INNER JOIN user on user.uid=booking.uid");
                                        while ($row = mysqli_fetch_array($qry)) { ?>
                                            <tr>
                                                <td class="border px-4 py-2"><?php echo $row['name']; ?></td>
                                                <td class="border px-4 py-2"><?php echo $row['vname']; ?></td>
                                                <td class="border px-4 py-2"><?php echo $row['bdate']; ?></td>
                                                <td class="border px-4 py-2"><?php echo $row['amount']; ?></td>
                                                <td class="border px-4 py-2"><?php echo $row['pstatus']; ?></td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <?php include "footer.php"; ?>
    </div>
</div>
<script src="./main.js"></script>
</body>

</html>