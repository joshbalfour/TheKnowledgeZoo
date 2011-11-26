<?php 
$template= $_POST["template"];
require("db.php");
	$username = $_COOKIE['user'];
	$query = "UPDATE sites SET template = '" . $template . "' WHERE username='".$username."'";
	mysql_query($query) or die('Error, insert query failed'. mysql_error() );

							echo '
						
<p>success</p>
<meta HTTP-EQUIV="REFRESH" content="0; url=edit.php">						
						';
							
?>