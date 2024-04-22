<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
	<meta charset="utf-8">
	<title>SPEEDAACAB</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/sourcesanspro-font.css">
	<link rel="stylesheet" href="css/style.css" />
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
						<button class="tablinks" onclick="openCity(event, 'sign-in')">Driver Log-In</button>
					</div>
				</div>
				<form class="form-detail" action="" method="POST">
					<div class="tabcontent" id="sign-in">
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="emailid" id="your_email_1" class="input-text" required>
								<span class="label">E-Mail</span>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="password" name="password" id="password_1" class="input-text" required>
								<span class="label">Password</span>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row-last">
							<input type="submit" name="signin" class="register" value="Sign In">
						</div>
					</div>
				</form>
				<?php
				include "../config.php";
				if (isset($_POST['signin'])) {
					$emailid = $_POST['emailid'];
					$password = $_POST['password'];
					$qry = mysqli_query($con, "SELECT * FROM driver where demail='$emailid' and password='$password'");
					if ($qry && mysqli_num_rows($qry) > 0) {
						$row = mysqli_fetch_array($qry);
						$did = $row['did'];
						$dname = $row['dname'];
						$_SESSION['did'] = $did;
						$_SESSION['dname'] = $dname;
						echo "<script>alert('Success');window.location='../index.php';</script>";
					} else {
						echo "<script>alert('Invalid email or password');</script>";
					}
				}
				?>

			</div>
		</div>
	</div>

</body>

</html>