<?php $id=$_GET['id'];
require("../php/authpupil.php");
?>
<!doctype html> 
<head> 
<title>Quiz</title> 
<link rel='stylesheet' href='../css/quiz.css' /> 

</head> 
 
<body> 
<div id='quiz-container'></div> 
	 <script src="http://code.jquery.com/jquery-latest.js"></script>
	 <script src='../js/jquery.jquizzy.js'></script>
	 <script src='../js/init.php?id=<?php echo $id;?>'></script> 
	 <script src='../js/jquery.jquizzy.init.js'></script>
     <script src='../js/jquery.jquizzy.submit.php?id=<?php echo $id?>&username=<?php echo $username?>'></script> 
</body> 
</html>
