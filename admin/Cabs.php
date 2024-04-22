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
    <title>Speedaa-Cab</title>
</head>

<body>
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
                                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                    Cabs Detail<button
                                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        style="margin-left: 900px;"><a href="addcab.php"><i class="fa fa-plus">Add
                                                Cab</i></a></button>
                                </div>
                                <div class="p-3">
                                    <table class="table-responsive w-full rounded">
                                        <thead>
                                            <tr>
                                                <th class="border w-1/6 px-3 py-2">Cab Name</th>
                                                <th class="border w-1/6 px-3 py-2">Cab No</th>
                                                <th class="border w-1/6 px-3 py-2">Cab Type</th>
                                                <th class="border w-1/6 px-3 py-2">Cab Image</th>
                                                <th class="border w-1/6 px-3 py-2">Amount</th>
                                                <th class="border w-1/5 px-3 py-2" colspan="2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "config.php";
                                            $qry = mysqli_query($con, "SELECT * FROM vehicle");
                                            while ($row = mysqli_fetch_array($qry)) { ?>
                                                <tr>
                                                    <td class="border px-2 py-2"><?php echo $row['vname']; ?></td>
                                                    <td class="border px-3 py-2"><?php echo $row['vno']; ?></td>
                                                    <td class="border px-3 py-2"><?php echo $row['type']; ?></td>
                                                    <td><img src='<?php echo $row['vimage']; ?>' height="150" width="150">
                                                    </td>
                                                    <td class="border px-3 py-2"><?php echo $row['vamount']; ?></td>
                                                    <td class="border px-4 py-2">
                                                        <a href="Upcab.php?vid=<?php echo $row['vid']; ?>"
                                                            onclick="return confirm('Are You Sure To Edit');"
                                                            class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                            <i class="fas fa-edit"></i></a>
                                                        <a href="Delcab.php?vid=<?php echo $row['vid']; ?>"
                                                            onclick="return confirm('Are You Sure To Delete');"
                                                            class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                                            <i class="fas fa-trash"></i>
                                                        </a>

                                                        <?php
                                                        $st = $row['vstatus'];
                                                        if ($st == 'Notyet') { ?>
                                                            <a href="Assigndriver.php?vid=<?php echo $row['vid']; ?>"
                                                                onclick="return confirm('Are You Sure To assign');"
                                                                class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                                                <i class="fas fa-book"></i>
                                                            </a>

                                                        <?php } elseif ($st == 'Assigned') { ?>
                                                            <a href="viewdriver.php?did=<?php echo $row['did']; ?>"
                                                                class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500"
                                                                onclick="return confirm('Are You Sure To view');"><i
                                                                    class="fas fa-eye"></i></a>
                                                        <?php }
                                                        ?>
                                                    </td>

                                                <?php }
                                            ?>

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