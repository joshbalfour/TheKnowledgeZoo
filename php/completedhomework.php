<div id="completedhomework">
<?php 
require("../php/db.php");
require("../php/authpupil.php");

	$query3  = "SELECT quiz.id,quiz.name 
				FROM quiz_homework, quiz_users, quiz
				WHERE quiz_users.masterusername = quiz.username
				AND quiz_users.username =  '$username'
				AND quiz_homework.user =  '$username'
				AND quiz_homework.complete =  'yes'";
	$result3 = mysql_query($query3,$conn);
	$xyq=0;
	$echoedid[$xyq]='0';
	while($row3 = mysql_fetch_array($result3, MYSQL_ASSOC))
	  {
	  if (!(is_int (array_search($row3['id'],$echoedid))))
	  {	  	
	  	$xyz=$xyz+1;?>
<a href="quiz?id=<?php  echo $row3['id']; ?>"><?php echo $row3['name'];?></a>
<?php $echoedid[$xyq]=$row3['id'];}
	  }?>
</div>