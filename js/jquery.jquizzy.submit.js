
function selectedAnswer(selAns,qn)
	 {
     jQuery.ajax("submit.php?questionNumber="+qn.substr(0,qn.indexOf('/'))+"&answer="+selAns+"&id=<?php echo $id;?>&username=<?php echo $username;?>");
	 };