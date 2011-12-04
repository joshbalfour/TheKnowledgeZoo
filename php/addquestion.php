<?php 
// GUI that allows the user to create a new question 
?><!DOCTYPE html>
<html>
<head>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../js/jquery.jcarousel.css" />
<link rel="stylesheet" type="text/css" href="../css/skin.css" />
<link rel='stylesheet' href='../css/quiz.css' />
<link rel='stylesheet' href='../css/formstyle.css' />
<link rel='stylesheet' href='../css/css.css' />
<script type="text/javascript" src="../js/jquery-1.1.2.pack.js"></script>
<script type="text/javascript" src="../js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="../js/formsubmit.js"></script>
<script src='../js/styleform.js'></script>
</head>
<body>
<div id="newquestion">
<form name="form7" method="post" action="">
<div class='main-quiz-holder'>
<div class='slide-container' style="display: block;">
<div class="question-number">New Question <?php echo $questionnumber;?></div>
<div class='question'><input name="question" type="text" id="question">
</div>
<ul class='answers'>
<li><input name="answer1" type="text" id="answer1"><input class="styled" name="correct" type="radio" value="answer1"/>
</li>
<li><input name="answer2" type="text" id="answer2"><input class="styled" name="correct" type="radio" value="answer2"/>
</li>
<li><input name="answer3" type="text" id="answer3"><input class="styled" name="correct" type="radio" value="answer3"/>
</li>
<li><input name="answer4" type="text" id="answer4"><input class="styled" name="correct" type="radio" value="answer4"/>
</li>
</ul>
<div class="nav-container"><div class="next"><a class="nav-next" href="#" onclick="javascript: submitform()">Save</a></div></div>
</div>
</div> 
<input type="hidden" name="number" value="<?php echo $questionnumber;?>">
<input type="hidden" name="id" value="<?php echo $id;?>">
</form>
</div>
<div id="existingquestions">
<div id="wrap">
 

  <div id="mycarousel" class="jcarousel-skin-tango">

   <div class="jcarousel-control">
   <?php
require("../php/db.php");
$i=1;
    $query4  = "SELECT * FROM quiz_qa WHERE id='$id'";
	$result4 = mysql_query($query4,$conn);
	while($row4 = mysql_fetch_array($result4, MYSQL_ASSOC))
   	  {?>
      <a href="#"><?php echo $i;?></a>
<?php $i=$i+1; }?>
</div>
<ul>
<?php
include("../php/correct.php");
require("../php/db.php");
    $query3  = "SELECT * FROM quiz_qa WHERE id='$id' ORDER BY ABS(number) ASC";
	$result3 = mysql_query($query3,$conn);
	while($row3 = mysql_fetch_array($result3, MYSQL_ASSOC))
	{?><li>
	<table border="1"><tr><td><?php echo $row3['number']; ?></td></tr>
	<tr><td><?php echo $row3['question']; ?></td></tr>
	<tr><td><?php echo $row3['answer1']; ?><img src="../img/<?php correct($row3['answer1'],$row3['number'],$id); ?>2.png" alt="<?php correct($row3['answer1'],$row3['number'],$id); ?>"/></td></tr>
	<tr><td><?php echo $row3['answer2']; ?><img src="../img/<?php correct($row3['answer2'],$row3['number'],$id); ?>2.png" alt="<?php correct($row3['answer2'],$row3['number'],$id); ?>"/></td></tr>
	<tr><td><?php echo $row3['answer3']; ?><img src="../img/<?php correct($row3['answer3'],$row3['number'],$id); ?>2.png" alt="<?php correct($row3['answer3'],$row3['number'],$id); ?>"/></td></tr>
	<tr><td><?php echo $row3['answer4']; ?><img src="../img/<?php correct($row3['answer4'],$row3['number'],$id); ?>2.png" alt="<?php correct($row3['answer4'],$row3['number'],$id); ?>"/></td></tr>
	</table></li>
	
	<?php }?>
	</ul>
	 <div class="jcarousel-scroll">
      <form action="">
        <a href="#" id="mycarousel-prev">&laquo; Prev</a>
               <a href="#" id="mycarousel-next">Next &raquo;</a>
      </form>
    </div>

  </div>
<script type="text/javascript" src="../js/jquery.carousel.init.js"></script>

</div>
</div>
<div id="pupilmanagement">
<br/>
<div id="newhomework">
<?php include ("newhomework.php")?>
</div>
<div id="pupilsinquiz">
<?php include ("pupilsinquiz.php")?>
</div>
</div>
</body>
</html>