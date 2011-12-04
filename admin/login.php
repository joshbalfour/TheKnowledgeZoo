<?php // checks if the given credentials are in the database and if so generates a GUI that says that they're logged in else generates a GUI that says that thay're not. ?>

<?php // ob_start("ob_gzhandler"); //gzip compression ?>
<?php // include("../php/obfuscation.php")?>

<?php
include("../php/salts.php");
include("../php/db.php");
// Create table
//$sql="CREATE TABLE USERS(
//         id int(11) NOT NULL AUTO_INCREMENT,
//		 username text,
//		 password text,
//		 adminnumber text,
//		 email text,
//         PRIMARY KEY (id)
//                  
//       ) AUTO_INCREMENT=2 " ;



//Drop Table
//$sql3="DROP TABLE USERS";


//Insert data
//$sql4="INSERT INTO USERS (username, password, adminnumber, email) VALUES ('$username','$pass','$adminnumber','$email')";
$username=$_POST['username'];
$password2=$_POST['password'];
if (!($username=='' or $password2==''))
{
	
//open connection
 if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  } 

  

$result = mysql_query("SELECT * FROM siteusers where username='$username'") 
or die(mysql_error()); 
$numrows=mysql_num_rows($result);
if(!($numrows >= 1))
	{
	$fail=true;
	$message='Username not found, please retry.';
	}
else
	{
		
		$passattempt=md5(md5(md5($password2).$passsalt));
		
		$info = mysql_fetch_array( $result );
		$pwhash=$info['password'];
		
	 	
		if (!($passattempt==$pwhash))
		{
		$fail=true;
		$message='Password Incorrect, please retry.';
		}
		else
	 	{
	 	setcookie("user", $username, time()+360000);
	 	setcookie("password", $pwhash, time()+360000);
	 	echo $_COOKIE['user'];
	 	echo $_COOKIE['password'];
	 	$loggedin=true; 	
	 	}
	}


//close connection
mysql_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link media="screen" rel="stylesheet" type="text/css" href="../css/login.css"  />
</head>

<body>
	<div id="wrapper">
	<div id="wrapper2">
	<div id="wrapper3">
	<div id="wrapper4">
	<span id="login_wrapper_bg"></span>
	
	<div id="stripes">
	
		
		<div id="login_wrapper">
			
			<?php if ($fail){?>
			<div class="error">
				<div class="error_inner">
					<strong>Access Denied</strong> | <span><?php echo $message?></span>
				</div>
			</div>
			<?php };?>
			
			
			
			<form name="form1" method="post" action="login.php">
				<fieldset>
					
					<?php if (!($loggedin)){?>
					
					
					<h1>Please log in</h1>
					<div class="formular">
						<span class="formular_top"></span>
						
						<div class="formular_inner">
						
						<label>
							<strong>Username:</strong>

							<span class="input_wrapper">
								<input name="username" type="text" id="username">
							</span>
						</label>
						<label>
							<strong>Password:</strong>
							<span class="input_wrapper">
								<input name="password" type="password" id="password">

							</span>
						</label>
						<label class="inline">
							
						</label>
						
						
						<ul class="form_menu">
							<li><span class="button"><span><span><em>SUBMIT</em></span></span><input type="submit" name="Submit" value=""></span></li>
							<li><span class="button"><span><span><a href="../">BACK TO SITE</a></span></span></span></li>
						</ul>
						
						</div>
						
						<span class="formular_bottom"></span>
						
					</div>
				</fieldset>
			</form>
			<?php }?>
			<?php if ($loggedin) {?>
			
			<h1>Thanks for logging in</h1>
					<div class="formular">
						<span class="formular_top"></span>
						
						<div class="formular_inner">
						
						
						
						<label class="inline">
							Welcome, You have successfully logged in.
						</label>
						<meta HTTP-EQUIV="REFRESH" content="2; url=index.php">
						
						<ul class="form_menu">
						</ul>
						
						</div>
						
						<span class="formular_bottom"></span>
						
					</div>
				</fieldset>
				<?php }?>
			
			
			
			<span class="reflect"></span>
			<span class="lock"></span>
		
			
			
		</div>

	    </div>
		</div>
     	</div>
		</div>	
	</div>
</body>
</html>
