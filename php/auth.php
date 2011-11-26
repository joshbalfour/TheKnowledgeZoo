<?php
include("salts.php");
include("db.php");
// Create table
//$sql="CREATE TABLE SITEUSERS(
//         id int(11) NOT NULL AUTO_INCREMENT,
//		 username text,
//		 password text,
//		 email text,
//         PRIMARY KEY (id)
//                  
//       ) AUTO_INCREMENT=2 " ;



//Drop Table
//$sql3="DROP TABLE SITEUSERS";


//Insert data
//$sql4="INSERT INTO SITEUSERS (username, password,  email) VALUES ('$username','$pass','$email')";
$username=$_COOKIE['user'];
$password=$_COOKIE['password'];
 
 
$result = mysql_query("SELECT * FROM siteusers where username='$username'") 
or die(mysql_error()); 
$numrows=mysql_num_rows($result);
if(!($numrows >= 1))
	{
	$auth=false;	
	}
else
	{
		
		$info = mysql_fetch_array( $result );
		$pwhash=$info['password'];
		if (!($password==$pwhash))
		{
		$auth=false;
		}
		else
	 	{
	 	$auth=true;
	 	}
	}
//DONT close connection derpface :P
?>
