<?php 
// algorithm that adds questions to the database given an id, number, question, 4 answers, and a correct answer.
// GUI formatted for iOS that allows the teacher to create a question and add it to the database.
require ("../php/db.php");
include ("../php/auth.php");
//add question data
$quizid=$_POST['id'];
$questionnumber=$_POST['number'];
$questionname=$_POST['question'];
$answer1=$_POST['answer1'];
$answer2=$_POST['answer2'];
$answer3=$_POST['answer3'];
$answer4=$_POST['answer4'];
$selected=$_POST['correct'];
if (!($questionname==''))
{
	$newquestion=true;
	
}
$pupilname=$_POST['pupilname'];
$hwkid=$_POST['id'];
//new homework
if (!($hwkid==''))
	{
		if (!($questionname))
		{
		$newhwk=true;
		}
	}


if ($newquestion)
{
	if ($selected=='answer1') { $correctanswer = $answer1;}
	if ($selected=='answer2') { $correctanswer = $answer2;}
	if ($selected=='answer3') { $correctanswer = $answer3;}
	if ($selected=='answer4') { $correctanswer = $answer4;}
	
	  $sql="INSERT INTO quiz_qa (id,number,question,answer1,answer2,answer3,answer4,correctanswer) VALUES ('$quizid','$questionnumber','$questionname','$answer1','$answer2','$answer3','$answer4','$correctanswer')";
	  $exec=true;
}
if ($newhwk)
{
	
	  $sql="INSERT INTO quiz_homework (id,user,complete) VALUES ('$hwkid','$pupilname','no')";
	  $exec=true;
}
if ($exec)
{
	 
if (!mysql_query($sql, $conn))
	{
	$failed=true;
	}
else
{
	$success=true;
}
}
$id=$_GET['id'];
if ($id=='')
{ 
$id = $_POST['id'];
}
$questionnumber=1;
$query2  = "SELECT * FROM quiz_qa WHERE id='$id'";
				$result2 = mysql_query($query2,$conn);
				while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
				{$questionnumber=$questionnumber+1;}

?>
<?php include("../php/iosheader.php")?>
<div id="header"><a href="quizzes.php" id="backButton" class="nav">Back</a><h1>Question <?php echo $questionnumber;?></h1><a class="nav action" href="#" onclick="javascript: submitform()">Save</a></div>
<br/>
<h1><input placeholder="Question" name="question" type="text" id="question"></h1><p>check the box next to the correct answer</p>

<ul>
<li><input placeholder="an answer" name="answer1" type="text" id="answer1"><input class="styled" name="correct" type="radio" value="answer1"/>
</li>
<li><input placeholder="an answer" name="answer2" type="text" id="answer2"><input class="styled" name="correct" type="radio" value="answer2"/>
</li>
<li><input placeholder="an answer" name="answer3" type="text" id="answer3"><input class="styled" name="correct" type="radio" value="answer3"/>
</li>
<li><input placeholder="an answer" name="answer4" type="text" id="answer4"><input class="styled" name="correct" type="radio" value="answer4"/>
</li>
</ul>
<a class="button white" onclick="javascript: submitform()" href="#">Save</a>

<?php include("../php/iosfooter.php")?>
