<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
?>
<div class="mx-auto bg-grey-400">
    <div class="min-h-screen flex flex-col">
        <?php include "header.php"; ?>
        <div class="flex flex-1">
            <?php include "sidebar.php"; ?>
            <main class="bg-white-300 flex-1 p-3 overflow-hidden"
                style="background-image: url('uploads/speeda.jpg');background-size: cover; background-position: center">
                <div class="flex flex-col">
                    <h1 style="font-size:2.5em; text-transform:uppercase; color:white;text-align:center">
                        <?php echo "Welcome " . $_SESSION['user']; ?>
                    </h1>
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                    </div>
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include "footer.php"; ?>
</div>
<script src="./main.js"></script>
</body>

</html>