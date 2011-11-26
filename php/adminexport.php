<?php 
include("auth.php");
?>
		<!--[if !IE]>start content<![endif]-->
		<div id="content">
			<div class="inner">
			<?php if ($failed){?>
				<div class="section">
					<ul class="system_messages">
						<li class="red"><span class="ico"></span><strong class="system_title">There was an error adding the pupil !</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
			<?php if ($success){?>
				<div class="section">
					<ul class="system_messages">
						<li class="green"><span class="ico"></span><strong class="system_title">Pupil added successfully !</strong> <a href="" class="close">CLOSE</a></li>
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
								<h2>Export Quizzes Offline</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner">	
							<form name="export" action="../offline/export.php" method="post">
								<?php 
								require("db.php");
								require("auth.php");
								$x=0;
												$query  = "SELECT * FROM quiz WHERE username='$username'";
												$result = mysql_query($query,$conn);
												while($row = mysql_fetch_array($result, MYSQL_ASSOC))
												{
												
								echo '<input type="checkbox" name="'.$x.'" value="'.$row['id'].'" /> '.$row['name'].'<br />';
								$x++;
												}
								?>
								<input type="submit" /> 
							</form>
							<br/>
							<span>A zip file will download with your exported quiz, unzip this file and then run TKZOffline.exe</span>
						</div>
						
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->
				
				
				
				
			</div>
		</div>
		<!--[if !IE]>end content<![endif]-->
