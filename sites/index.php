<?php //this page pulls the requested user's page if it's present, if not then displays a 404 page. ?>
<? ob_start("ob_gzhandler"); ?>
<?php // include("../php/obfuscation.php")?>

<?php 
require("../php/db.php");
$username=$_GET['user'];
$userexists= false;

if ($username == '')
{
$userexists= false;
?>

<html>
<body>
<a href="../edit.php">edit</a>
<p>Featured Sites</p>
<ul>
<?php 
$query5  = "SELECT DISTINCT username FROM sites";
				$result5 = mysql_query($query5, $conn);
				
				while($row5 = mysql_fetch_array($result5, MYSQL_ASSOC))
				{
				if (!($row5['username']==''))
				{
				?>
				<li><a href="<?php echo $row5['username']?>"><?php echo $row5['username']?></a></li>
				
				<?php 
				}
				}?>
</ul>
</body>
</html>

<?php 


}
else 
{

$query5  = "SELECT * FROM sites WHERE username='$username'";
				$result5 = mysql_query($query5, $conn);
						
				while($row5 = mysql_fetch_array($result5, MYSQL_ASSOC))
				{
				$userexists = true;
				}

if ($userexists)
{
	include("../php/userpage.php");	
}
else 
{
	include("../php/404.php");
}
}
?>	