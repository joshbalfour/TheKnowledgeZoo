<?php include("../php/iosheader.php") ?>
<div id="header"><a href="index.php" id="backButton" class="nav">Back</a><h1>Templates</h1></div>

<?php 
$template= $_POST["template"];
if (!($template=='')){
require("../php/db.php");
	$username = $_GET['afsljd'];
	$query = "UPDATE sites SET template = '" . $template . "' WHERE username='".$username."'";
	mysql_query($query) or die('Error, insert query failed'. mysql_error());
	$success=true;
}
?>
<?php if ($failed){?>
<ul><li>template change failed :(</li></ul>
			<?php }?>
			<?php if ($success){?>
			<ul><li>template change succeeded :D</li></ul>
			<?php }?>
<div>
<form action="" method="post">
<select name="template">
  <option>surreal</option>
  <option>yellowing</option>
  <option>green and black</option>
</select>
<input type="submit" value="Submit" />
</div>
<div>
<div class="template" style="height=150px; width=150px; border=1px; float: left; padding-left:15px;" >
<div class="picture" >
<img src="../../img/surreal.jpg" alt="surreal" height="150px" width="150px"></img>
</div>
<div class="caption">
<span>surreal</span>
</div>
</div>

<div class="template" style="height=150px; width=150px; border=1px; float: left; padding-left:15px;" >
<div class="picture" >
<img src="../../img/yellowing.jpg" alt="yellowing" height="150px" width="150px"></img>
</div>
<div class="caption">
<span>yellowing</span>
</div>
</div>

<div class="template" style="height=150px; width=150px; border=1px; float: left; padding-left:15px;" >
<div class="picture" >
<img src="../../img/greenandblack.jpg" alt="green and black" height="150px" width="150px"></img>
</div>
<div class="caption">
<span>Green and black</span>
</div>
</div>
</div>
<?php include("../php/iosfooter.php")?>