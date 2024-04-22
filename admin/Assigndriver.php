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
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <title>Speedaa-Cab</title>
</head>

<body>

<div class="mx-auto bg-grey-lightest">
    <div class="min-h-screen flex flex-col">
        <?php include "header.php";?>

        <div class="flex flex-1">
         
            <?php include "sidebar.php";?>
      
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
            
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                    
                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="p-3">
                                <?php
                                    include "config.php";
                                    $vid=$_GET['vid'];
                                   
                                ?>
                                <form class="w-full" action="" method="POST">
                                    
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-password">
                                                Driver Name
                                            </label>
                                            <input  type="hidden" placeholder="Enter the Driver Name" name="vid" value="<?php echo $vid;?>">
                                            <select class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="grid-password" name="did" required="">
                                                   <option>Select Driver</option>
                                                       <?php
                                                            $qry=mysqli_query($con,"SELECT * FROM driver");
                                                            while ($row=mysqli_fetch_array($qry)) { ?>
                                                                
                                                                <option value="<?php echo $row['did'];?>"><?php echo $row['dname'];?></option>
                                                        <?php    }
                                                       ?>
                                                   </select>
                                           
                                        </div>
                                    </div>

                                    <div class="md:flex md:items-center">
                                        <div class="md:w-1/3"></div>
                                        <div class="md:w-2/3">
                                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    type="submit" name="save">
                                                Assign
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


                                    if (isset($_POST['save'])) {
                                        # code...
                                        $vid=$_POST['vid'];
                                        $did=$_POST['did'];
                                       
                                        $qry=mysqli_query($con,"UPDATE `vehicle` SET `did`='".$did."',`vstatus`='Assigned' WHERE vid=".$vid) or die(mysqli_error($con));
                                        echo "<script>alert('Driver Details Saved Successfully');window.location='Cabs.php';</script>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </main>
            
        </div>
        <!--Footer-->
        <?php include "footer.php";?>
        <!--/footer-->

    </div>

</div>

<script src="./main.js"></script>

</body>

</html>