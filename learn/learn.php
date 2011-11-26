<?php ob_start("ob_gzhandler"); //gzip compression?>
<?php // include("../php/obfuscation.php")?>
<?php   include("../php/bc.php");
if (!($ns)){?>
<?php $sitename='The Knowledge Zoo'?>
<?php 
$page=$_GET['page'];
include("../php/authpupil.php");
include("../php/db.php");
?>
<?php if ($_GET['logout']=='true') {$logout=true;}?>
<?php if ((!($auth)) and (!($page=='' or $page=='index'))) {$page='login';}?>
<?php 
if ($page=='' or $page=='index')
{
include("../php/learningindex.php");
$found=true;
}
?>
<?php 
if ($page=='login')
{
include("../php/learninglogin.php");
$found=true;
}
?>

<?php 
if ($page=='logout')
{
	
$found=true;
include("../php/learnlogout.php");
}
?>
<?php 
if ($page=='quizzes')
{
$found=true;
	include("../php/learnquizzes.php");

}
?>
<?php 
if ($page=='doquiz')
{
	include("../php/doquiz.php");
	$found=true;
}
?>
<?php 
if (!($found))
{
include("../php/learn404.php");
}
?>
<?php } ?>