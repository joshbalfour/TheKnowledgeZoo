<?php
//add more encouraging phrases from here: http://www.noogenesis.com/malama/encouraging_words.html
?>
<?php $id=$_GET['id']; $id='174df2dea6f481f42a781711791fea32';
require("authpupil.php");?>
<!doctype html>
<html lang="en">
<head>
	<?php include ("../php/iosmeta.php")?>
	<title><?php echo $sitename?></title>

    <link rel="stylesheet" href="../css/ios.css" type="text/css" media="screen" />

</head>
<body>
<?php //<header><h1>Good Luck!</h1></header>?>
<div id="wrapper">

	

	<section id="main">
		<section id="container">
			<section id="content">
			
        		<article>
        		<div id='quiz-container'></div> 
        		
    
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<?php $js="
	<script src='../js/iosjquery2.jquizzy.js'></script>	
	<script src='../js/jquery.jquizzy.init.js'></script>
	"?>
	<?php $phpjs= "<script src='../js/init.php?id=".$id."'></script> 
	<script src='../js/jquery.jquizzy.submit.php?id=".$id."&username=".$username."'></script>"?>
	<script src='../javashizzle/js.php?js="<?php echo htmlentities($js,ENT_QUOTES)?>"&phpjs="<?php echo htmlentities($phpjs,ENT_QUOTES)?>"'></script>
	

        		</article>
						
        		
						
			</section>
		</section>
	</section>

	<footer>
	
	</footer>

</div>
</body>
</html>