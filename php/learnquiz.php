<?php
//check if pupil is authorised, if so then display the quizzes page, if not the get pupil to login.

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