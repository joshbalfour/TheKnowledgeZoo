<?php ob_start("ob_gzhandler"); //gzip compression ?>
<?php // include("../php/obfuscation.php")?>

<?php
// set the expiration date to one hour ago
setcookie("user", "", time()-3600);
setcookie("password", "", time()-3600);
?>
<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
<link media="screen" rel="stylesheet" type="text/css" href="../css/login.css"  />

<link media="screen" rel="stylesheet" type="text/css" href="../css/login-white.css"  />
</head>

<body>
	<div id="wrapper">
	<div id="wrapper2">
	<div id="wrapper3">
	<div id="wrapper4">
	<span id="login_wrapper_bg"></span>
	
	<div id="stripes">
	
		
		<div id="login_wrapper">
			
	
			
			
			
			<form name="form1" method="post" action="">
				<fieldset>
					
				
			
			
			<h1>Thanks for logging out</h1>
					<div class="formular">
						<span class="formular_top"></span>
						
						<div class="formular_inner">
						
						
						
						<label class="inline">
							You have successfully logged out.
						</label>
						<meta HTTP-EQUIV="REFRESH" content="2; url=login.php">
						
						<ul class="form_menu">
						</ul>
						
						</div>
						
						<span class="formular_bottom"></span>
						
					</div>
				</fieldset>
			
			
			
			
			<span class="reflect"></span>
			<span class="lock"></span>
		
			
			
		</div>

	    </div>
		</div>
     	</div>
		</div>	
	</div>
</body>
</html>
