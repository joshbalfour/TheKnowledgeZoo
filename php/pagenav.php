<?php //lists all unique page names associated with the specified user in a menu bar format ?>
<ul>
<li class="current"><a href="<?php echo $username; ?>">Home</a></li><?php
				$query  = "SELECT DISTINCT page FROM sites WHERE username='$username'";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				if ($row['page'] != '') 
				{?><li><a href="<?php echo $username; ?>?page=<?php echo $row['page']; ?>"><?php echo $row['page']; ?></a></li><?php } }?>		
</ul>