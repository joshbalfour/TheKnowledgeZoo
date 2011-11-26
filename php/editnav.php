<ul>
<li> <a href="edit.php">index</a></li><?php
				$query  = "SELECT DISTINCT page FROM sites WHERE username='$username'";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				if ($row['page'] !='')
				{
				?><li><a href="edit.php?page=<?php echo $row['page']; ?>"><?php echo $row['page']; ?></a></li><?php }} ?>
</ul>