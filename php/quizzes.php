<?php
//GUI that lists the current quizzes associated with the user, with the option to create a new quiz
//algorithm to add a new quiz
include("auth.php");
$quizname=$_POST['name'];
$teachername=$_POST['teacher'];
$description=$_POST['description'];
if (!($teachername==''))
{
	$newquiz=true;
} 
if ($newquiz)
{
	  $quizid=md5($quizname.$teachername);
	  $sql="INSERT INTO quiz (id,name,description,teacher,username) VALUES ('$quizid','$quizname','$description','$teachername','$username')";
	  $exec=true;
}
if ($exec)
{
	 
if (!mysql_query($sql, $conn))
	{
	$failed=true;
	}
else
{
	$success=true;
}
}
?>
		<!--[if !IE]>start content<![endif]-->
		<div id="content">
			<div class="inner">
				<?php if ($failed){?>
				<div class="section">
					<ul class="system_messages">
						<li class="red"><span class="ico"></span><strong class="system_title">There was an error adding the quiz !</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
			<?php if ($success){?>
				<div class="section">
					<ul class="system_messages">
						<li class="green"><span class="ico"></span><strong class="system_title">Quiz added successfully !</strong> <a href="" class="close">CLOSE</a></li>
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
								<h2>Your Quizzes:</h2>
								<div style="float: right; height: 40px; padding-left: 20px;"><a href="import"><h2>Import</h2><img src="../images/import.png"></img></a></div>
								<div style="float: right; height: 40px;"><a href="export"><h2>Export</h2><img src="../images/export.png"></img></a></div>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner">
							
							<div class="table_tabs_menu">
							<a href="#" class="update"><span><span><em>Add New Quiz</em><strong></strong></span></span></a>
							
							<div class="table_wrapper_inner" style="display:none">
							<?php include ("newquiz.php")?>

							</div>
							
							<!--[if !IE]>start table_wrapper<![endif]-->
							<div class="table_wrapper">
								<div class="table_wrapper_inner">
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
									<tr>
										<th style="width: 81px;">Name</th>
										<th style="width: 81px;">Description</th>
										<th style="width: 60px;">Name of Teacher</th>
										<th style="width: 165px;"></th>
									</tr>
									<?php include("quizlist.php")?>				
									
								</tbody></table>
								</div>
							</div>
							<!--[if !IE]>end table_wrapper<![endif]-->
							
						</div>
						
						<!--[if !IE]>start pagination<![endif]-->
							<div class="pagination_wrapper">
							<span class="pagination_top"></span>
							<div class="pagination_middle">
							
							</div>
							<span class="pagination_bottom"></span>
							</div>
						<!--[if !IE]>end pagination<![endif]-->
						
						
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				
				<!--[if !IE]>end section<![endif]-->
			</div>
		</div>
		<!--[if !IE]>end content<![endif]-->