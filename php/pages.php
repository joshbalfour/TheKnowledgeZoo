<?php //lists all pages from the specified user in a table with edit buttons,
	  //accept post requests and creates new pages when the user specifies it to. ?>
<?php require("db.php")?>
<?php require("auth.php")?>
 
<?php
$page= $_POST["page"];
if (!($page=='')){
//DB entry
                	    $con = mysql_connect("localhost", "joshbalfour", "beaky1");                	
                		$username=$_COOKIE['user'];
                	    
                		
                		
                		//open connection
						 if (!$con)
						  {
						  die('Could not connect: ' . mysql_error());
						  } 						  
						//Select Database
						mysql_select_db("balfour", $con); 
						
						$sql="INSERT INTO sites (recordID,recordText,recordListingID,username,page, type) VALUES ('1','title','1','$username', '$page','title')";
						$sql2="INSERT INTO sites (recordID,recordText,recordListingID,username,page, type) VALUES ('2','subtitle','2','$username', '$page','subtitle')";
						$sql3="INSERT INTO sites (recordID,recordText,recordListingID,username,page, type) VALUES ('3','footer','3','$username', '$page','footer')";
						
						//Insert data
						if (!mysql_query($sql,$con))
							{
							die('Error: ' . mysql_error());
							$failed=true;
							}
						if (!mysql_query($sql2,$con))
							{
							die('Error: ' . mysql_error());
							$failed=true;
							}
						if (!mysql_query($sql3,$con))
							{
							die('Error: ' . mysql_error());
							$failed=true;
							}	
							
							if (!($failed)){$success=true;};						
}
							
?>

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
								<h2>Your Pages:</h2>
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
							<a href="#" class="update"><span><span><em>Add New Page</em><strong></strong></span></span></a>
							
							<div class="table_wrapper_inner" style="display:none">
							<div id="newpage">
<form action="" method="post">
Page Name:<input type="text" name="page" />
<input type="submit" value="Submit" />
</form>
</div>

							</div>
							<!--[if !IE]>start table_wrapper<![endif]-->
							<div class="table_wrapper">
								<div class="table_wrapper_inner">
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
									<tr>
										<th style="width: 81px;">Name</th>
										<th style="width: 165px;"></th>
									</tr>
									<?php include("pagelist.php")?>				
									<?php // cos baby tonight, the DJ's got us falling in love agaaaaain?>
								   </tbody>
								</table>
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