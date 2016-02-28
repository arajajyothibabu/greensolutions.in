<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if(!logged_in())
{
	redirect_to("index.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Green Solutions</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
$uname = $_GET['uname'];
?>
<h1 align="center">Gas Booking</h1>
<?php
$currentDate = date("Y-m-d");

if($_SESSION['lastdate'] != $currentDate)
{
	$query = mysql_query("INSERT into bookings values('','$uname','$currentDate')");
	$qry_to_update_lastDate = mysql_query("update users set lastDate = '$currentDate' where uname = '$uname'");
	$_SESSION['lastdate'] = $currentDate;
	if($query)
	{
		$message = "Booking your Gas is successfull..!<br><br><span style='color:black; font-size:20px;'> A total of Rs. 850/- deducted from your Account</span>";
		echo '<img src="images/s2.png">';
	}
}
else
 $message = "Sorry you can't book one more gas. Wait until next 30 days..!";

?>
<?php if (!empty($message)) {echo "<p id='err' align='\center\' style='background-color:#FFFFFF; font-size:18px; color:red;' class=\"message\">" . $message . "</p>";} ?>
</body>
</html>