<?php 
/*
*
* Short description
* API for the iOS app.
*
* Long description
* This does the following:
* 	-takes the user's username, password and UDID
*	-checks if the user is logged in
*	-checks if the device has already been registered to the user
*	-if not then it inserts the data into the database
*	-pulls the users complete and incomplete quizzes from the database
* 	-formats the array in a manner that is fast, efficient, and that the iOS app can read
*
* @param        string [$username] the name of the user who is logging in
* @param        string [$password] the password of the user who is logging in
* @param        string [$UDID] the UDID of the user's device who is logging in
*/

include("../php/salts.php");
require("../php/db.php");


$username=$_POST["parameter"];
$password=$_POST["parameter2"];
$UDID=$_POST["parameter3"];

$query  = "SELECT * FROM quiz_users WHERE username='$username' AND password='$password'";
$result = mysql_query($query,$conn);
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$loginsucess=true;
		}



if ($loginsucess){
$quizzes= array();


	$x=0;
 	$query3  = "SELECT DISTINCT quiz.name, quiz.id
				FROM quiz_homework, quiz_users, quiz
				WHERE quiz_users.masterusername = quiz.username
				AND quiz_homework.id = quiz.id
				AND quiz_homework.user =  quiz_users.username
				AND quiz_homework.complete = 'no'
				AND quiz_users.username =  '$username'";
	$result3 = mysql_query($query3,$conn);

 while($info = mysql_fetch_array($result3, MYSQL_ASSOC))
 {
 $quizzes[$x]=array(
 $info['name'],
 getScore($info['id']),
 'no',
 'http://theknowledgezoo.com/ios/doquiz.php?id='.$info['id']
 ); 
 $x++;
 };
 
 $query3  = "SELECT DISTINCT quiz.name, quiz.id
				FROM quiz_homework, quiz_users, quiz
				WHERE quiz_users.masterusername = quiz.username
				AND quiz_homework.id = quiz.id
				AND quiz_homework.user =  quiz_users.username
				AND quiz_homework.complete = 'yes'
				AND quiz_users.username =  '$username'";
	$result3 = mysql_query($query3,$conn);

  while($info = mysql_fetch_array($result3, MYSQL_ASSOC))
 {
 $quizzes[$x]=array(
 $info['name'],
 getScore($info['id']),
 'yes',
 'http://theknowledgezoo.com/ios/doquiz.php?id='.$info['id']
 ); 
 $x++;
 };

$query5  = "SELECT * FROM push WHERE deviceUID='$UDID'";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					if ($row['user']!=''){
					$registeredToUser=true;};
				}
if (!($registeredToUser))
{
	$query7="UPDATE push SET user = '$username'
WHERE deviceUID='$UDID'";
if (!mysql_query($query7, $conn))
	{
	die('Error: ' . mysql_error());
	}

}
 
$response=$quizzes;



header("Content-type: text/plain");
echo epicparsehness($response);
}

else
{
	header('HTTP/1.0 403 Unauthorized');
}

?>

<?php
/*
*
* Short description
* Converts an array into a format that the iOS app can use.
*
* Long description
* This does the following:
*	-takes each item of the array of each item of the array it's given
*	-echos each item
*	-echos 'itemfinisheh'
*
* @param        array [$array] the name of the user who is logging in
* @return	string a format that the iOS app can use
*/
function epicparsehness($array){
	
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
<?php
/*
*
* Short description
* gets the maximum score that the pupil could possibly achieve on the given quiz id and the pupil's score for the given id
*
* @param        string [$id] the id of the quiz for which we want to get the maximum score
* @global	string [$username] the username of the quiz
* @return	string the pupil's score, a backslash, the max score the pupil could possibly achieve on the quiz
*/
function getScore($id){
	$maxscore=0;
	global $conn,$username;
 	$query3  = "SELECT *
				FROM quiz_finalscores
				WHERE id='$id'
				AND user =  '$username'";
	$result3 = mysql_query($query3,$conn);
	while($info = mysql_fetch_array($result3, MYSQL_ASSOC))
	{
		$pupilscore=$info['score'];
	}

	$query4  = "SELECT number
				FROM quiz_qa
				WHERE id='$id' ORDER BY number DESC";
	$result4 = mysql_query($query4,$conn);
	while ($info2 = mysql_fetch_array($result4, MYSQL_ASSOC))
	{
	$maxscore++;
	}
$finalscore=$pupilscore.' / '.$maxscore;
return $finalscore;	
}
?>