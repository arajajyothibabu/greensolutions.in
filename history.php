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
<br />
<h1 align="center">Booking History</h1>
<hr />
<table align="center">
<tr><td><h3>SNO</h3></td><td>&nbsp;</td><td><h3>Date of Booking</h3></td></tr>
<tr><td colspan="3"><hr /></td></tr>
<?php
$query = mysql_query("select * from bookings where uname='$uname'");
$i = 1;
while($query_result = mysql_fetch_array($query))
{
	echo '<tr><td>'.$i.'</td><td>&nbsp;</td><td>'.$query_result['date'].'</td></tr>';
	$i += 1;
	}
if($i == 1)
$message = "Welcome for your first booking..!";

?>
<?php if (!empty($message)) {echo "<p id='err' align='\center\' style='background-color:#FFFFFF; font-size:18px; color:red;' class=\"message\">" . $message . "</p>";} ?>
</table>
</body>
</html>
