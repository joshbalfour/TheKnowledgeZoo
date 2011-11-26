<?php
$query = "SELECT * FROM push, quiz_users
		  WHERE quiz_users.masterusername='$username' AND quiz_users.username=push.user";

				$result = mysql_query($query,$conn);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					echo $row['name'];
				}
?>