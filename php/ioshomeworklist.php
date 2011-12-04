<?php // version of the homework list that's formatted to iOS ?>
<div id="header">
		<h1>Your Quizzes</h1>		
		<a href="javascript:window.location.href='logout.php'" class="nav Action">logout</a>
</div>
<br/>
<ul>
<?php 
$x=0;
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
	  	$x++;
	  		
	  	?>
<li><a href="doquiz.php?id=<?php  echo $row3['id']; ?>" class="arrow"><?php echo $row3['name'];?></a></li>
<?php };
	  	  
	?>  
	 
</ul>
<?php
 if ($x==0){
	  	   ?>
	  	   <h2>you have NO HOMEWORKS left to do, WELL DONE!!!!</h2>
	  	   <?php 	}
	
	  ?>