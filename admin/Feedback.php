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
      <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
          <div class="container-fluid">
            <div class="row mt-3">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title" style="text-align: center; font-size:1.5em;text-transform:uppercase">
                      <b>FeedBacks</b>
                    </h5>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Car</th>
                            <th>Message</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <?php
                        include ("config.php");
                        $sql4 = "SELECT * FROM `feedback`,`user`where feedback.uid=user.uid ";
                        $result4 = mysqli_query($con, $sql4);
                        $count4 = mysqli_num_rows($result4);

                        if ($count4 > 0) {
                          $sl = 0;
                          while ($row4 = mysqli_fetch_array($result4)) {
                            $name = $row4['name'];
                            $email = $row4['emailid'];
                            $sub = $row4[2];
                            $msg = $row4[3];
                            $date = $row4[4];
                            ?>
                            <tr>
                              <td><?php echo $name; ?></td>
                              <td><?php echo $email; ?></td>
                              <td><?php echo $sub; ?></td>
                              <td><?php echo $msg; ?></td>
                              <td><?php echo $date; ?></td>
                            </tr>
                          <?php }
                        } ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include "footer.php"; ?>
          <script src="./main.js"></script>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>