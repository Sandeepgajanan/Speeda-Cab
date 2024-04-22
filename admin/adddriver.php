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
                                    Driver Form<button
                                        class="shadow bg-indigo-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        style="margin-left: 800px;"><a href="Drivers.php"><i class="fa fa-eye">View
                                                Driver</i></a></button>
                                </div>
                                <div class="p-3">
                                    <form class="w-full" action="" method="POST">

                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Driver Name
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="text" placeholder="Enter the Driver Name"
                                                    name="dname" required="">
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Driver Email
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="email" placeholder="Enter the Driver Email"
                                                    name="demail" required="">
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Driver Password
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="password"
                                                    placeholder="Enter the Driver Password" name="dpassword"
                                                    required="">
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Driver Contact
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="text" maxlength="10"
                                                    placeholder="Enter the Driver Contact" name="dcontact"
                                                    pattern="[0-9]+" title="10 digits only">
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Driver Address
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="text"
                                                    placeholder="Enter the Driver Address" name="daddress" required="">
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
                                        $demail = $_POST['demail'];
                                        $dcontact = $_POST['dcontact'];

                                        $sql = "select * from driver where demail='$demail' ";
                                        $result = mysqli_query($con, $sql);
                                        $count = mysqlI_num_rows($result);

                                        if ($count > 0) {
                                            echo "<script>alert('There is an existing driver account associated with this email.');</script>";
                                            echo "<script> location.href='adddriver.php'; </script>";
                                        } else {
                                            $dname = $_POST['dname'];
                                            $demail = $_POST['demail'];
                                            $dpassword = $_POST['dpassword'];
                                            $dcontact = $_POST['dcontact'];
                                            $daddress = $_POST['daddress'];

                                            $qry = mysqli_query($con, "INSERT INTO `driver`( `dname`, `dcontact`, `demail`, `daddress`, `password`) VALUES ('" . $dname . "','" . $dcontact . "','" . $demail . "','" . $daddress . "','" . $dpassword . "')") or die(mysqli_error($con));

                                            echo "<script>alert('Driver Details Saved Successfully');window.location='Drivers.php';</script>";
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