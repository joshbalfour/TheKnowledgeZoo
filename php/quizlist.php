<?php 
require("db.php");
require("auth.php");
				$query  = "SELECT * FROM quiz WHERE username='$username'";
				$result = mysql_query($query,$conn);
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				?>
				<tr class="first">
										<td><?php echo $row['name'];?></td>
										<td><?php echo $row['description'];?></td>
										<td><?php echo $row['teacher'];?></td>
										<td>
											<div class="actions_menu">
												<ul>
													<li><a class="details" href="pupilscores?id=<?php echo $row['id']; ?>">Pupil Scores</a></li>
													<li><a class="edit" href="addquestion?id=<?php echo $row['id']; ?>">Edit</a></li>
												</ul>
											</div>
										</td>
									</tr>
				
				
				
				
				
				<?php } ?>
				