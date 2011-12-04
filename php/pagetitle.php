<?php //pulls the page title from the database for the specified user for the specified page ?>
<?php
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='title' AND page='$page' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				{
				 echo $row['recordText'];
			    } ?>