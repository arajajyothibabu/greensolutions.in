<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if(logged_in())
{
	redirect_to("profile.php");
	}
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Green Solutions</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<?php

if(isset($_POST['submit'])){
	$uname = $_POST['uname'];
	$password = $_POST['pwd'];
	$queryresult = mysql_query("select * from users where uname = '{$uname}' and pwd = '{$password}';");
	confirm_query($queryresult);
			if (mysql_num_rows($queryresult) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysql_fetch_array($queryresult);
				$_SESSION['user'] = $found_user['uname'];
				$_SESSION['lastdate'] = $found_user['lastDate'];
				redirect_to("profile.php?link=null");
			}
			else{
			$message = "Username/password combination incorrect.<br />
			Please make sure your caps lock key is off and try again.";
			//redirect_to("index.php");
		}
	}

?>

<body>
<div id="topPan"><a href="index.html"><img src="images/logo.gif" title="Green Solutions" alt="Green Solutions" width="204" height="57" border="0"/></a>
	<ul>
		<li><span>Home</span></li>
		<li><a href="faq.html">FAQ  </a></li>
		<li><a href="contact.html">Contact us </a></li>
	</ul>
</div>

<div id="headerPan">
  <h1 align="center">best Fresh Solution</h1>
</div>

<div id="bodyPan">
<?php if (!empty($message)) {echo "<tr><td><p id='err' style='background-color:#FFFFFF; color:red;' class=\"message\">" . $message . "</p></td></tr>";} ?>
  <div id="leftPan">
    <div id="leftmemberPan">
      <h2>member <span>login</span></h2>
    <form name="lf" id="login" action="" onsubmit="return validate()" method="post">
	<label>user id </label>
	  <input type="text" name="uname" />
      <label class="emailpadding">password</label>
	   <input class="fieldpadding" type="password" name="pwd" />
        <div id="leftPango">
	     <p class="textposition"><a href="signup.php">SIGN UP </a></p>
	     <input type="submit" class="gobutton" name="submit" value="Go" />
	   </div>
	</form>
	</div>
  </div>
  <div id="rightPan">
  	<div id="rightbodyPan">
	<h2>About Us</h2>
	<p class="text"> <font color="brown">OUR VISION:</font><br />
	  ------------------<br />
	  To become market leaders in customer service with the customer satisfaction index and safety standards. <br />
	  <br />
	 <font color="brown">OUR MISSION:</font><br />
	----------------------<br />
	To make our product a dominant brand in the segments we market by becoming trend setters in customer service,safety and quality.</p>
	<h3>Latest services</h3>
	  <ul><br /> <font color="BROWN">
	  <li>Present in over 30 million homes.</li>
		<li>	Facilities to book your re-fill cylinders on-line</li>
		<li>Home appliances are available at attractive discounts from your<font color="green"> GREEN GAS</font> distributors.</li>
		<li>49 modern filling plants to bottle <font color="green"> GREEN GAS</font>&nbsp; cylinders</li>
		</font>
	  </ul>
    </div>
  </div>
</div>

<script>
	 function validate()
   {

     var msg="";
	 
     var valid=false;

	 var name=document.lf.uname.value;

	 var passwd=document.lf.pwd.value;

	var	 name_re=new RegExp("^[a-z A-Z][a-zA-Z '-.]{5,}$");

    var	 passwd_re=new RegExp("^[a-zA-Z][a-zA-Z '-.]{5,}$");
	 
 	 if(!name.match(name_re))
	   
	  	   msg=msg+"username should comprise of characters only \n";
       
	if(!passwd.match(passwd_re))
	  
         msg=msg+"password should comprise of characters only \n";
		 
	  if(msg.length>0)
		  {
		   alert(msg);
            valid=false;
			}
			else valid=true;
	   return valid;
   }
  
   
</script>



</body>
</html>
