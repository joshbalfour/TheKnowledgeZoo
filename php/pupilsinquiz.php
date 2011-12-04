<?php //lists the pupils that have the quiz assigned to and whether the homework has been completed. ?>
 <table border="1">
 <th>username</th>
 <th>completed</th>
<?php 
require("../php/db.php");

	$query3  = "SELECT * FROM quiz_homework WHERE id='$id'";
	$result3 = mysql_query($query3,$conn);
	while($row3 = mysql_fetch_array($result3, MYSQL_ASSOC))
	  {?>
	 <tr>
    <td><?php echo $row3['user']; ?></td>
    <td><?php echo $row3['complete']; ?></td>
    </tr>
<?php }?>
</table>