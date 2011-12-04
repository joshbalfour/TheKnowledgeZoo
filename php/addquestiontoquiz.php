<?php // this is the algorithm that inserts the new question into the database?>
<?php 
require ("db.php");
include ("auth.php");
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
<div id="content">
			<div class="inner">
			<?php if ($failed){?>
				<div class="section">
					<ul class="system_messages">
						<li class="red"><span class="ico"></span><strong class="system_title">There was an error :(</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
			<?php if ($success){?>
				<div class="section">
					<ul class="system_messages">
						<li class="green"><span class="ico"></span><strong class="system_title">Yay it worked !</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
				<!--[if !IE]>start section<![endif]-->
					<div class="section">
					
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2 style="color: #454545; margin-top: 0; line-height: 40px;padding: 0 15px 0 0;" >Add a Question:</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner">
<?php
include("addquestion.php");
?>
<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				
				<!--[if !IE]>end section<![endif]-->
			</div>
		</div>
		<!--[if !IE]>end content<![endif]-->