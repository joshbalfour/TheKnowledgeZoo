<?php 
// algorithm function to assess the correctness of an answer given
function correct($answer,$number,$ident)
{
	require("db.php");
    $query4  = "SELECT * FROM quiz_qa WHERE id='$ident' and number=$number";
	$result4 = mysql_query($query4,$conn);
	$row4 = mysql_fetch_array($result4, MYSQL_ASSOC);
	if ($answer == $row4['correctanswer'])
	{
		$correct='correct';
	}
	else
	{
		$correct='incorrect';
	}
	
	echo $correct;
}
?>