<!doctype html>

<html>

<head>
<title>signup</title>
</head>

<body>
<?
include("../php/db.php");
include("../php/salts.php");
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$email=$_POST['email'];
$passcrypt=md5(md5(md5($password).$passsalt));
$emailcrypt=md5(md5($email).$emailsalt);

$status = "OK";
$msg="";

// if username is less than 3 char then status is not ok
if(!isset($username) or strlen($username) <3)
{
$msg=$msg."User id should be =3 or more than 3 characters long<BR>";
$status= "NOTOK";
}					

$result=mysql_query("SELECT * from siteusers where username='$username'");
$numrows=mysql_num_rows($result);
if($numrows >= 1)
{
$msg=$msg."username already exists. Please try another one<BR>";
$status= "NOTOK";
}					


if ( strlen($password) < 3 ){
$msg=$msg."Password must be more than 3 char legth<BR>";
$status= "NOTOK";}					

if ( $password <> $password2 ){
$msg=$msg."Both passwords are not matching<BR>";
$status= "NOTOK";}					


//if ($agree<>"yes") {
//$msg=$msg."You must agree to terms and conditions<BR>";
//$status= "NOTOK";}	

if($status<>"OK")
	{
	echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
	}
	
	else
  { 
//    $oldmask = umask(0);
//   	chdir("../sites"); 	
//  	mkdir("$username",0777,$recursive = true);
//  	chdir("$username"); 
//  	copy("../index.php","index.php");
//    umask($oldmask);
  	
  	$sql="insert into siteusers(username,password,email) values('$username','$passcrypt','$emailcrypt')";
		
	if (!mysql_query($sql,$conn))
	  {
	  die("Database Problem, please contact Site admin");
	  }
  $sql4="INSERT INTO sites (recordID,recordText,recordListingID,username,page, type) VALUES ('1','title','1','$username', '$page','title')";
  $sql2="INSERT INTO sites (recordID,recordText,recordListingID,username,page, type) VALUES ('2','subtitle','2','$username', '$page','subtitle')";
  $sql3="INSERT INTO sites (recordID,recordText,recordListingID,username,page, type) VALUES ('3','footer','3','$username', '$page','footer')";
						
						//Insert data
						if (!mysql_query($sql4,$conn))
							{
							die('Error: ' . mysql_error());
							}
						if (!mysql_query($sql2,$conn))
							{
							die('Error: ' . mysql_error());
							}
						if (!mysql_query($sql3,$conn))
							{
							die('Error: ' . mysql_error());
							}  
	  
	 
echo "<font face='Verdana' size='2' color=green>Welcome, You have successfully signed up</font> <p><a href '../admin' >Go log in</a></p>";
		

}
mysql_close($conn);
?>

</body>

</html>

