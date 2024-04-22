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
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                    Cab Form<button
                                        class="shadow bg-indigo-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        style="margin-left: 800px;"><a href="Cabs.php"><i class="fa fa-eye">View
                                                Cab</i></a></button>
                                </div>
                                <div class="p-3">
                                    <form class="w-full" action="" method="POST" enctype="multipart/form-data">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Cab Name
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="text" placeholder="Enter the Cab Name"
                                                    name="vname" required="">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Cab No
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="text" maxlength="10" minlength="10"
                                                    placeholder="Enter the Cab No" name="vno"
                                                    title="enter 9 Characters either letter or digit"
                                                    pattern="[A-Za-z0-9\s]+" required="">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Cab Type
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="text" placeholder="Enter the Cab type"
                                                    name="vtype" required="">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Cab Image
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="file" placeholder="Enter the Cab type"
                                                    name="image" required="">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Cab Amount for Book
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="number"
                                                    placeholder="Enter the amount per cab" name="vamount"
                                                    pattern="[0-9]+" title="numbers only" min="2000">
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button
                                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    type="submit" name="save">
                                                    Save
                                                </button>
                                                <button
                                                    class="shadow bg-red-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    type="reset">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['save'])) {
                                        error_reporting(1);
                                        include ("config.php");
                                        $vno = $_POST['vno'];
                                        $sql = "select * from vehicle where vno='$vno'";
                                        $result = mysqli_query($con, $sql);
                                        $count = mysqlI_num_rows($result);
                                        if ($count > 0) {
                                            echo "<script>alert('There is an existing car associated with this cabnumber.');</script>";
                                            echo "<script> location.href='addcab.php'; </script>";
                                        } else {
                                            $vname = $_POST['vname'];
                                            $vno = $_POST['vno'];
                                            $vtype = $_POST['vtype'];
                                            $vamount = $_POST['vamount'];
                                            $target_dir = "../uploads/";
                                            $image = $target_dir . basename($_FILES["image"]["name"]);
                                            move_uploaded_file($_FILES["image"]["tmp_name"], $image);
                                            $qry = mysqli_query($con, "INSERT INTO `vehicle`( `vname`, `vno`, `type`,`vimage`,`vamount`) VALUES ('" . $vname . "','" . $vno . "','" . $vtype . "','" . $image . "','" . $vamount . "')") or die(mysqli_error($con));
                                            echo "<script>alert('Cab Details Saved Successfully');window.location='Cabs.php';</script>";
                                        }
                                    }
                                    ?>
                                </div>
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