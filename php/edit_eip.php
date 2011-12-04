<?php
// when the teacher puts new content in a box which already has content in the dta is posted and getted to this algorithm, which then updates the user's content in the database.
require("db.php");
	$username=$_GET["user"];
	$page=$_GET["page"];
	$id = $_POST["id"];
	$content = $_POST["content"];
	print(htmlspecialchars($content));
	$query = "UPDATE sites SET recordText = '" . $content . "' WHERE (recordID = " . $id." AND username='".$username."' AND page='".$page."')";
	mysql_query($query) or die('Error, insert query failed'. mysql_error());
?>
