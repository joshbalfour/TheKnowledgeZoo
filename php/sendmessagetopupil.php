<?php // allows the teacher to message a pupil if the pupil has an iDevice ?>
<?php // $username=$_GET['u'];?>
<?php include("db.php")?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<form id="sendmessage">
    <div>

    <select id="slct">
<?php $query  = "SELECT * FROM quiz_users,push WHERE masterusername='$username' AND quiz_users.username=push.user";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{?>
					<option><?php echo $row['name']?></option>
			<?php }?>
	</select>

      <input type="text" id="messg" />

      <input type="submit" />
    </div>
  </form>
  <span id="fbk"></span>
<script src="../js/sendmessage.js"></script>