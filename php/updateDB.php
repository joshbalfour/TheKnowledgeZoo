<?php // algorithm for updating the database when a content box is rearranged on the admin page
require("db.php");
$username=$_GET['username'];
$action 		= mysql_real_escape_string($_POST['action']); 
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){
	
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		
		$query = "UPDATE sites SET recordListingID = " . $listingCounter . " WHERE recordID = " . $recordIDValue." AND username='".$username."'";
		mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updateRecordsArray);
	echo '</pre>';
	echo 'If you refresh the page, you will see that records will stay just as you modified.';
}
?>