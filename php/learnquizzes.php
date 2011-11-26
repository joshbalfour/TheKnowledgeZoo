<?php 
require("db.php");
require("authpupil.php");
$x=0;
	$query3  = "SELECT DISTINCT quiz.name, quiz.id
				FROM quiz_homework, quiz_users, quiz
				WHERE quiz_users.masterusername = quiz.username
				AND quiz_homework.id = quiz.id
				AND quiz_homework.user =  quiz_users.username
				AND quiz_users.username =  '$username'
				AND quiz_homework.complete = 'no'";
	$result3 = mysql_query($query3,$conn);
	while($row3 = mysql_fetch_array($result3, MYSQL_ASSOC))
	  {
	  $x=$x+1;
	  }
?>  	
<?php 
if ($x==1) {$x=$x.' piece';} else {$x=$x.' pieces';};
if ($x==0)
{
$pigthought='You have no homework left to do!';
}
else
{
$pigthought='You have '.$x.' of homework!'.'   '.'To start a quiz, click on it!';
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $sitename?></title>
	<?php $css= '<link rel="stylesheet" href="../css/styles.css" type="text/css" media="screen" />     <link rel="stylesheet" href="../css/piganimation.css"/>
	<link rel="stylesheet" href="../css/epichaxorz.css"/>'?>
		<link media="screen" rel="stylesheet" type="text/css" href="../style/style.php?css=<?php echo htmlentities($css,ENT_QUOTES)?>"  />
	<?php if (!($crapbrowser)){?>
 <?php $js="   <script type='text/javascript' src='../js/jquery-1.4.2.min.js'></script>
    <script type='text/javascript' src='../js/jquery.easing.1.3.js'></script>
    <script type='text/javascript' src='../js/edge.0.1.1.min.js'></script>
    <script type='text/javascript' src='../js/edge.symbol.0.1.1.min.js'></script>"?>
 <?php $phpjs="<script type='text/javascript' charset='utf-8' src='../js/pig.php?pigthought=".$pigthought."'></script>"?>
	<script src='../javashizzle/learnquizzes.js'></script>
	<script src='../javashizzle/js.php?phpjs="<?php echo htmlentities($phpjs,ENT_QUOTES)?>"'></script>
<?php }?>
</head>
<body>
<div id="wrapper">

<?php if ($crapbrowser){?><div class="IE15"><?php } else {?>
	<header><?php }?>
		<h1><a href="#"><?php echo $sitename ?></a></h1>
		<h2>Teach your little monkeys! <?php if ($auth){?><a href="logout"><img style="border: none;"src="../img/logout.png" alt="Logout"></img></a><?php }?></h2>
		<div <?php if ($webkit){?> class="webkit1" <?php } if ($firefox) {?>class="firefox1"<?php }?>>
		<div id="stage" class="symbol_stage">
	</div><?php if ($crapbrowser){?><img class="IE9" src="../img/quizzes.png"/> <div class="IE10"><p><?php echo $pigthought ?> </p></div> <?php }?></div>
		<?php if ($crapbrowser){?></div><?php } else {?>
	</header><?php }?>
	
	<nav>
		
	</nav>


	<section id="main">
		<section id="container" <?php if ($firefox){?> class="firefox3" <?php }?>>	
			<section id="content">
        		<article>
        		<?php if ($crapbrowser){?> <div class="IE8"> <?php }?>
        		<?php include ("homeworklist.php")?>
        		<?php if ($crapbrowser){?> </div> <?php }?>
        		</article>
        		</section>
		</section>

		<aside id="sidebar">
				<h3></h3>
					<ul>
					</ul>

		</aside>

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