<?php //top part of the admin pannel template. ?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link media="screen" rel="stylesheet" type="text/css" href="../css/admin.css"  />
<script type="text/javascript" src="../js/behaviour.js"></script>
<?php if ($page=='editpage' or $page=='homepagemanagement'){include("editshizzle.php");};?>
<?php if ($jquery){?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<?php }?>
<?php if ($collapser){?>
<script src="../js/jquery.collapser.js"></script>
<?php }?>
<?php if ($page=='quizzes' or $page=='pages'){?>
<script>
						$(document).ready(function(){
							
							$('.update').collapser({
								target: 'next',
								effect: 'slide',
								changeText: 0,
								expandClass: 'expArrow',
								collapseClass: 'collArrow'
							});
						});
</script>
<?php }?>
</head>

<body>

	<div id="wrapper">
		
		
		<div id="header_main_menu">
		
		<span id="header_main_menu_bg"></span>
		<div id="header">
			<div class="inner">
				<h1 id="logo"><a href="#">websitename <span>Administration Panel</span></a></h1>
				
				<div id="user_details">
					<ul id="user_details_menu">
						<li class="welcome">Welcome <strong><?php echo $username ?></strong></li>
						
						<li>
							<ul id="user_access">
								
								<li class="last"><a href="logout.php">Log out</a></li>
							</ul>
						</li>
						
						
					</ul>
					
					<div id="server_details">
						<dl>
							<dt>Server time :</dt>
							<dd><?php echo date('g:i A') ?> | <?php echo date('d/m/Y')?></dd>
						</dl>
					</div>
					
				</div>
				
			</div>
		</div>