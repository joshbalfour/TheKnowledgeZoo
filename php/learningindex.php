<?php //index page that the pupil sees ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $sitename?></title>
	<?php $css='<link rel="stylesheet" href="../css/styles.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="../css/indexanimation.css"/> <link rel="stylesheet" href="../css/epichaxorz.css"/>
	'?><link media="screen" rel="stylesheet" type="text/css" href="../style/style.php?css=<?php echo htmlentities($css,ENT_QUOTES)?>"  />
	
<?php if (!($crapbrowser)){?>
   <?php $js="<script type='text/javascript' src='../js/jquery-1.4.2.min.js'></script>
    <script type='text/javascript' src='../js/jquery.easing.1.3.js'></script>
    <script type='text/javascript' src='../js/edge.0.1.1.min.js'></script>
    <script type='text/javascript' src='../js/edge.symbol.0.1.1.min.js'></script>
    <script type='text/javascript' charset='utf-8' src='../js/indexanimation.js'></script>
"?>
	<script src='../javashizzle/learningindex.js'></script>
<?php }?>
</head>
<body>
<div id="wrapper">

<?php if ($crapbrowser){?><div class="IE15"><?php } else {?>
	<header><?php }?>
		<h1><a href="#"><?php echo $sitename?></a></h1>
		<h2>Teach your little monkeys! <?php if ($auth){?><a href="logout"><img style="border: none;"src="../img/logout.png" alt="Logout"></img></a><?php }?></h2>
		<div <?php if ($webkit){?> class="webkit1" <?php } if ($firefox) {?>class="firefox1"<?php }?>>
		<?php if (!($crapbrowser)){?><div id="stage" class="symbol_stage">
	</div><?php }?></div><?php if ($crapbrowser){?><img class="IE9" src="../img/all.png"/><?php }?>
	<?php if ($crapbrowser){?></div><?php } else {?>
	</header><?php }?>
	
	<section id="main" >
		<section id="container" <?php if ($firefox){?> class="firefox2" <?php }?>>
			<section id="content" style="padding: 0; margin: 0; border: 0;">
			<?php if ($crapbrowser){?> <div class="IE11"><center><?php }?>
        		<article>
							<?php if ($logout){?>
							<h2> Thank you for logging out!</h2><?php }?>
							<h2>Welcome to <?php echo $sitename ?></h2>							
							<p>Please login to access your homework</p>
							<a href="login" style="margin-left: -14px;"><img src="../img/login.png" alt="login"/></a>

				</article>
				<?php if ($crapbrowser){?></div></center><?php }?>		
        		
						
			</section>
		</section>

		<aside id="sidebar">
				<h3></h3>
					<ul>
						
					</ul>

		</aside>

	</section>

	<footer>
	<?php if ($crapbrowser){?><div class="IE16"> <?php }?>
		<section id="footer-area">
<a href="http://admin.theknowledgezoo.com">Teacher?</a>
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
			<?php if ($crapbrowser){?></div><?php }?>
		</section>
	</footer>

</div>
</body>
</html>
