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
<div id="topPan"><a href="index.html"><img src="images/logo.gif" title="Green Solutions" alt="Green Solutions" width="204" height="57" border="0"/></a>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="faq.html">FAQ  </a></li>
		<li><a href="contact.html">Contact us</a></li>
		<li><a href="logout.php">sign out </a></li>
	</ul>
</div>

<div id="headerPan">
  <h1 align="center">best Fresh Solution</h1>
</div>
<div id="bodyPan">
  <div id="centerPan">
  	<div id="bodyPan">
<br />
<br />
<br />
<?php
	//echo $_SESSION['lastdate'];
	$lastDate = new DateTime($_SESSION['lastdate']);
	$currentTime = new DateTime(date("Y-m-d"));
	$interval = $lastDate->diff($currentTime);
	//echo $interval->format('%a');
	if($interval->format('%a') > 30)
		$availability = "white";
	else
		$availability = "red";
	if($_SESSION['lastdate'] == 0)
		$availability = "white";
?>
<p align="center" style="background-color:#99CC00; color:#FFFFFF; font-size:18px;">
<a href="#" style="color:#FFF; padding-left:30px; padding-right:30px; text-decoration:none;" onclick="window.open('lastbooked.php?uname=<?php echo $_SESSION['user']; ?>','_child','left=200,top=50,width=610,height=850');">Last Booked Status</a>
 | <a href="#" style="color:#FFF; padding-left:30px; padding-right:30px; text-decoration:none;" onclick="window.open('history.php?uname=<?php echo $_SESSION['user']; ?>','_child','left=200,top=50,width=610,height=850');">History</a>
 |<a href="#" style="color:#FFF; padding-left:30px; padding-right:30px; text-decoration:none;" onclick="window.open('receipt.php?uname=<?php echo $_SESSION['user']; ?>','_child','left=200,top=50,width=610,height=850');">Receipt</a>
 | <a href="#" id="avail" style="color:<?php echo $availability; ?>;padding-left:30px; padding-right:30px; text-decoration:none;" onclick="giveAlert()">Availability</a>
 | <span style="color:#000; padding-left:20px;"><?php echo $_SESSION['user']; ?></span></p>
<div>
  <a href=""><img src="images/greenbooknow.png" onclick="return book();" title="Green Solutions" alt="Green Solutions" align="right" width="204" height="148" border="0" name="pic"/></a>
</div></div>
  </div>
</div>
<script type="text/javascript">
	function giveAlert()
	{
		if(document.getElementById("avail").style.color == "white")
		alert("You can book your Gas now..!");
		else
		alert("You cannot book your gas. Because it is not 30 days since you booked last..!");
		}
		
	function book()
	{
		if(document.getElementById("avail").style.color == "white")
		window.open('book.php?uname=<?php echo $_SESSION['user']; ?>','_child','left=200,top=50,width=610,height=850');
		else
		alert("You cannot book your gas. Because it is not 30 days since you booked last..!");
		}
</script>
</body>
</html>