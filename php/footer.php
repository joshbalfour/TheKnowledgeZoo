<?php //fetches the footer for the relavent user's website
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='footer' AND page='$page' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				?><span id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span>
				<?php } ?>