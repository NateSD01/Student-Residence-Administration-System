<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>DashBoard</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body>
<?php include("includes/header.php");?>

	<div class="ts-main-content">
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row" >
					<div class="col-md-12">

						<h2 class="page-title" style="margin-top:10%; color: navy; font-weight:bold;">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<!-- Original Code-->
									<!--<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">


												<i class= "fa fa-user fa-4x"></i>
													<div class="stat-panel-number h1 ">Update Details</div>
													
												</div>
											</div>
											<a href="my-profile.php" class="block-anchor panel-footer"style="background-color: black; color:white;">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>-->

									<!--added code--->

									<div class="col-md-3">
										<div class="panel panel-default">	
											<!-- Use the panel-body as a container for the background image -->
											<div class="panel-body bk-primary text-white" style="background-image: url('update-details.jpg'); background-size: cover; background-position: center;">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">Update Details</div>
												</div>
											</div>
											<a href="my-profile.php" class="block-anchor panel-footer " style="background-color: black; color: white;">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<!--added code--->

									<!-- Original Code-->
									<!--div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">

												<i class= "fa fa-bed fa-4x"></i>

												<div class="stat-panel-number h1 ">My Room</div>
													
												</div>
											</div>
											<a href="room-details.php" class="block-anchor panel-footer text-center"style="background-color: black;color:white;">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
										</!--div-->

										
									<!--added code--->

									<div class="col-md-3">
										<div class="panel panel-default">	
											<!-- Use the panel-body as a container for the background image -->
											<div class="panel-body bk-primary text-white" style="background-image: url('my-room.jpg'); background-size: cover; background-position: center;">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">My Room</div>
												</div>
											</div>
											<a href="room-details.php" class="block-anchor panel-footer text-center" style="background-color: black; color: white;">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<!--added code--->

									<!--Original Code-->
										<!---Personal code for code of conduct and maintenace  -->
						<!--div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-white">
												<div class="stat-panel text-center">

												<i class= "fa fa-wrench fa-4x"></i>

												<div class="stat-panel-number h1 ">Maintenance Schedule</div>
													
												</div>
											</div>
											<a href=".php" class="block-anchor panel-footer"style="background-color: black;color:white;">See Schedule &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</!--div-->

									<!--added code--->
									<div class="col-md-3">
										<div class="panel panel-default">	
											<!-- Use the panel-body as a container for the background image -->
											<div class="panel-body bk-primary text-white " style="background-image: url('maintenance-schedule.jpg'); background-size: cover; background-position: center;">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">Maintenance Schedule</div>
												</div>
											</div>
											<a href="maintenance-schedule.php" class="block-anchor panel-footer " style="background-color: black; color: white;">See Schedule &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<!--added code--->


						<!--Original code--->

						<!---Personal code for code of conduct and maintenace   -->
						<!--div class="col-md-3">
										<div-- class="panel panel-default">
											<div class="panel-body bk-warning text-white">
												<div class="stat-panel text-center">


												<i class="fa solid fa-book fa-4x"></i>
												
												

						<div class="stat-panel-number h1 ">Residence Information</div>
													
													</div>
												</div>
												<a href="terms-conditions.php" class="block-anchor panel-footer"style="background-color: black;color:white;">Full Details <i class="fa fa-arrow-right"></i></a>
											</div-->
						

						<!---Personal code for code of conduct and maintenace  -->

						<!--Original Code--->
								<!--added code--->
								<div class="col-md-3">
										<div class="panel panel-default">	
											<!-- Use the panel-body as a container for the background image -->
											<div class="panel-body bk-primary text-white " style="background-image: url('residence-information.jpg'); background-size: cover; background-position: center;">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">Residence Conduct</div>
												</div>
											</div>
											<a href="terms-conditions.php" class="block-anchor panel-footer " style="background-color: black; color: white;">See Obligations &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<!--added code--->



									<!--added code--->
								<div class="col-md-3">
										<div class="panel panel-default">	
											<!-- Use the panel-body as a container for the background image -->
											<div class="panel-body bk-primary text-black " style="background-image: url('announcement.jpg'); background-size: cover; background-position: center;">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">ANNOUNCE MENTS</div>
												</div>
											</div>
											<a href="announce-page.php" class="block-anchor panel-footer " style="background-color: black; color: white;">Check Announcements &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<!--added code--->







									</div>
							
								</div>
							</div>
						</div>



				
	
					

<!--------------------------------------------original part-------------------------->

						<!---Personal code for code of conduct and maintenace  -->
						<!--remove these two lines<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-white">
												<div class="stat-panel text-center">

												<div class="stat-panel-number h1 ">Maintenance</div>
													
												</div>
											</div>
											<a href=".php" class="block-anchor panel-footer"style="background-color: black;color:white;">See Schedule &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div remove these two lines-->

						<!---Personal code for code of conduct and maintenace   -->
						<!--remove these two lines<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-white">
												<div class="stat-panel text-center">
						<div class="stat-panel-number h1 ">Code of Conduct</div>
													
													</div>
												</div>
												<a href="terms-conditions.php" class="block-anchor panel-footer"style="background-color: black;color:white;">Full Details <i class="fa fa-arrow-right"></i></a>
											</div remove these two lines-->
						

						<!---Personal code for code of conduct and maintenace  -->


						<!---Personal code for code of conduct and maintenace   -->



					</div>
				</div>

			</div>
		</div>
	</div>


	  <!-- footer -->
            <!-- ============================================================== -->
            <!--?php include '../includes/footer.php' ?-->
			<?php include("includes/footer.php");?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
	  

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

	
    

</body>

</html>