<?php //algorithm that pulls the title for the page for the given username's site.
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='title' AND page='$page' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				{
				?><span id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span>
				<?php } ?>