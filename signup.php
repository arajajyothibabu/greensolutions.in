<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
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
	$pwd = $_POST['pwd'];
	$email = $_POST['email'];
	$account = $_POST['account'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$queryresult = mysql_query("INSERT into users values('','$uname','$pwd','$email','$account','$phone','$address','')");
	confirm_query($queryresult);
			if ($queryresult) {
				$message = "Successfully registered..!";
				$_SESSION['user'] = $uname;
				$_SESSION['lastdate'] = "0000-00-00";
				redirect_to("profile.php?link=null");
			}
			else{
			$message = "Something went wrong. Try again..!";
			redirect_to("signup.php?link=1");
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
<?php if (!empty($message)) {echo "<p id='err' style='background-color:#FFFFFF; font-size:18px; color:red;' class=\"message\">" . $message . "</p>";} ?>
<br />
<br />
<center><h1> Registration Form </h1></center>

<form name="rf" onSubmit="return validate()" action="" method="post">
<table align=center>
<caption> Fill Your Details </i></font></caption>

<tr> <td>Name</td><td>  <input type="text" class="fieldpadding" name="uname" size=20></td></tr>

<tr><td>Password  </td><td><input type="password" class="fieldpadding" name="pwd" size=20></td></tr>

<tr><td>E-Mail  </td><td><input type=text name="email" class="fieldpadding" size=20></td></tr>

<tr><td>Account Number  </td><td><input type=text name="account" class="fieldpadding" size=20></td></tr>

<tr><td>Phone Number  </td><td><input type=text name="phone" class="fieldpadding" size=20></td></tr>

<tr><td>Address  </td><td><textarea name="address" class="fieldpadding" size=20 placeholder="Residential Address"></textarea></td></tr>


<tr><td>     <input type="submit" name="submit" value="submit"></td>
<td> <input type=reset name="reset" value="clear"></td></tr>

</table>
</form>
</div>
<script>
	 function validate()
   {

     var msg="";
	 
     var valid=false;

	 var name=document.rf.uname.value;

	 var passwd=document.rf.pwd.value;

	 var email=document.rf.email.value;

	 var phno=document.rf.phone.value;
	 
	

	var  name_re=new RegExp("^[a-zA-Z][a-zA-Z '-.]{5,}$");

   
var  email_re=new RegExp("^[a-zA-Z][a-zA-Z0-9_.-]*@[a-zA-Z]+.(com|co.in|ac.in)$");

 
var ph_re=new RegExp("^[0-9]*");

	 if(!name.match(name_re))
	   {
	  	   msg=msg+"username should comprise of characters only \n";
	   }
	 
	 if(!email.match(email_re))
	   {
	   
	   msg=msg+"enter email in the form: yourname@yourdomain.com \n";
       
	    }

 if(!phno.match(ph_re))
	   {
	  	   msg=msg+"phonenumber should comprise of digits only \n";
       
	   }
	  
	  
	  
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