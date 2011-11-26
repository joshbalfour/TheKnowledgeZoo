<?php include("../php/iosheader.php")?>
<?php include("../php/db.php")?>
<?php // include("../php/auth.php")?>
<?php $username=$_GET['jklfsd']?>
<?php $pupilname=$_POST['pupilname'];
$hwkid=$_POST['id'];

if (!($pupilname==''))
{
	if ($hwkid=='')
	{
	$newpupil=true;
	}
}
function randomstring()
{
	include("../php/db.php");
    $query2  = "SELECT * FROM strings WHERE used is NULL";
	$result2 = mysql_query($query2,$conn);
	while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
	{$randomstring=$row2['string'];};
	$query3 = "UPDATE strings SET used='yes' WHERE string='$randomstring'";
	if (!mysql_query($query3, $conn))
	{
	die('Error: ' . mysql_error());
	}
    return $randomstring;
}
if ($newpupil)
{
	  
	  $pupilusername=randomstring();
	  $pupilpassword=randomstring();
	  $sql="INSERT INTO quiz_users (username,masterusername,password,name) VALUES ('$pupilusername','$username','$pupilpassword','$pupilname')";
	  $exec=true;
}
if ($exec)
{
	 
if (!mysql_query($sql, $conn))
	{
	$failed=true;
	}
else
{
	$success=true;
}
}
?>

<ul>
<?php if ($failed){?>
				<li>New pupil added failed :(</li>
			<?php }?>
			<?php if ($success){?>
				<li>New pupil added successfully :)</li>
			<?php }?>


<?php include ("../php/iospupils.php")?>
</ul>
<h3>Pupil Name:</h3>
<ul>
<form name="form1" method="post" action="pupilmanagement.php">
<li>
<input name="pupilname" placeholder="Pupil's Full Name" autocorrect="off"  autocapitalize="off" type="text" id="pupilname"></li></ul>
<input class="button white" type="submit" name="Submit" value="add pupil">
</form>




<?php include ("../php/iosfooter.php")?>