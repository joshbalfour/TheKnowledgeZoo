<?php
// database credentials
$dbhost							= "localhost";
$dbuser							= "joshbalfour";
$dbpass							= "beaky1";
$dbname							= "balfour";

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Error connecting to mysql");
mysql_select_db($dbname);
?>