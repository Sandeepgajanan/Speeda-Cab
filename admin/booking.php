<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <title>SpeedaaCab Admin</title>
</head>

<body>

    <div class="mx-auto bg-grey-lightest">

        <div class="min-h-screen flex flex-col">

            <?php include "header.php"; ?>

            <div class="flex flex-1">

                <?php include "sidebar.php"; ?>

                <main class="bg-white-500 flex-1 p-3 overflow-hidden">
                    <div class="flex flex-col">

                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        </div>


                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                    Booking Detail
                                </div>
                                <div class="p-3">
                                    <table class="table-responsive w-full rounded">
                                        <thead>
                                            <tr>
                                                <th class="border w-1/4 px-4 py-2">User Name</th>
                                                <th class="border w-1/6 px-4 py-2">Cabname</th>
                                                <th class="border w-1/6 px-4 py-2">Bookdate</th>
                                                <th class="border w-1/6 px-4 py-2">PickupLoc</th>
                                                <th class="border w-1/7 px-4 py-2">Droploc</th>
                                                <th class="border w-1/5 px-4 py-2">BookingStatus</th>
                                                <th class="border w-1/5 px-4 py-2">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "config.php";
                                            $qry = mysqli_query($con, "SELECT * FROM `booking`,`user`,`vehicle` where booking.uid=user.uid and vehicle.vid=booking.vid");
                                            while ($row = mysqli_fetch_array($qry)) {
                                                ?>
                                                <tr>
                                                    <td class="border px-4 py-2"><?php echo $row['name']; ?></td>
                                                    <td class="border px-4 py-2"><?php echo $row['vname']; ?></td>
                                                    <td class="border px-4 py-2"><?php echo $row['bdate']; ?></td>
                                                    <td class="border px-4 py-2"><?php echo $row['pickuplocation']; ?></td>
                                                    <td class="border px-4 py-2"><?php echo $row['droplocation']; ?></td>
                                                    <td class="border px-4 py-2"><?php echo $row['bstatus']; ?></td>
                                                    <td class="border px-4 py-2">
                                                        <?php
                                                        $st = $row['bstatus'];
                                                        if ($st == 'Booked') {
                                                            ?>
                                                            <a href="confirmbook.php?did=<?php echo $row['bid']; ?>"
                                                                onclick="return confirm('Are You Sure To Confirm');"
                                                                class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                                <i class="fas fa-thumbs-up"></i>
                                                            </a>
                                                            <a href="rejected.php?did=<?php echo $row['bid']; ?>"
                                                                onclick="return confirm('Are You Sure To Cancel');"
                                                                class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                                                <i class="fas fa-thumbs-down"></i>
                                                            </a>
                                                            <?php
                                                        } elseif ($st == 'Confirmed') {
                                                            ?>
                                                            <span class="btn btn-primary">Confirmed</span>
                                                            <?php
                                                        } elseif ($st == 'Rejected') {
                                                            ?>
                                                            <span class="btn btn-primary">Rejected</span>
                                                            <?php
                                                        } elseif ($st == 'PaymentDone') {
                                                            ?>
                                                            <span class="btn btn-primary">PaymentDone</span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Grid Form -->
                    </div>
                </main>
                <!-- /Main -->
            </div>
            <!-- Footer -->
            <?php include "footer.php"; ?>
            <!-- /Footer -->
        </div>
    </div>

    <script src="./main.js"></script>

</body>

</html>