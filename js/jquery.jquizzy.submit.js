//use ajax to submit the selected answer to the submit.php file which then uses an algorithm to submit the given answer to the database.
function selectedAnswer(selAns,qn)
	 {
     jQuery.ajax("submit.php?questionNumber="+qn.substr(0,qn.indexOf('/'))+"&answer="+selAns+"&id=<?php echo $id;?>&username=<?php echo $username;?>");
	 };