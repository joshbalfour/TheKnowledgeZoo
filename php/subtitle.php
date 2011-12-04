<?php //algorithm that pull's a subtitle for a given user's page
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='subtitle' AND page='$page' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				?><span id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span>
				<?php } ?>