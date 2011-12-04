<?php //superseeded by native app ?>
<!DOCTYPE HTML>
<html>
<head><?php include ("../php/iosmeta.php")?><link rel="stylesheet" href="../css/iphone.css"></head>
<body>
<?php 
include("../php/authpupil.php");

if ($auth)
{
include("../php/ioshomeworklist.php");
}

if (!($auth))
{
include("../php/ioshomepage.php");

}

?>
</body>
</html>