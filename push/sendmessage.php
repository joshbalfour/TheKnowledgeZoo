<?php include("push.php"); include("../php/db.php");
$username=$_POST['user'];
$message=$_POST['message'];
/*
$username=$_GET['u'];
$message=$_GET['m'];
*/
$query2  = "SELECT * FROM push WHERE user='$username'";
				$result2 = mysql_query($query2);
				
				while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
				{
					$username=$row2['username'];
				}


$query  = "SELECT * FROM push WHERE user='$username'";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$toSend= $row['deviceToken'];
				}

$push=sendpush($toSend,$message);
if ($push[0])
{
	//do teh truffle shuffle :3
}
else
{
	echo $push[1];
}
?>