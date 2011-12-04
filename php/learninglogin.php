<?php
//algorithm to allow the pupil to login
$auth=false; 
if (!($_COOKIE['pupilusername']=='' and $_COOKIE['pupilpassword']=='')){$cookieset=true;}

if ($_POST['username']=='' and $cookieset==false)
{
$owlthought='So that you can do the quizzes, please put in your username and password';
include("loginform.php");
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
			$owlthought='Thanks for logging in '.realname($username).' ! Lets go to the quizzes!';			
			include("logincomplete.php");
		}
}
if ($cookieset)
{

	
if (!($_POST['Yes']==''))
{
	$username=$_COOKIE['pupilusername']; 
	$password=$_COOKIE['pupilpassword']; 
	$owlthought='Thanks for logging in '.realname($username).' ! Lets go to the quizzes!';			
	include("logincomplete.php");
	$loggingin=true;
}
if (!($_POST['No']==''))
{ 
setcookie("pupilusername", "", time()-3600);
setcookie("pupilpassword", "", time()-3600); 
$owlthought='Silly Me! Anyway, please put in your username and password';
include("loginform.php");
$loggingin=true;
}

if (!($loggingin))
{
	$username=$_COOKIE['pupilusername']; 
	$owlthought='I think i remember you, are you '.realname($username).' ?';
	include("cookieset.php"); 
}

}



 
if ($auth==false and (!($_POST['username']=='')))
{ 
$owlthought='I think you entered your username or password wrong,
Please try again!';
include("loginform.php");
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
 
?>