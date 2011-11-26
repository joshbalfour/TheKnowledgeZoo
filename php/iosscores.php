<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="../js/jquery.collapser.js"></script>
<script src="../js/jquery.collapser.init.js"></script>
<link rel='stylesheet' href='../css/collapser.css' /> 

<?php
require("../php/db.php");
$username=$_GET['oiufre'];
$results = array ();
$query4  = 	   "SELECT id, name
				FROM quiz
				WHERE quiz.username='$username'";
	$result4 = mysql_query($query4,$conn);
	while($row4 = mysql_fetch_array($result4, MYSQL_ASSOC))
	  {
	 $id2=$row4['id'];
	 $name=$row4['name'];
	
	 $bn=0;
	 $query5 = "SELECT number
				FROM quiz_qa
				WHERE id='$id2'";
	  $result5 = mysql_query($query5,$conn);
	while($row5 = mysql_fetch_array($result5, MYSQL_ASSOC))	
      {
	   $bn=$bn+1;
      }
    $results['answers'][$id2]['n']=$bn;
	$query6  = "SELECT username 
				FROM quiz_users
				WHERE masterusername = '$username'";
	
	
	
	$result6 = mysql_query($query6,$conn);
	while($row6 = mysql_fetch_array($result6, MYSQL_ASSOC))
       {
	  	$user=$row6['username'];
	  	$query7  = "SELECT questionNumber, answer, attempt 
				FROM quiz_scores
				WHERE user = '$user' 
				";
	$result7 = mysql_query($query7,$conn);
	while($row7 = mysql_fetch_array($result7, MYSQL_ASSOC))
	      {

	  	?>
	  <?php if (!($user==$us)){	  
	  	$answers[]=$user;	
	  	 $score=0;}
	   $us=$user; $answer=$row7['answer']; $questionNo=$row7['questionNumber']; $attempt=$row7['attempt'];

      $results['answers'][$id2][$user][$questionNo][$attempt]=$answer;
	  
      $query8  = "SELECT correctanswer
				  FROM quiz_qa
				  WHERE id = '$id2' AND number='$questionNo' AND correctanswer = '$answer' 
				 ";
	$result8 = mysql_query($query8,$conn);
	while($row8 = mysql_fetch_array($result8, MYSQL_ASSOC))
	        {
	        	$questions[$questionNo]['correct']='correct';
	        };
	      
	      };
	 $userscore2=0;
	 $lmao=1;
	 while ($lmao<=$bn)
	 {
	 	if ($questions[$lmao]['correct']=='correct')
	 	{
	 	$userscore2=$userscore2+1;
	 	}
	 	$lmao=$lmao+1;
	 }
	 $scoreexists=false;
	  $query9  = "SELECT *
				  FROM `quiz_finalscores`
				  WHERE id = '$id2' AND user='$user' 
				 ";
	  $result9 = mysql_query($query9,$conn);
	  while($row9 = mysql_fetch_array($result9, MYSQL_ASSOC))
	        {
	        	$scoreexists=true;;
	        };
	    $results['answers'][$id2][$user]['score']=$userscore2;
	    if ($scoreexists)
	    {
	    $sql43="UPDATE quiz_finalscores SET score= '" . $userscore2 . "' WHERE (id= '".$id2."' AND user='".$user."')";	    	  	
	    }
	    else
	    {
	  	$sql43="INSERT INTO quiz_finalscores (id,user,score) VALUES ('$id2','$user','$userscore2')";
	    } 
	  	if (!mysql_query($sql43, $conn))
			{
			die('Error: ' . mysql_error());
			}
	  	unset($questions);
      }; 
};
?>
<div class="scores container">
<?php 
// This is dangerous
// I walk through minefields and watch your head rock
//$results ['answers'] [quiz ID] [username] [question number] [attempt] => answer given
// e.g.: $results['answers']['174df2dea6f481f42a781711791fea32']['zori']['1']['2']
$aa=$results['answers'];
$ka=array_keys($aa);
$ya=0;
while ($ya<count($ka))
{ 
?>
	<div class="quiz <?php echo $ya+1;?>"> 
	
<?php 
$id23=$ka[$ya];
$query45  = "SELECT name
				  FROM quiz
				  WHERE id = '$id23'
				 ";
	$result45 = mysql_query($query45,$conn);
	while($row45 = mysql_fetch_array($result45, MYSQL_ASSOC))
	        {
	        	echo $row45['name'];
	        };
$ya=$ya+1;
$a=$results['answers'][$id23];
$k=array_keys($a);
$y=1;
while ($y<count($k))
{?>
		<div class="user <?php echo $y;?>">

<?php
$un=$k[$y];
$userscore=$results['answers'][$id23][$un]['score'];
if ($userscore=='') {$userscore =0;};
$b=$results['answers'][$id23][$y];
$given=count($b);
$bn23=$results['answers'][$id23]['n'];
$x=0;
?>

			<div class="username" ><?php echo $un;?> - <?php echo $userscore;?>/<?php echo $bn23;?></div>
			<div class="users results" style="display:none">
<?php

while(($x<$bn23)and (!($userscore==0)))
{
?>
<?php 
$x=$x+1; 
?>
				<div class="question-number">Question <?php echo $x;?></div>
			<div style="display:none">
<?php 
$c=$results['answers'][$id23][$un][$x];
$na=count($c);
$t=$t+$na;
if ($na==0){
echo '</div>';
}
if (!($na==0))
{
$naa=1;
while ($naa <= $na)
{?>
						
					
						<div class="attempt"><?php echo ordinal_suffix($naa).' Attempt'; ?></div>
							<div class="answer"><?php echo $c[$naa]; $caa=$c[$naa];?></div>
<?php 
$query14  = "SELECT correctanswer
				  FROM quiz_qa
				  WHERE id = '$id23' AND number='$x' 
				 ";
	$result14 = mysql_query($query14,$conn);
	$row14 = mysql_fetch_array($result14, MYSQL_ASSOC);
	if ($row14['correctanswer']==$caa) {
		
		$correctansw=true;}    
		else {$correctansw=false;} 
	      
?>
							<div class="<?php if ($correctansw) {echo 'correct';} else {echo 'incorrect';};?>"><img src="../../img/<?php if ($correctansw) {echo 'correct';} else {echo 'incorrect';};?>2.png" alt="<?php if ($correctansw) {echo 'correct';} else {echo 'incorrect';};?>"/></div>
		
						
<?php 
$naa=$naa+1;
}
?>
	</div>			
<?php 
}
if ($na>=1)
{
	
	$attempted=true;
}
if ($attempted) {?>
					
<?php
}

}
if ($t==0 or $given==0)
{
	
	echo $un.' has not attempted the homework yet.';
    echo '</div>';
	$attempted=false;
	?>
	<?php 
}
$y=$y+1;
?>
	</div>	

<?php 
}
?>
</div>
<?php
}

//arrange data somehow :) - done :3 (poorly)
?>
</div>
</div>
</div>

<?php 
function ordinal_suffix($value, $sup = 0){
// Function written by Marcus L. Griswold (vujsa)
// Can be found at http://www.handyphp.com
// Do not remove this header!

    is_numeric($value) or trigger_error("<b>\"$value\"</b> is not a number!, The value must be a number in the function <b>ordinal_suffix()</b>", E_USER_ERROR);
    if(substr($value, -2, 2) == 11 || substr($value, -2, 2) == 12 || substr($value, -2, 2) == 13){
        $suffix = "th";
    }
    else if (substr($value, -1, 1) == 1){
        $suffix = "st";
    }
    else if (substr($value, -1, 1) == 2){
        $suffix = "nd";
    }
    else if (substr($value, -1, 1) == 3){
        $suffix = "rd";
    }
    else {
        $suffix = "th";
    }
    if($sup){
        $suffix = "<sup>" . $suffix . "</sup>";
    }
    return $value . $suffix;
}
?>
