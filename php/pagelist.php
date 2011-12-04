<?php //lists all unique page names associated with the specified user ?>
<tr class="first">
<td>index</td>
<td>

											<div class="actions_menu">
												<ul>
													<li><a class="edit" href="editpage?id=<?php echo $row['id']; ?>">Edit</a></li>
												</ul>
											</div>
</tr>										</td>
<?php
				$query  = "SELECT DISTINCT page FROM sites WHERE username='$username'";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				if ($row['page'] !='')
				{
				?>
				<tr class="first">
				<td><?php echo $row['page']; ?>
				<td>
											<div class="actions_menu">
												<ul>
													<li><a class="edit" href="editpage?id=<?php echo $row['page']; ?>">Edit</a></li>
												</ul>
											</div>
										</td>
				</tr>
				<?php }} ?>

				