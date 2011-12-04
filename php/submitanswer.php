<?php //algorithm that submits an answer to the database given a quiz id, pupil's username, question number, and answer. ?>
<?php
require("../php/db.php");
$id=$_GET['id'];
$username=$_GET['username'];
$questionNumber=$_GET['questionNumber'];
$answer=$_GET['answer'];
$at=0;
?>
<?php 
$query2  = "SELECT * FROM quiz_scores WHERE id='$id' AND user='$username' AND questionNumber='$questionNumber'";
				$result2 = mysql_query($query2);
				
				while($row2 = mysql_fetch_array($result2, $conn))
				{
					 $at=$row2['attempt'];
				}
				
$attempt=$at+1;
$sql="INSERT INTO quiz_scores (id,user,questionNumber,answer,attempt) VALUES ('$id','$username','$questionNumber','$answer','$attempt')";
if (!mysql_query($sql, $conn))
	{
	die('Error: ' . mysql_error());
	}
?>
<?php 
$query3  = "SELECT * FROM quiz_qa WHERE id='$id'";
				$result3 = mysql_query($query3);
				$bn=0;
				while($row3 = mysql_fetch_array($result3, $conn))
				{
					 $bn++;
				}
				
if ($questionNumber==$bn)
{
$sql2="UPDATE quiz_homework SET complete='yes' WHERE id='$id' and user='$username';";
if (!mysql_query($sql2, $conn))
	{
	die('Error: ' . mysql_error());
	}
}
?>