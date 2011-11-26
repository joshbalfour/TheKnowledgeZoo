<?php
include("push.php");
include("../php/db.php");
// $username=$_GET['u'];
$username=$_POST['user'];
$message=$_POST['message'];
$toSend=array();
$x=0;
$query  = "SELECT * FROM quiz_users,push WHERE masterusername='$username' AND quiz_users.username=push.user";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$toSend[$x]= $row['deviceToken'];
					$x++;
				}

foreach ($toSend as $device)
{
$push=sendpush($device,$message);
}


if ($push[0])
{
	//do the truffle shuffle :3
}
else
{
	echo $push[1];
}
?>