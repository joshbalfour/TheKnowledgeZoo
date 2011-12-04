<?php 
// Hacky method to detect completion of quiz 
// old, disregard.
$id=$_GET['id'];
require("../php/authpupil.php");
?>
<?php 
	include("db.php");
    $query3  = "SELECT * FROM quiz_qa WHERE id='$id'";
	$result3 = mysql_query($query3,$conn);
	while($row3 = mysql_fetch_array($result3, MYSQL_ASSOC))
	{$biggestnumber=$row3['number'];};
?>
<!doctype html> 
<head> 
<title>Quiz</title> 
<link rel='stylesheet' href='css/styles.css' /> 
    <script src='init.php?id=<?php echo $id;?>'></script> 
	  <script src="http://code.jquery.com/jquery-latest.js"></script>
	 <script src='js/jquery.jquizzy-min.js'></script>
	 <script>function submitscore() {
      var m = $('.correct').length;
      jQuery.ajax("test.php?score="+m+"&id=<?php echo $id;?>&username=<?php echo $username;?>");
      alert("Your score of " + m +"  was submitted to the database!"); 
    };</script> 	 
	 <script>
	 function checkiffinished() {
		  var n = $('.result-row').length;
		  if(n >= 1) {
			submitscore();
		    clearInterval(interval);
		  }
		};
		var interval = setInterval(checkiffinished, 1000);
      </script> 
      <script>
      function answer(number){
      var answer = "BACON STRIPS"; //MOAR BACON STRIPS!!!!!!!!!!!
      answer= document.getElementById('selected').innerHTML; 
      };
      </script>
      <script>
      function questionnumber() { // you're the air that i breath....(8)
	  var number = "0"; //you are everything i need....(8)
	  var number2 = "0"; 
	  var unshortenednumber = "0";
	  var qn=getElementsByClass('question-number');
	  unshortenednumber= qn.innerHTML; //SMASHING ;D   
	  var number2 = unshortenednumber.substring(0, 2); 
      var number = number2.replace("", "/");
	  if (number >=1)
	  {
      answer(number);
      clearInterval(interval2);
	  };
	  var interval2 = setInterval(questionnumber, 1000);
          };
      </script>
      <script>
      function checkifstarted() {
		  var s = $('.question-number').length;
		  if(s >= 1) {
			questionnumber();
		    clearInterval(interval3);
		  }
		};
		var interval3 = setInterval(checkifstarted, 1000);
      </script>
      <script>
      function getElementsByClass( searchClass, domNode, tagName) { 
  		if (domNode == null) domNode = document;
  		if (tagName == null) tagName = '*';
  		var el = new Array();
  		var tags = domNode.getElementsByTagName(tagName);
  		var tcl = " "+searchClass+" ";
  		for(i=0,j=0; i<tags.length; i++) { 
  			var test = " " + tags[i].className + " ";
  			if (test.indexOf(tcl) != -1) 
  				el[j++] = tags[i];
  		} 
  		return el;
  	} 
      </script>
</head> 
 
<body> 
 
<div id='quiz-container'></div> 

	 
 <script>
 $('#quiz-container').quiz({
			questions: init.questions, 
			resultComments: init.resultComments,
		});
 </script> 
<script>
checkiffinished();
</script>
<script>
checkifstarted();
</script>


</body> 
</html>
