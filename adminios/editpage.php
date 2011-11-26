<?php include("../php/iosheader.php")?>
<?php $username=$_GET['CALL911RIGHTNOWWWWWWUBWUBWUBW']?>
<?php include("../php/db.php")?>
<?php $id=$_GET['id']?>
<?php $ref=$_GET['r']; if ($ref!='') { $hp=true; }?>
<div id="header"><h1>Edit <?php if (!($id=='')){echo $id;} else {echo 'Homepage';}?></h1><a href="<?php if ($hp){?>index.php<?php } else {?>pages.php<?php }?>" id="backButton" class="nav">Back</a>
</div>

<?php include("../php/editshizzle.php")?>
<p>click on anything to edit it</p>
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
				?><span class="footer" id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span><br/>
				<?php } ?>	
<!-- footer end -->	
<div class="stupidbuttonthatwontmove">
<a align="right" href="#" style="color: black;" class="button white"><div id="ajaxlink" onclick="loadurl('../php/iosnew.php?page=<?php echo $id?>&user=<?php echo $username?>')">New Content Item</div></a>
</div>

<?php include("../php/iosfooter.php")?>	