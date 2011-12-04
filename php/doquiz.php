<?php // the page on which the pupils do their quizzes ?>
<?php $id=$_GET['id'];
require("authpupil.php");?>
<?php $number=rand(1,7);
if ($number==1) {$animal='cow';};
if ($number==2) {$animal='giraffe';};
if ($number==3) {$animal='goat';};
if ($number==4) {$animal='hippo';};
if ($number==5) {$animal='owl';};
if ($number==6) {$animal='pig';};
if ($number==7) {$animal='zebra';};
$bigimage='no'.$animal.'.png';
$smallimage=$animal.'.png';
$encouragement=rand(1,5);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $sitename?></title>
<?php $css= '
    <link rel="stylesheet" href="../css/styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/quiz.css" /> <link rel="stylesheet" href="../css/epichaxorz.css"/>'?>
	<link media="screen" rel="stylesheet" type="text/css" href="../style/style.php?css=<?php echo htmlentities($css,ENT_QUOTES)?>"  />
	
</head>
<body>
<div id="wrapper">
<?php if ($crapbrowser){?> <div class="IE4"> <?php }?>
	<?php if ($crapbrowser){?><div class="IE17"><?php } else {?>
	<header><?php }?>
		<h1><a href="#"><?php echo $sitename?></a></h1>
		<h2 <?php if ($crapbrowser){?> class="IE1" <?php }?>>Teach your little monkeys! <?php if ($auth){?><a href="logout"><img style="border: none;"src="../img/logout.png" alt="Logout"></img></a><?php }?></h2>
		<div style="padding-left:45px;" <?php if ($crapbrowser){?> class="IE2" <?php }?>>
		<img src="../img/<?php echo $bigimage?>" alt="bigimage"></img>
		</div>
	<?php if ($crapbrowser){?></div><?php } else {?>
	</header><?php }?>
<?php if ($crapbrowser){?> </div> <?php }?>
	<section id="main">
		<section id="container" style="padding-right:150px;">
			<section id="content">
			<?php if ($crapbrowser){?> <div class="IE3"> <?php }?>
        		<article>
        		<div id='quiz-container' <?php if ($crapbrowser){?> class="IE3" <?php }?>></div> 
     <script src="http://code.jquery.com/jquery-latest.js"></script>   		
    <?php if ($crapbrowser){?>
	
	<script src='../js/jquery.jquizzy.submit.php?id=<?php echo $id?>&username=<?php echo $username?>'></script>
	<script src='../js/jquery.jquizzy2.js'></script>
	<script src='../js/init.php?id=<?php echo $id ?>'></script> 	
	<script src='../js/jquery.jquizzy.init.js'></script>
	<?php } else {?>	
	<?php $js="
	<script src='../js/jquery.jquizzy2.js'></script>	
	<script src='../js/jquery.jquizzy.init.js'></script>
	"?>
	<?php $phpjs= "<script src='../js/init.php?id=".$id."'></script> 
	<script src='../js/jquery.jquizzy.submit.php?id=".$id."&username=".$username."'></script>"?>
	
	  <script src='../javashizzle/js.php?phpjs="<?php echo htmlentities($phpjs,ENT_QUOTES)?>"&js="<?php echo htmlentities($js,ENT_QUOTES)?>"'></script>
<?php }?>
        		</article>
			<?php if ($crapbrowser){?>	</div> <?php }?>		
        		
						
			</section>
		</section>
<?php if ($crapbrowser){?> <div class="IE6"> <?php }?><a href="quizzes"><img src="../img/back2.png" alt="back"></img></a><?php if ($crapbrowser){?></div><?php } ?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>		<aside id="sidebar">
		<?php if ($crapbrowser){?>	<div class="IE5"> <?php }?>
					<div style="width: 111px;">	<img src="../img/<?php echo $smallimage?>" alt="littleimage"></img>
<?php if ($crapbrowser){?>	<div class="IE7"> <?php }?><div style="position: absolute; left: 13%; top: 540px;"><img src="../img/<?php echo $encouragement?>.png" alt="encouragement"></img>
</div></div><?php if ($crapbrowser){?> </div><?php }?>

		</aside>
<?php if ($crapbrowser){?>	</div> <?php }?>
	</section>

	<footer>
		<section id="footer-area">

			<section id="footer-outer-block">
					<aside id="first" class="footer-segment">
							
					</aside>

					<aside id="second" class="footer-segment">
							
					</aside>

					<aside id="third" class="footer-segment">
							
					</aside>
					
					<aside id="fourth" class="footer-segment">
							</aside>

			</section>

		</section>
	</footer>

</div>
</body>
</html>