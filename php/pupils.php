<table cellpadding="0" cellspacing="0" width="100%">

<tbody>
									<tr>
										<th>Name</th>
										<th>Username</th>
										<th>Password</th>
										<th>Device?</th>
									</tr>
<?php
require("db.php");
include("auth.php");
    $query2  = "SELECT * FROM quiz_users WHERE masterusername='$username'";
	$result2 = mysql_query($query2,$conn);
	while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
	{?>
	<tr class="first">
	<td><?php echo $row2['name']; ?></td>
	<td><?php echo $row2['username']; ?></td>
	<td><?php echo $row2['password']; ?></td>
	<td><?php echo hasDevice($row2['username']); ?></td>
	</tr>
	<?php }
?>

</tbody>

</table>
<?php 
function hasDevice($username)
{
$query  = "SELECT * FROM push WHERE user='$username'";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$hasDevice=true;
				}
	if ($hasDevice)
	{
		return 'yes';
	}
	else
	{
		return 'no';
	}
}

?>