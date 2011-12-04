<?php 
// algorithm for adding questions to a quiz, creating a new quiz, adding a new pupil, and assigning new homework to a pupil.
require("db.php");
include("auth.php");
//setup tables//
/*
$sql="
CREATE TABLE quiz
(
id text,
name text,
teacher text
)
";

$sql2="
CREATE TABLE quiz_qa
(
id text,
number text,
question text,
answer text
)
";

$sql3="
CREATE TABLE quiz_scores
(
id text,
user text,
question text,
answer text,
score text
)
";
/*$sql13="
CREATE TABLE quiz_finalscores
(
id text,
user text,
score text
)
";


if (!mysql_query($sql,$conn))
	{
	die('Error 1: ' . mysql_error());
	}
else
{
	echo "success 1";
}


if (!mysql_query($sql2,$conn))
	{
	die('Error 2: ' . mysql_error());
	}
else
{
	echo "success 2";
}

if (!mysql_query($sql3,$conn))
	{
	die('Error 3: ' . mysql_error());
	}
else
{
	echo "success 3";
}

$sql4="ALTER TABLE quiz
ADD description text";
if (!mysql_query($sql4,$conn))
	{
	die('Error 4: ' . mysql_error());
	}
else
{
	echo "success 4";
}
$sql8="ALTER TABLE quiz
ADD username text";
if (!mysql_query($sql10,$conn))
	{
	die('Error 10: ' . mysql_error());
	}
else
{
	echo "success 10";
}
$sql5="ALTER TABLE quiz_qa
ADD answer1 text";
if (!mysql_query($sql5,$conn))
	{
	die('Error 5: ' . mysql_error());
	}
else
{
	echo "success 5";
}

$sql6="ALTER TABLE quiz_qa
ADD answer2 text";
if (!mysql_query($sql6,$conn))
	{
	die('Error 6: ' . mysql_error());
	}
else
{
	echo "success 6";
}

$sql7="ALTER TABLE quiz_qa
ADD answer4 text";
if (!mysql_query($sql7,$conn))
	{
	die('Error 7: ' . mysql_error());
	}
else
{
	echo "success 7";
}

$sql8="ALTER TABLE quiz_qa
DROP answer text";
if (!mysql_query($sql8,$conn))
	{
	die('Error 8: ' . mysql_error());
	}
else
{
	echo "success 8";
}

$sql9="ALTER TABLE quiz_qa
ADD correctanswer text";
if (!mysql_query($sql9,$conn))
	{
	die('Error 9: ' . mysql_error());
	}
else
{
	echo "success 9";
}


$sql11="
CREATE TABLE quiz_users
(
username text,
masterusername text,
password text
)
";

if (!mysql_query($sql11,$conn))
	{
	die('Error 11: ' . mysql_error());
	}
else
{
	echo "success 11";
}

$sql11="ALTER TABLE quiz_users
ADD name text";
if (!mysql_query($sql11,$conn))
	{
	die('Error 11: ' . mysql_error());
	}
else
{
	echo "success 11";
}

$sql12="CREATE TABLE  `balfour`.`quiz_homework` (
`id` TEXT NOT NULL ,
`user` TEXT NOT NULL ,
`complete` TEXT NOT NULL
) ENGINE = MYISAM ;";
if (!mysql_query($sql12,$conn))
	{
	die('Error 12: ' . mysql_error());
	}
else
{
	echo "success 12";
}

$sql3="ALTER TABLE quiz_scores
ADD attempt text";
if (!mysql_query($sql3,$conn))
	{
	die('Error 13: ' . mysql_error());
	}
else
{
	echo "success 13";
}

*/



// add quiz data
$quizname=$_POST['name'];
$teachername=$_POST['teacher'];
$description=$_POST['description'];
if (!($teachername==''))
{
	$newquiz=true;
}

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

//add new pupil data

$pupilname=$_POST['pupilname'];
$hwkid=$_POST['id'];

if (!($pupilname==''))
{
	if ($hwkid=='')
	{
	$newpupil=true;
	}
}

//new homework
if (!($hwkid==''))
	{
		if (!($questionname))
		{
		$newhwk=true;
		}
	}

function randomstring()
{
	include("db.php");
    $query2  = "SELECT * FROM strings WHERE used is NULL";
	$result2 = mysql_query($query2,$conn);
	while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
	{$randomstring=$row2['string'];};
	$query3 = "UPDATE strings SET used='yes' WHERE string='$randomstring'";
	if (!mysql_query($query3, $conn))
	{
	die('Error: ' . mysql_error());
	}
    return $randomstring;
}


if ($newquiz)
{
	  $quizid=md5($quizname.$teachername);
	  $sql="INSERT INTO quiz (id,name,description,teacher,username) VALUES ('$quizid','$quizname','$description','$teachername','$username')";
	  $exec=true;
}

if ($newquestion)
{
	
	
	if ($selected=='answer1') { $correctanswer = $answer1;}
	if ($selected=='answer2' and $correctanswer=='') { $correctanswer = $answer2;}
	if ($selected=='answer3' and $correctanswer=='') { $correctanswer = $answer3;}
	if ($selected=='answer4' and $correctanswer=='') { $correctanswer = $answer4;}
	
	
	  $sql="INSERT INTO quiz_qa (id,number,question,answer1,answer2,answer3,answer4,correctanswer) VALUES ('$quizid','$questionnumber','$questionname','$answer1','$answer2','$answer3','$answer4','$correctanswer')";
	  $exec=true;
}

if ($newpupil)
{
	  
	  $pupilusername=randomstring();
	  $pupilpassword=randomstring();
	  $sql="INSERT INTO quiz_users (username,masterusername,password,name) VALUES ('$pupilusername','$username','$pupilpassword','$pupilname')";
	  $exec=true;
}

if ($newhwk)
{
	  $execute = `../push/push.php`; 
	  $sql="INSERT INTO quiz_homework (id,user,complete) VALUES ('$hwkid','$pupilname','no')";
	  $exec=true;
}


if ($exec)
{
	 
if (!mysql_query($sql, $conn))
	{
	die('Error: ' . mysql_error());
	}
else
{
	include("success.php");
}
}

?>