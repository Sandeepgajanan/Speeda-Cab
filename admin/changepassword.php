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
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                    Change Password
                                </div>
                                <div class="p-3">
                                    <form class="w-full" action="" method="POST" enctype="multipart/form-data">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Old Password
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="password"
                                                    placeholder="Enter the old password" name="opwd">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    New Password
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="password"
                                                    placeholder="Enter the new password" name="npwd">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                    for="grid-password">
                                                    Confirm Password
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="grid-password" type="password"
                                                    placeholder="Enter the Confirm password" name="cpwd">
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button
                                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    type="submit" name="change">
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
                                    include 'config.php';
                                    $uid = $_SESSION['aid'];
                                    if (isset($_POST['change'])) {
                                        $opwd = $_POST['opwd'];
                                        $npwd = $_POST['npwd'];
                                        $cpwd = $_POST['cpwd'];
                                        $sql = mysqli_query($con, "SELECT * from admin where aid='$uid' and password='$opwd'") or die(mysqli_error($con));
                                        $nrows = mysqli_num_rows($sql);
                                        if ($nrows == 1) {
                                            if ($npwd == $cpwd) {
                                                $qry = mysqli_query($con, "UPDATE admin set password='$npwd' where aid='$uid'") or die(mysqli_error($con));
                                                if ($qry) {
                                                    echo '<script>alert("Successfully Changed the password");window.location="../index.php";</script>';
                                                } else {
                                                    echo '<script>alert("Failed to change");</script>';
                                                }
                                            } else {
                                                echo '<script>alert("New Password and Confirm Password mismatch ...try again!!!!");</script>';
                                            }
                                        } else {
                                            echo '<script>alert("Current password is not matching...try again!!!!");</script>';
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