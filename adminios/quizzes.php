<?php //a GUI which lists the quizzes associated with the user that's currently logged in. ?>
<?php include("../php/iosheader.php")?>
<div id="header"><a href="index.php" id="backButton" class="nav">Back</a><h1>Your Quizzes</h1></div>

<ul>
<?php
include("../php/iosquizlist.php")
?>
</ul>
<?php include("../php/iosfooter.php")?>