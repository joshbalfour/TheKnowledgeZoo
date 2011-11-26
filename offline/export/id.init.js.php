<script>
<?php require("../../php/db.php")?>

var init = { 
     'questions': [ 
        <?php 
	
	if ($id==''){$id=$_GET['id'];};
	$bn=0;
	$c=0;
	$query5  = "SELECT * FROM quiz_qa WHERE id='$id'";
	$result5 = mysql_query($query5,$conn);
	while($row5 = mysql_fetch_array($result5, MYSQL_ASSOC))
	{$bn++;};
	$query4  = "SELECT * FROM quiz_qa WHERE id='$id'";
	$result4 = mysql_query($query4,$conn);
	while($row4 = mysql_fetch_array($result4, MYSQL_ASSOC))
	{	
		$c++;
		$question=$row4['question'];
		$answer1=$row4['answer1'];
		$answer2=$row4['answer2'];
		$answer3=$row4['answer3'];
		$answer4=$row4['answer4'];
		$correctanswer=$row4['correctanswer'];
		if ($answer1==$correctanswer) {$correctanswernumber='1';};
		if ($answer2==$correctanswer) {$correctanswernumber='2';};
		if ($answer3==$correctanswer) {$correctanswernumber='3';};
		if ($answer4==$correctanswer) {$correctanswernumber='4';};
		if ($c!=$bn){
		echo"
		 {
           'question': '$question',
           'answers': ['$answer1','$answer2','$answer3','$answer4'],
			  'correctAnswer': $correctanswernumber
       },
		
		";}
		else
		{
			echo "
		 {
           'question': '$question',
           'answers': ['$answer1','$answer2','$answer3','$answer4'],
			  'correctAnswer': $correctanswernumber
       }
		
		";
		}
		
	}
	?>
     ],
	  'resultComments' :  
	  {
		     perfect: 'Albus, is that you?',
			 excellent: 'Outstanding, noble sir!',
			 good: 'Exceeds expectations!',
			 average: 'Acceptable. For a muggle.',
			 bad: 'Well, that was poor.',
			 poor: 'Dreadful!',
			 worst: 'For shame, troll!'
	  }

 };
 </script>