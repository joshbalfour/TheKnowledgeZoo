<?php
include("../php/db.php");
$deviceToken=$_GET['devicetoken'];

				$query  = "SELECT * FROM push WHERE deviceToken='$deviceToken'";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$registered=true;
				}
				
if (!($registered))
{
	
$deviceuid=$_GET['deviceuid'];
$appName=$_GET['appname'];
$appVersion=$_GET['appversion'];
$deviceName=$_GET['devicename'];
$deviceModel=$_GET['devicemodel'];
$deviceVersion=$_GET['deviceversion'];
$pushBadge=$_GET['pushbadge'];
$pushAlert=$_GET['pushalert'];
$pushSound=$_GET['pushsound'];

$query="INSERT INTO push VALUES('$appName','$appVersion','$deviceuid','$deviceToken','$deviceName','$deviceModel','$deviceVersion','$pushBadge','$pushAlert','$pushSound','')";
if (!mysql_query($query, $conn))
	{
	die('Error: ' . mysql_error());
	}
}


// $message='Welcome to The Knowledge Zoo!';

//var_dump($_GET);




//var_dump(sendPush($deviceToken, $message));

?>