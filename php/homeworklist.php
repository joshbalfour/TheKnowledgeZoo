<div id="homeworklist">
<?php 
// algorithm to pull all unique incomplete quizzes from the database where the username is the pupil's username
require("../php/db.php");
require("../php/authpupil.php");

	$query3  = "SELECT DISTINCT quiz.name, quiz.id
				FROM quiz_homework, quiz_users, quiz
				WHERE quiz_users.masterusername = quiz.username
				AND quiz_homework.id = quiz.id
				AND quiz_homework.user =  quiz_users.username
				AND quiz_users.username =  '$username'
				AND quiz_homework.complete = 'no'";
	
	$result3 = mysql_query($query3,$conn);
	while($row3 = mysql_fetch_array($result3, MYSQL_ASSOC))
	  {
	  	 
	  	?>
<a href="doquiz?id=<?php  echo $row3['id']; ?>"><?php echo $row3['name'];?></a>
<?php
	  	  
	  }
	  ;?>
	
</div>