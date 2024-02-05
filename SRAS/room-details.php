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
	<title>Room Details</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row" id="print">


					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:5%">Room Details</h2>
						<div class="panel panel-default"style="background-color: grey; color: black;">
							<div class="panel-heading"style="background-color: grey; color: black;">All Entered Details of Booked Room</div>
							<div class="panel-body"style="background-color: grey; color: black;">
			<!--table id="zctb" class="table table-bordered " cellspacing="0" width="100%" border="1"-->
			<table id="zctb" class="table table-bordered" cellspacing="0" width="100%" border="1" style="background-color: lightgray; color: black; border: 1px solid black;">
									
						 <span style="float:left" ><i class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)" style="cursor:pointer" title="Print the Report"></i></span>			
									<tbody>
<?php	
$aid=$_SESSION['login'];
	$ret="select * from registration where (emailid=? || regno	=?)";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('ss',$aid,$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>

<tr>
<!--td colspan="6" style="text-align:center; color:blue"><h3>DIAMBAMBA Residence:Booking details</h3></td-->
<td colspan="6" style="text-align:center;border: 1px solid black;"><h3 style="border: 0px solid black;color:white; margin: 0;font-weight: bold; text-shadow: 2px 2px 4px black;">DIAMBAMBA Residence:</h3>
<h3 style="text-align:left;border: 0px solid black;">Booking details: </h3></td>
</tr>
<tr>
<th style="text-align:center;border: 1px solid black;">Student Number :</th>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->regno;?></td>
<th style="text-align:center;border: 1px solid black;">Booked Date & Time :</th>
<td colspan="3"style="border: 1px solid black;"><?php echo $row->postingDate;?></td>
</tr>



<tr>
<td style="text-align:center;border: 1px solid black;"><b>Room Number :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->roomno;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Floor :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->seater;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Monthly Payment :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $fpm=$row->feespm;?></td>
</tr>

<tr>
<td style="text-align:center;border: 1px solid black;"><b>Meal Status:</b></td>
<td>
<?php if($row->foodstatus==0)
{
echo "Without Food";
}
else
{
echo "With Food";
}
;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Stay From :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->stayfrom;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Duration:</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $dr=$row->duration;?> Months</td>
</tr>

<tr style="text-align:center;border: 1px solid black;"><th style="text-align:center;border: 1px solid black;"> Booking Fee:</th>
<td style="text-align:center;border: 1px solid black;"><?php echo $hf=$dr*$fpm?></td>
<th style="text-align:center;border: 1px solid black;">Meal Fee:</th>
<td colspan="3" style="border: 1px solid black;"><?php  
if($row->foodstatus==1)
{ 
echo $ff=(2000*$dr);
} else { 
echo $ff=0;
echo "<span style='padding-left:2%; color:red;'>(You chose the option excluding the meal plan).<span>";
}?></td>
</tr>
<tr style="text-align:center;border: 1px solid black;">
<th style="text-align:center;border: 1px solid black;">Expected Fee :</th>
<th colspan="5"style="border: 1px solid black;"><?php echo $hf+$ff;?></th>
</tr>
<tr style="text-align:left;border: 1px solid black;">
<td colspan="6" style="border: 1px solid black;color:dark"><h4>Personal Details: </h4></td>
</tr>

<tr>
<td style="text-align:center;border: 1px solid black;"><b>Student Number :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->regno;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Full Name(s):</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->firstName;?><?php echo $row->middleName;?><?php echo $row->lastName;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Student email address :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->emailid;?></td>
</tr>


<tr>
<td style="text-align:center;border: 1px solid black;"><b>Contact Number :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->contactno;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Gender :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->gender;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Course :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->course;?></td>
</tr>


<tr>
<td style="text-align:center;border: 1px solid black;"><b>Next of Kin: </b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->egycontactno;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Name of Guardian:</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->guardianName;?></td>
<td style="text-align:center;border: 1px solid black;"><b>Relation with Guardian :</b></td>
<td style="text-align:center;border: 1px solid black;"><?php echo $row->guardianRelation;?></td>
</tr>

<tr>
<td style="text-align:center;border: 1px solid black;"><b>Contact number of Guardian :</b></td>
<td colspan="6"style="border: 1px solid black;"><?php echo $row->guardianContactno;?></td>
</tr>

<tr >
<td colspan="6" style="border: 1px solid black;color:dark"><h4>Address: </h4></td>
</tr>
<tr style="text-align:center;border: 1px solid black;">
<td style="border: 1px solid black;"><b>Residential Address</b></td>
<td colspan="2"style="border: 1px solid black;">
<?php echo $row->corresAddress;?><br />
<?php echo $row->corresCIty;?>, <?php echo $row->corresPincode;?><br />
<?php echo $row->corresState;?>


</td>
<td style="text-align:center;border: 1px solid black;"><b>Postal Address</b></td>
<td colspan="2"style="border: 1px solid black;">
<?php echo $row->pmntAddress;?><br />
<?php echo $row->pmntCity;?>, <?php echo $row->pmntPincode;?><br />
<?php echo $row->pmnatetState;?>	

</td>
</tr>
<!---added personal code for billing system--->
<tr>
<td colspan="6" style="color:dark"><h4>Billing Method Chosen: </h4></td>
</tr>

<!--tr
<td><b>Chosen Payment Method</b></td>
<td colspan="6">

</td>
</tr-->

<td style="text-align:center;border: 1px solid black;"><b>Chosen Payment Method</b></td>
<td colspan="6"style="border: 1px solid black;">
<?php if($row->foodstatus==0)
{
echo "E-Wallet";
}
else
{
echo "Bank Transfer";
}
;?></td>

<!---added personal code for billing system-End-->

<?php
$cnt=$cnt+1;
} ?>
</tbody>
</!--table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

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
$(function () {
$("[data-toggle=tooltip]").tooltip();
    });
function CallPrint(strid) {
var prtContent = document.getElementById("print");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>

</html>
