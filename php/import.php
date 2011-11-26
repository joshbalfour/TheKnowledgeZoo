<?php 
include("auth.php");
if ($_GET['s']=='n') {$failed = true;};
if ($_GET['s']=='y') {$success = true;};
?>
		<!--[if !IE]>start content<![endif]-->
		<div id="content">
			<div class="inner">
			
			<?php if ($failed){?>
				<div class="section">
					<ul class="system_messages">
						<li class="red"><span class="ico"></span><strong class="system_title">There was an error importing the scores !</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
			<?php if ($success){?>
				<div class="section">
					<ul class="system_messages">
						<li class="green"><span class="ico"></span><strong class="system_title">The scores were imported successfully !</strong> <a href="" class="close">CLOSE</a></li>
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
								<h2>Import an exported quizzes scores</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner">
						<h3>Select the UserData.ini file to import the scores.</h3>	
						<br/>
						<form action="../offline/import/import2.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="uploaded_file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</div>
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->
				
				
				
				
			</div>
		</div>
		<!--[if !IE]>end content<![endif]-->