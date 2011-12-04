<?php //version of the quiz listing algorithm formatted for iOS ?>
<?php 
require("db.php");
$username=$_GET['trololol'];
				$query  = "SELECT * FROM quiz WHERE username='$username'";
				$result = mysql_query($query,$conn);
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				?>										
	<li><a class="edit" href="addquestion.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'];?></a></li>
												
			<?php } ?>
				