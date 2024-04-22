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
    <title>SpeedaaCab Admin</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
       <?php include "header.php";?>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <?php include"sidebar.php";?>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <!--Horizontal form-->
                        
                        <!--/Horizontal form-->

                        <!--Underline form-->
                        
                        <!--/Underline form-->
                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!--Grid Form-->

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Drivers Detail<button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" style="margin-left: 900px;"><a href="adddriver.php"><i class="fa fa-plus">Add Driver</i></a></button>
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/4 px-4 py-2">Driver Name</th>
                                        <th class="border w-1/6 px-4 py-2">Email</th>
                                        <th class="border w-1/6 px-4 py-2">Password</th>
                                        <th class="border w-1/6 px-4 py-2">Contact</th>
                                        <th class="border w-1/7 px-4 py-2">Address</th>
                                        <th class="border w-1/5 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                            include "config.php";

                                            $qry=mysqli_query($con,"SELECT * FROM booking,");
                                            while ($row=mysqli_fetch_array($qry)) { ?>
                                              

                                                <tr>
                                            <td class="border px-4 py-2"><?php echo $row['dname'];?></td>
                                            <td class="border px-4 py-2"><?php echo $row['demail'];?></td>
                                            <td class="border px-4 py-2"><?php echo $row['password'];?></td>
                                            <td class="border px-4 py-2"><?php echo $row['dcontact'];?></td>
                                            <td class="border px-4 py-2">
                                                <?php echo $row['daddress'];?>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <!-- <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white"> -->
                                                        <!-- <i class="fas fa-eye"></i></a> -->
                                                <a href="Updriver.php?did=<?php echo $row['did'];?>" onclick="return confirm('Are You Sure To Edit');"class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"></i></a>
                                                <a href="Deldriver.php?did=<?php echo $row['did'];?>" onclick="return confirm('Are You Sure To Delete');" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                                            </td>

                                          <?php  }
                                        ?>
                                        
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
       <?php include "footer.php";?>
        <!--/footer-->

    </div>

</div>

<script src="./main.js"></script>

</body>

</html>