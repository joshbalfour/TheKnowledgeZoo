<?php //algorithm that sets the template name for a user's site and a GUI for choosing the new template ?>
<?php 
$template= $_POST["template"];
if (!($template=='')){
require("db.php");
	$username = $_COOKIE['user'];
	$query = "UPDATE sites SET template = '" . $template . "' WHERE username='".$username."'";
	mysql_query($query) or die('Error, insert query failed'. mysql_error());
	$success=true;
}
?>
<div id="content">
			<div class="inner">
				<?php if ($failed){?>
				<div class="section">
					<ul class="system_messages">
						<li class="red"><span class="ico"></span><strong class="system_title">There was an error changing the template !</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
			<?php if ($success){?>
				<div class="section">
					<ul class="system_messages">
						<li class="green"><span class="ico"></span><strong class="system_title">Template changed successfully !</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
				<!--[if !IE]>start section<![endif]-->
				<div class="section">
					
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2>Choose a Template:</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner">
							
							<div id="templatechooser">
Template chooser:
<form action="" method="post">
<select name="template">
  <option>surreal</option>
  <option>yellowing</option>
  <option>green and black</option>
</select>
<input type="submit" value="Submit" />
</form>
</div>
<br/>
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
						
						
						
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				
				<!--[if !IE]>end section<![endif]-->
			</div>
		</div>
		<!--[if !IE]>end content<![endif]-->