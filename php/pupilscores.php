<?php //template for the pupil's scores listing. ?>
<div id="content">
			<div class="inner">
				<!--[if !IE]>start section<![endif]-->
					<div class="section">
					
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2>Your Pupil's Scores:</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner">
							
							<?php include("scores.php")?>
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				
				<!--[if !IE]>end section<![endif]-->
			</div>
		</div>
		<!--[if !IE]>end content<![endif]-->