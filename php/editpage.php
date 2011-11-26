<!--[if !IE]>start content<![endif]-->
		<div id="content">
			<div class="inner">
				<?php if ($failed){?>
				<div class="section">
					<ul class="system_messages">
						<li class="red"><span class="ico"></span><strong class="system_title">There was an error adding the page !</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
			<?php if ($success){?>
				<div class="section">
					<ul class="system_messages">
						<li class="green"><span class="ico"></span><strong class="system_title">Page Created successfully !</strong> <a href="" class="close">CLOSE</a></li>
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
								<h2>Edit your page: "<?php if (!($id=='')){echo $id;} else {echo 'Homepage';}?>"</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner" >
							<div id="contentLeft">
<!-- title begin -->
				<h1>
				<?php
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='title' AND page='$id' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				{
				?><span id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span>
				<?php } ?>
				</h1>
<!-- title end -->

<!-- subtitle begin -->				
				<h2><?php
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='subtitle' AND page='$id' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				?><span id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span>
				<?php } ?></h2>						
<!-- subtitle end -->
<br/><br/><br/><br/>
<!-- content begin -->
		
		<ul class="sortable" id="new">
		
				<?php
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='' AND page='$id' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				?><li id="recordsArray_<?php echo $row['recordID']; ?>"><span id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span></li>
				<?php } ?>
						
		</ul>
<!-- content end -->
		<br/>
<!-- footer begin -->
					<?php
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='footer' AND page='$id' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				?><span id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span>
				<?php } ?>	
<!-- footer end -->	

							</div>
							<a align="right" href="#" style="color: black;"><div id="ajaxlink" onclick="loadurl('../php/new.php?page=<?php echo $id?>&user=<?php echo $username;?>')"><a href="#" class="update"><span><span><em>New Content Item</em><strong></strong></span></span></a></div></a>
							
							</div>
							
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