<!doctype html>

<html>
<body>
<?php
include("php/salts.php");
include("php/db.php");
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
$status="OK";
$msg="";
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
	echo "<font face='Verdana' size='2' color=red>Username not found. Please try again.</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";	
	}
else
	{
		
		$passattempt=md5(md5(md5($password2).$passsalt));
		
		$info = mysql_fetch_array( $result );
		$pwhash=$info['password'];
		
	 	
		if (!($passattempt==$pwhash))
		{
		echo "<font face='Verdana' size='2' color=red>Password incorrect, please try again.</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";			
		}
		else
	 	{
	 	echo "<font face='Verdana' size='2' color=green>Welcome, You have successfully logged in.</font>";
	 	setcookie("user", $username, time()+360000);
	 	setcookie("password", $pwhash, time()+360000);
	 	echo '<a href="edit.php">Go to Your Site Editor</a>';	 	
	 	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=edit.php">';
	 	}
	}


//close connection
mysql_close($conn);

?>


</body>

</html>
