<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$contact=$_POST['contact'];
$stmt=$mysqli->prepare("SELECT email,contactNo,password FROM userregistration WHERE (email=? && contactNo=?) ");
				$stmt->bind_param('ss',$email,$contact);
				$stmt->execute();
				$stmt -> bind_result($username,$email,$password);
				$rs=$stmt->fetch();
				if($rs)
				{
				$pwd=$password;				
				}

				else
				{
					echo "<script>alert('Invalid Email/Contact no or password');</script>";
				}
			}
				?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Student Password Retrieval</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head
<body>
	
	<!--div class="login-page bk-img" style="background-image: url(img/login-back.jpg);"-->
		<!--div class="form-content"-->
		<div class="form-content"style="background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('residencefullview.jpeg'); height: 100vh;">
			<!--div class="container"-->
			<div class="container"style="background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('residencefullview.jpeg'); height: 100vh;">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<!--h1 class="text-center text-bold text-light mt-4x">Forgot Password</h1-->
						<h1 class="text-center mt-4x" style="font-weight: bold; text-shadow: 2px 2px brown; color: black;">Forgot Password</h1>

						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
							<?php if(isset($_POST['login']))
{ ?>
					<p>Your Password is <?php echo $pwd;?><br> Change your Password after login,for optimal security</p>
					<?php }  ?>
								<form action="" class="mt" method="post">
									<label for="" class="text-uppercase text-sm">Your Student Email Address</label>
									<input type="email" placeholder="Enter your student email address" name="email" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Your Contact number</label>
									<input type="text" placeholder="Enter your contact number linked to student email" name="contact" class="form-control mb">
									

									<input type="submit" name="login" class="btn btn-primary btn-block" value="Click to login" style="background-color: navy;">
								</form>
							</div>
						</div>
						<div class="text-center text-light">
							<a href="index.php" class="text-light">Sign in?</a>
						</div>
					</div>
				</div>
			</!--div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>