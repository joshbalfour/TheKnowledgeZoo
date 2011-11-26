<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $sitename ?></title>
<?php if (!($crapbrowser)){?>
<?php $js="<script type='text/javascript' src='../js/jquery-1.4.2.min.js'></script>
    <script type='text/javascript' src='../js/jquery.easing.1.3.js'></script>
    <script type='text/javascript' src='../js/edge.0.1.1.min.js'></script>
    <script type='text/javascript' src='../js/edge.symbol.0.1.1.min.js'></script>"?>
 <?php  $phpjs=" <script type='text/javascript' src='../js/owl.php?owlthought=".$owlthought."'></script>
   "//combine css to static file!!! //cba :3
 ?> 
<?php }?>
 <?php $css='   <link rel="stylesheet" href="../css/owlanimation.css"/>
    <link rel="stylesheet" href="../css/styles.css" type="text/css" media="screen" /><link rel="stylesheet" href="../css/epichaxorz.css"/>
	'?>	<link media="screen" rel="stylesheet" type="text/css" href="../style/style.php?css=<?php echo htmlentities($css,ENT_QUOTES)?>"  />
		<script src='../javashizzle/js.php?js=<?php echo htmlentities($js,ENT_QUOTES)?>&phpjs=<?php echo htmlentities($phpjs,ENT_QUOTES)?>'></script>
	
</head>
<body>
<div id="wrapper">
<?php if ($crapbrowser){?><div class="IE15"><?php } else {?>
	<header><?php }?>
		<h1><a href="#"><?php echo $sitename ?></a></h1>
		<h2>Teach your little monkeys!</h2>
		<div <?php if ($webkit){?> class="webkit1" <?php } if ($firefox) {?>class="firefox1"<?php }?>>
		<?php if (!($crapbrowser)){?><div id="stage" class="symbol_stage"></div><?php }?>
		<?php if ($crapbrowser){?><img class="IE9" src="../img/loginlawl.png"/> <div class="IE12"><p><?php echo $owlthought ?> </p></div> <?php }?>
	</div><?php if ($crapbrowser){?></div><?php } else {?>
	</header><?php }?>
	
	
	<section id="main">
		<section id="container" <?php if ($firefox){?> class="firefox3" <?php }?>>
			<section id="content">
			<?php if ($crapbrowser){?><div class="IE13"> <?php }?>
        		<article>
<form name="form1" method="post" action="">
<input type="submit" name="Yes" value="Yes that's me!">
<input type="submit" name="No" value="No, not the last time i looked anyway!">
</form> 
<?php echo $_POST['Yes']; echo $_POST['No'];?>
</article>
<?php if ($crapbrowser){?></div> <?php }?>
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