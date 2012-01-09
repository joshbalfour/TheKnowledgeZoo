<?php
/*
*
* Short description
* API for the teacher facing iOS app.
*
* Long description
* This does the following:
* 	-takes the user's username and password
*	-checks if the user is logged in
*	-creates an array of the the 
* 	-formats the array in a manner that is fast, efficient, and that the iOS app can read
*
* @param        string [$username] the name of the user who is logging in
* @param        string [$password] the password of the user who is logging in
* @param        string [$UDID] the UDID of the user's device who is logging in
*/
$x=1;

$username=$_POST["parameter"];
$password2=$_POST["parameter2"];

/// edit from here //

include("../php/salts.php");
include("../php/db.php");

 if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  } 

$result = mysql_query("SELECT * FROM siteusers where username='$username'") 
or die(mysql_error()); 
$numrows=mysql_num_rows($result);
if(!($numrows >= 1))
	{
	$auth=false;
	}
else
	{
		
		$passattempt=md5(md5(md5($password2).$passsalt));
		
		$info = mysql_fetch_array( $result );
		$pwhash=$info['password'];
		
	 	
		if (!($passattempt==$pwhash))
		{
		$auth=false;
		}
		else
	 	{
	 	$auth=true;
	 	}
	}
 


$x=0;
$apikey="[voltage:3]";
if ($auth){
	$queryhehe  = "SELECT * FROM quiz WHERE username='$username'";
				$resulthehe = mysql_query($queryhehe,$conn);
				while($rowhehe = mysql_fetch_array($resulthehe, MYSQL_ASSOC))
				{
				$quizzes.=
				 $rowhehe['name'].
				 $apikey.
				 'http://theknowledgezoo.com/adminios/addquestion.php?id='.$rowhehe['id'].
				 $apikey;	
				}
// var_dump($quizzes);
 $stuff=array();

 $stuff[1]=array(
 'Pupil Management',
 'http://theknowledgezoo.com/adminios/pupilmanagement.php?jklfsd='.$username,
 '',
 ''
 );
 $stuff[2]=array(
 'Pupil Scores',
 'http://theknowledgezoo.com/adminios/pupilscores.php?oiufre='.$username,
 '',
 ''
 );
 $stuff[3]=array(
 'Quizzes',
 $quizzes,
 '',
 ''
 );
$stuff[4]=array(
 'Change Site Templates',
 'http://theknowledgezoo.com/adminios/templates.php?afsljd='.$username,
 '',
 ''
 );
 $stuff[5]=array(
 'Homepage Manager',
 'http://theknowledgezoo.com/adminios/editpage.php?CALL911RIGHTNOWWWWWWUBWUBWUBW='.$username,
 '',
 ''
 );
  $stuff[6]=array(
 'Your Pages',
 'http://theknowledgezoo.com/adminios/pages.php?becosomnomskay='.$username,
 '',
 ''
 );


mysql_close($conn);

$response=$stuff;

/// down to here, assigning the data to $response //





header("Content-type: text/plain");
echo epicparsehness($response);
}
else
{
	header('HTTP/1.0 403 Unauthorized');
}
?>

<?php 
function epicparsehness($array){
	////BAAAAANGARAAAAAAAAAAAAAAAAAANG WUBWUBWUBWUBWUBWUWBW
	// moving on.....swiftly :3
foreach ($array as $arrayofitems)
{
	
		foreach ($arrayofitems as $arrayitem)
		{		
			echo $arrayitem;
			echo '[itemfinisheh]';
	
		}

}

}
?>