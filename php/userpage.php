<?php 
//old, disregard.
require("../php/db.php"); 
$page='';

$page= $_GET["page"];

				$query4  = "SELECT * FROM sites WHERE username='$username'";
				$result4 = mysql_query($query4);
				$row7 = mysql_fetch_array($result4, MYSQL_ASSOC);
				$template=$row7['template'];
if ($template=='')
{$template='simple';}	 
include("../php/page.php");
?>