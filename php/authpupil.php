<?php
$auth=false;
$username=$_COOKIE['pupilusername'];
$password=$_COOKIE['pupilpassword'];
require("../php/db.php");
$query  = "SELECT * FROM quiz_users WHERE username='$username' AND password='$password'";
				$result = mysql_query($query,$conn);
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$auth=true;
				}
?>