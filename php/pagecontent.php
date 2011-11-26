<?php
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='' AND page='$page' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				 echo "<p>";
				 echo $row['recordText']; 
				 echo "</p> <br/>";
				 ?>
 
				<?php 
			    }?>