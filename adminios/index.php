<?php include("../php/iosheader.php")?>
<?php include("../php/auth.php")?>

<?php if ($auth){?>
<div id="header"><h1>TKZ Admin</h1><a href="logout.php" id="actionButton" class="nav">logout</a></div>

<ul>

			<li><a href="pupilmanagement.php" class="arrow">Pupil Management</a></li>
			<li><a href="pupilscores.php" class="arrow">Pupil Scores</a></li>
			<li><a href="quizzes.php" class="arrow">Quizzes</a></li>
			<li><a href="templates.php" class="arrow">Change site templates</a></li>
			<li><a href="editpage.php?r=lawlz" class="arrow">Homepage manager</a></li>
			<li><a href="pages.php" class="arrow">Pages</a></li>
</ul>
<?php } else {?>
	<div id="header" style="margin-top:0;"><a href="login.php" id="actionButton" class="nav">Login</a></div>



<?php }?>






<?php include ("../php/iosfooter.php")?>