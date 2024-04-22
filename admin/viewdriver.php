<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    # code...
    header("location:login.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>SPEEDAACAB Admin</title>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-lightest">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            <?php include "header.php"; ?>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                <?php include "sidebar.php"; ?>
                <!--/Sidebar-->
                <!--Main-->
                <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                            <!--Horizontal form-->
                            <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                                <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                    <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                        Driver View<button
                                            class="shadow bg-indigo-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            style="margin-left: 800px;"><a href="Cabs.php"><i class="fa fa-eye">View
                                                    Cabs</i></a></button>
                                    </div>
                                    <div class="p-3">
                                        <?php
                                        include "config.php";
                                        $vid = $_GET['did'];
                                        // $vqry=mysqli_query($con,"SELECT * FROM vehicle where vid=".$vid);
                                        // $row=mysqli_fetch_array($vqry);
                                        ?>
                                        <form class="w-full" action="" method="POST">

                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <div class="w-full px-3">
                                                    <label
                                                        class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                        for="grid-password">
                                                        Driver Name
                                                    </label>
                                                    <?php
                                                    // Assuming $con is your database connection
                                                    $dry = mysqli_query($con, "SELECT * FROM driver, vehicle WHERE driver.did = vehicle.did AND vstatus='Assigned' AND vehicle.did=" . $vid);

                                                    try {
                                                        $drow = mysqli_fetch_array($dry);
                                                        if ($drow) {
                                                            echo $drow['dname'];
                                                        } else {
                                                            echo 'No driver assigned';
                                                        }
                                                    } catch (\Throwable $th) {
                                                        echo 'Error occurred: ' . $th->getMessage();
                                                    }
                                                    ?>


                                                </div>
                                            </div>








                                            <div class="md:flex md:items-center">
                                                <div class="md:w-1/3"></div>
                                                <div class="md:w-2/3">
                                                    <a class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                        type="submit" name="save" href="index.php">
                                                        Back To Home
                                                    </a>


                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                            <!--/Horizontal form-->

                            <!--Underline form-->

                            <!-- /Cards Section Ends Here -->

                            <!--Grid Form-->


                            <!--/Grid Form-->
                        </div>
                </main>
                <!--/Main-->
            </div>
            <!--Footer-->
            <?php include "footer.php"; ?>
            <!--/footer-->

        </div>

    </div>

    <script src="./main.js"></script>

</body>

</html>