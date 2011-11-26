<?php 
require("../../php/db.php");
$uploaded=0;
$ext="";

//generate unique file name using time:
$newfilename= md5(rand() * time());

//do we have a file?
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0))
{

   $filename =strtolower(basename($_FILES['uploaded_file']['name']));

   $ext = substr($filename, strrpos($filename, '.') + 1);

   
   //Determine the path to which we want to save this file
   $ext=".".$ext;
   $newname = dirname(__FILE__).'/temp/'.$newfilename.$ext;

       if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname)))
       {
       
       $uploaded=1;
       }
       else
       {
        echo "Error:!";
        print('<p><a href="../../admin/import?s=n">Back</a></p>');
       }
   } 
   else {
echo "Error! File is not uploaded o.0!";
print('<p><a href="../../admin/import?s=n">Back</a></p>');
}
if ($uploaded==1)
{

$fh = fopen($newname, 'r');
$fileh = fread($fh, filesize($newname));
fclose($fh);
$answers = explode("~", $fileh);
$x=0;
foreach ($answers as $answer)
{
	$decryptedAns[$x]=base64_decode($answer);
	$x++;
}
foreach ($decryptedAns as $answ)
{
	$answ2= explode("|", $answ);
//	var_dump($answ2);
	$id=$answ2[0];
	$username=$answ2[1];
	$qn=$answ2[2];
	$answer=$answ[3];
	if ($id!='')
	{
	submiteeh($id,$username,$qn,$answer);
	}
	echo '<meta http-equiv="refresh" content="0;url=../../admin/import?s=y">';
}
}

// make eet look pretteh :3



function submiteeh($id,$username,$questionNumber,$answer)
{
global $conn;
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
echo $sql;
}

	?>