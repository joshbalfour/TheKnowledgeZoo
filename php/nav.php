<?php //navigation bar that detects the current page and marks it as selected ?>
		<div id="main_menu">
			<div class="inner">
			<ul>
				<li><a href="dashboard" <?php if ($page=='dash'){?>class="selected_lk"<?php }?>><span class="l"><span></span></span><span class="m"><em <?php if ($page==addquestion){?> style="padding-top:9px;"<?php }?>>Dashboard</em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="quizzes" <?php if ($page==addquestion or $page=='quizzes'){?>class="selected_lk"<?php }?>><span class="l"><span></span></span><span class="m"><em <?php if ($page==addquestion ){?> style="padding-top:9px;"<?php }?>>Quizzes</em><span></span></span><span class="r"><span></span></span></a></li>				
				<li><a href="pupilmanagement" <?php if ($page=='pupilmanagement'){?>class="selected_lk"<?php }?>><span class="l"><span></span></span><span class="m"><em <?php if ($page==addquestion ){?> style="padding-top:9px;"<?php }?>>Pupil Management</em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="message" <?php if ($page=='message'){?>class="selected_lk"<?php }?>><span class="l"><span></span></span><span class="m"><em <?php if ($page==addquestion ){?> style="padding-top:9px;"<?php }?>>Pupil Messaging</em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="pupilscores" <?php if ($page=='pupilscores'){?>class="selected_lk"<?php }?>><span class="l"><span></span></span><span class="m"><em <?php if ($page==addquestion ){?> style="padding-top:9px;"<?php }?>>Pupil Scores</em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="pages" <?php if ($page=='pages' or $page=='editpage'){?>class="selected_lk"<?php }?>><span class="l"><span></span></span><span class="m"><em <?php if ($page==addquestion ){?> style="padding-top:9px;"<?php }?>>Pages</em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="templates" <?php if ($page=='templates'){?>class="selected_lk"<?php }?>><span class="l"><span></span></span><span class="m"><em <?php if ($page==addquestion){?> style="padding-top:9px;"<?php }?>>Site Templates</em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="homepagemanagement" <?php if ($page=='homepagemanagement'){?>class="selected_lk"<?php }?>><span class="l"><span></span></span><span class="m"><em <?php if ($page==addquestion){?> style="padding-top:9px;"<?php }?>>Homepage Manager</em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="help" <?php if ($page=='help'){?>class="selected_lk"<?php }?>><span class="l"><span></span></span><span class="m"><em <?php if ($page==addquestion){?> style="padding-top:9px;"<?php }?>>Help</em><span></span></span><span class="r"><span></span></span></a></li>
			</ul>
			</div>
			<span class="sub_bg"></span>
		</div>
		</div>		