<?php //this page finds the page that is requests and matches it to the appropriate PHP file ?>
<?php //it also checks if the user is authorised from the auth.php file, and if they're not authed and are trying to acccess a restricted page then it sends them to the login screen. ?>
<?php ob_start("ob_gzhandler"); //gzip compression ?>
<?php include("../php/auth.php")?>
<?php //include("../php/obfuscation.php")?>
<?php //include ("../php/bc.php")?>
<?php if (!($ns)) {?>
<?php 
if ($auth)
{?>
<?php
$page=$_GET['page'];
$id=$_GET['id'];
if ($page=='dashboard' or $page=='' or $page=='index')
{
$page=dash;
}
if ($page=='quizzes' or $page=='pages')
{
$jquery=true;
$collapser=true;
}
include ("../php/top.php");
include("../php/nav.php");
flush();
if ($page=='dash')
{
include("../php/dashboard.php");
$found=true;

}
if ($page=='message')
{
include("../php/messagepupil.php");
$found=true;

}

if ($page=='pupilmanagement')
{
include("../php/pupilmanagement.php");
$found=true;
}

if ($page=='quizzes')
{
include("../php/quizzes.php");
$found=true;
}

if ($page=='pupilscores')
{
include ("../php/pupilscores.php");
$found=true;
}if ($page=='addquestion')
{
include ("../php/addquestiontoquiz.php");
$found=true;
}
if ($page=='pages')
{
include("../php/pages.php");
$found=true;

}
if ($page=='export')
{
include("../php/adminexport.php");
$found=true;

}
if ($page=='editpage')
{
include("../php/editpage.php");
$found=true;
}

if ($page=='templates')
{
include("../php/templates.php");
$found=true;
}

if ($page=='homepagemanagement')
{
include("../php/homepage.php");
$found=true;
}
if ($page=='import')
{
include("../php/import.php");
$found=true;
}
if ($page=='help')
{

include ("../php/help.php");
$found=true;
}

if (!($found))
{
include("../php/admin404.php");
}

include ("../php/bottom.php");
?>
<?php }
else 
{
include("login.php");
}?>

<?php 
/*todo

Admin Pannel:
6) make section flash - http://docs.jquery.com/UI/Effects/Highlight

<!-- optional -->
5) change stuffs
		a) refactor *everything*
		b) change graphics a bit
		c) clean up shizzle
<!-- ---------->
*/ 
?>
<?php }?>