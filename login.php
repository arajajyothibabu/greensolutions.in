<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php

if(isset($_POST['submit'])){
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$queryresult = mysql_query("select * from fusers where fid = '{$uname}' and password = '{$password}';");
	confirm_query($queryresult);
			if (mysql_num_rows($queryresult) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysql_fetch_array($queryresult);
				$_SESSION['user'] = $found_user['fid'];
				redirect_to("profile.php?link=null");
			}
			else{
			$message = "Username/password combination incorrect.<br />
			Please make sure your caps lock key is off and try again.";
			redirect_to("login.php?link=1");
		}
	}

?>

<body>

<center><h1>Login Form </h1></center>
<?php if (!empty($message)) {echo "<tr><td><p id='err' style='background-color:#FFFFFF;' class=\"message\">" . $message . "</p></td></tr>";} ?>
<form name="lf" onSubmit="return validate()" action="valid" method="post">
<table align=center>
<caption> Fill Your Details </i></font></caption>

<tr> <td>Name</td><td>  <input type=text name="un" size=20></td></tr>

<tr><td>Password  </td><td><input type=password name="pw" size=20></td></tr>

<tr><td>     <input type="submit" name="submit" value="submit"></td>
<td> <input type=reset name="reset" value="clear"></td></tr>

</table>
</form>

<script>
	 function validate()
   {

     var msg="";
	 
     var valid=false;

	 var name=document.lf.un.value;

	 var passwd=document.lf.pw.value;

	var	 name_re=new RegExp("^[a-zA-Z][a-zA-Z '-.]{5,}$");

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
