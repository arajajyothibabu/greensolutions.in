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
<h1 align="center">Receipt</h1>
<hr />







<td align="center"><hr /></td></tr>

<?php
$query = mysql_query("select * from users where uname='$uname'");
while($query_result = mysql_fetch_array($query))
{
	echo '<table align="center" border="1">
	<tr><td><h3>Username</h3></td><td>'.$query_result['uname'].'</td></tr>
	<tr><td><h3>Account number</h3></td><td>'.$query_result['account'].'</td></tr>
	<tr><td><h3>Phone number</h3></td><td>'.$query_result['phone'].'</td></tr>
	<tr><td><h3>Price</h3></td><td><h3>Rs.820</h3></td></tr>
	<tr><td><h3>Delivery charges</h3></td><td>Rs.30</td></tr>
	<tr><td><h3>Delivery Address</h3></td><td>'.$query_result['address'].'</td></tr>';
	}

?>
<?php if (!empty($message)) {echo "<p id='err' align='\center' style='background-color:#FFFFFF; font-size:18px; color:red;' class=\"message\">" . $message . "</p>";} ?>
<tr id="print">
    <td colspan="2" align="center">
        <input type="button" onclick="printer()" value="Print">
    </td>
</tr>
</table>
<script type="text/javascript">
function printer()
    {
        document.getElementById("print").style.display = 'none';
        window.print();
    }
</script>
</body>
</html>
