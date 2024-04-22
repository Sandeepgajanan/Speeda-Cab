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
                                Cab Form<button class="shadow bg-indigo-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" style="margin-left: 800px;"><a href="Cabs.php"><i class="fa fa-eye">View Cab</i></a></button>
                            </div>
                            <div class="p-3">
                                <?php
                                include "config.php";
                                $vid=$_GET['vid'];
                                $qry=mysqli_query($con,"SELECT * FROM vehicle where vid=".$vid);
                                $row=mysqli_fetch_array($qry);
                                ?>
                                <form class="w-full" action="" method="POST"  enctype="multipart/form-data">
                                    
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Cab Name
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" type="text" placeholder="Enter the Cab Name" name="vname" value="<?php echo $row['vname'];?>">
                                                   <input type="hidden" name="vid" value="<?php echo $vid;?>">
                                           
                                        </div>
                                    </div>

                                     <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Cab No
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" type="text" placeholder="Enter the Cab No" 
                                                   maxlength="10" minlength="10" title="enter 9 Characters either letter or digit" name="vno" readonly value="<?php echo $row['vno'];?>" >
                                           
                                        </div>
                                    </div>

                                      <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Cab Type
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" type="text" placeholder="Enter the Cab type" name="vtype"value="<?php echo $row['type'];?>">
                                           
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                           <img src="<?php echo $row['vimage'];?>" height="150" width="150"  required>
                                           
                                        </div>
                                    </div>

                                       <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Cab Image
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" type="file" placeholder="Enter the Cab type" name="image">
                                           
                                        </div>
                                    </div>

                                      <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Cab Amount for Book
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" type="text" placeholder="Enter the amount" value="<?php echo $row['vamount'];?>" name="vamount">
                                           
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
if(isset($_POST['edit']))
{
                                  # code...
                                        $vid=$_POST['vid'];
                                        $vname=$_POST['vname'];
                                        $vno=$_POST['vno'];
                                        $vtype=$_POST['vtype'];
                                        $vamount=$_POST['vamount'];
                                         $target_dir = "../uploads/";
                                        $image = $target_dir . basename($_FILES["image"]["name"]);
                                        move_uploaded_file($_FILES["image"]["tmp_name"],$image);
                                        


                                        $qry=mysqli_query($con,"UPDATE `vehicle` SET `vname`='".$vname."',`vno`='".$vno."',`type`='".$vtype."',`vimage`='".$image."',`vamount`='".$vamount."' WHERE vid=".$vid) or die(mysqli_error($con));

                                        echo "<script>alert('Cab Details Edited Successfully');window.location='Cabs.php';</script>";
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