<div id="header">
		<h1>login</h1>
		<a href="index.php" id="backButton" class="nav">Back</a>
	</div>

<h1><?php echo $message ?></h1>
<form name="form1" method="post" action="loginn.php">
<ul class="form">
	<li><input type="text" autocorrect="off" autocapitalize="off" name="username" placeholder="username" id="username" /></li>
	<li><input type="password" autocorrect="off" autocapitalize="off" name="password" placeholder="password" id="password" /></li>
</ul>

<input class="button white" type="submit" name="Submit" value="login">

</form>