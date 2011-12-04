<?php // version of the login algorithm that's formatted to iOS ?>
<?php
$auth=false; 
if (!($_COOKIE['pupilusername']=='' and $_COOKIE['pupilpassword']=='')){$cookieset=true;}

if ($_POST['username']=='' and $cookieset==false)
{
$message='So that you can do the quizzes, please put in your username and password';
include("ioslogin.php");
$neverGonnaGiveYouUpNeverGonnaLetYouDown=true;
} 
else 

{
$username=$_POST['username'];
$password=$_POST['password'];
require("db.php");
$query  = "SELECT * FROM quiz_users WHERE username='$username' AND password='$password'";
$result = mysql_query($query,$conn);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$auth=true;
			setcookie('pupilusername',$username,time()+60*60*60*60*60);
			setcookie('pupilpassword',$password,time()+60*60*60*60*60);
			$message='Thanks for logging in '.realname($username).' ! Lets go to the quizzes';
		}
}

if ($auth==false and (!($_POST['username']=='')))
{ 
$message='I think you entered your username or password wrong,
Please try again';
$neverGonnaGiveYouUpNeverGonnaLetYouDown=true;
include("ioslogin.php");
}




function realname($username)
{
require("db.php");
$query2  = "SELECT name FROM quiz_users WHERE username='$username'";
				$result2 = mysql_query($query2,$conn);
				while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
				{ 
					$userrealname=$row2['name'];
				};
return $userrealname;
}


if (!($neverGonnaGiveYouUpNeverGonnaLetYouDown)) //how could this be???? o.0
{
	include("ioslogincomplete.php");
}
?>