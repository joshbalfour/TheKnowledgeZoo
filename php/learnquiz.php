<?php 
require ("../php/authpupil.php");
if ($auth)
{
include("../php/quiz.php");
}
else
{
	include("login.php");
}
?>