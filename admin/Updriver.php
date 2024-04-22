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
        <?php include "header.php";?>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <?php include "sidebar.php";?>
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
                                Driver Form<button class="shadow bg-indigo-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" style="margin-left: 800px;"><a href="Drivers.php"><i class="fa fa-eye">View Driver</i></a></button>
                            </div>
                            <div class="p-3">

                                <?php 
                                include "config.php";
                                $did=$_GET['did'];
                                $qry=mysqli_query($con,"SELECT * FROM driver where did=".$did);
                                $row=mysqli_fetch_array($qry);
                                ?>
                                <form class="w-full" action="" method="POST">
                                    
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Driver Name
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" type="text" placeholder="Enter the Driver Name" name="dname" value="<?php echo $row['dname'];?>">
                                                   <input type="hidden" name="did" value="<?php echo $did;?>">
                                           
                                        </div>
                                    </div>

                                     <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Driver Email
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" type="email" placeholder="Enter the Driver Email" name="demail" readonly value="<?php echo $row['demail'];?>">
                                           
                                        </div>
                                    </div>

                                      <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Driver Password
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" type="password" placeholder="Enter the Driver Password" name="dpassword" value="<?php echo $row['password'];?>">
                                           
                                        </div>
                                    </div>

                                      <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Driver Contact
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                           title="10 digits only" id="grid-password" type="text"  pattern="[1-9]{1}[0-9]{9}"  placeholder="Enter the Driver Contact" name="dcontact"  maxlength="10" minlength="10"  value="<?php echo $row['dcontact'];?>">
                                           
                                        </div>
                                    </div>

                                      <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Driver Address
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" type="text" placeholder="Enter the Driver Address" name="daddress" value="<?php echo $row['daddress'];?>">
                                           
                                        </div>
                                    </div>

                                    <div class="md:flex md:items-center">
                                        <div class="md:w-1/3"></div>
                                        <div class="md:w-2/3">
                                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    type="submit" name="edit">
                                                Update
                                            </button>

                                              <button class="shadow bg-red-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    type="reset" >
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <?php
                                    include "config.php";


                                    if (isset($_POST['edit'])) {
                                        # code...
                                        $did=$_POST['did'];
                                        $dname=$_POST['dname'];
                                        $demail=$_POST['demail'];
                                        $dpassword=$_POST['dpassword'];
                                        $dcontact=$_POST['dcontact'];
                                        $daddress=$_POST['daddress'];


                                        $qry=mysqli_query($con,"UPDATE `driver` SET `dname`='".$dname."',`dcontact`='".$dcontact."',`demail`='".$demail."',`daddress`='".$daddress."',`password`='".$dpassword."' WHERE did=".$did) or die(mysqli_error($con));

                                        echo "<script>alert('Driver Details Edited Successfully');window.location='Drivers.php';</script>";
                                    }
                                ?>
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
        <?php include "footer.php";?>
        <!--/footer-->

    </div>

</div>

<script src="./main.js"></script>

</body>

</html>