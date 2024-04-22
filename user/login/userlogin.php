<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Speedacab</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="form-v8">
  <div class="page-content">
    <div class="form-v8-content">
      <div class="form-left">
        <img src="images/logo.png" alt="form">
      </div>
      <div class="form-right">
        <div class="tab">
          <div class="tab-inner">
            <button class="tablinks" onclick="openCity(event, 'sign-up')" id="defaultOpen">Sign Up</button>
          </div>
          <div class="tab-inner">
            <button class="tablinks" onclick="openCity(event, 'sign-in')">Sign In</button>
          </div>
        </div>
        <form class="form-detail" action="" method="POST">
          <div class="tabcontent" id="sign-up">
            <div class="form-row">
              <input type="text" name="uname" class="input-text" placeholder="Enter user name" required>
            </div>
            <div class="form-row">
              <input type="email" name="emailid" class="input-text" placeholder="Enter Email" required>
            </div>
            <div class="form-row">
              <input type="text" name="contno" class="input-text" pattern="[1-9]{1}[0-9]{9}" maxlength="10"
                minlength="10" placeholder="Enter your contact number" required>
            </div>
            <div class="form-row">
              <input type="text" name="addr" class="input-text" placeholder="Enter your address" required>
            </div>
            <div class="form-row">
              <input type="password" name="password" class="input-text" placeholder="Enter your password" required>
            </div>
            <div class="form-row-last">
              <input type="submit" name="register" class="register" value="Register">
            </div>
          </div>
        </form> <?php
        include "../config.php";
        if (isset($_POST['register'])) {
          error_reporting(1);

          $emailid = $_POST['emailid'];

          $sql = "select * from user where emailid='$emailid'";
          $result = mysqli_query($con, $sql);
          $count = mysqlI_num_rows($result);

          if ($count > 0) {
            echo "<script>
                alert('There is an existing account associated with this email.');
            </script>";
            echo "<script> location.href='userlogin.php'; </script>";
          } else {

            $uname = $_POST['uname'];
            $emailid = $_POST['emailid'];
            $contno = $_POST['contno'];
            $addr = $_POST['addr'];
            $password = $_POST['password'];



            # code...
            $qry = mysqli_query($con, "INSERT INTO `user`( `name`, `addr`, `contno`, `emailid`, `password`) VALUES ('" . $uname . "','" . $addr . "','" . $contno . "','" . $emailid . "','" . $password . "')") or die(mysqli_error($con));

            echo "<script>alert('Sign up Success');</script>";

          }
        }
        ?>
        <form class="form-detail" action="" method="POST">
          <div class="tabcontent" id="sign-in">
            <div class="form-row">
              <input type="text" name="emailid" class="input-text" placeholder="Enter your email" required>
            </div>
            <div class="form-row">
              <input type="password" name="password" class="input-text" placeholder="Enter your password" required>
            </div>
            <div class="form-row-last">
              <input type="submit" name="signin" class="register" value="Sign In">
            </div>
          </div>
        </form>
        <?php

        if (isset($_POST['signin'])) {
          # code...
          $emailid = $_POST['emailid'];
          $password = $_POST['password'];

          $qry = mysqli_query($con, "SELECT * FROM user where emailid='$emailid' and password='$password'");
          $row = mysqli_fetch_array($qry);
          $num = mysqli_num_rows($qry);
          $uid = $row['uid'];
          $uname = $row['name'];
          if ($num > 0) {
            # code...
        
            $_SESSION['uid'] = $uid;
            $_SESSION['uname'] = $uname;

            echo "<script>alert('Success');window.location='../index.php';</script>";
          }
          echo "<script>alert('No such email or password');window.location='../index.php';</script>";
        }
        ?>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
  </script>
</body>

</html>