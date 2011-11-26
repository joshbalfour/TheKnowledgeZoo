<?php if ($_POST['username']==''){?>
<form name="form1" method="post" action="login">
Username:
<input name="username" type="text" id="username">
Password:
<input name="password" type="text" id="password">
<input type="submit" name="Submit" value="login">
</form>
<?php } else {?>


<?php
$username=$_POST['username'];
$password=$_POST['password'];
require("../php/db.php");
$query  = "SELECT * FROM quiz_users WHERE username='$username' AND password='$password'";
				$result = mysql_query($query,$conn);
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$auth=true;
					setcookie('pupilusername',$username);
					setcookie('pupilpassword',$password);
				}
}
if ($auth)
{
echo '
thanks for logging in '.$username.' <meta http-equiv="refresh" content="2;url=/computing/learn">
';
}?>