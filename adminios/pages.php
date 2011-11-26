<?php include("../php/iosheader.php")?>
<?php $username=$_GET['becosomnomskay']?>
<?php include("../php/db.php")?>

<?php
$page= $_POST["page"];
if (!($page=='')){
//DB entry
                	    $con = mysql_connect("localhost", "joshbalfour", "beaky1");                	

                		//open connection
						 if (!$con)
						  {
						  die('Could not connect: ' . mysql_error());
						  } 						  
						//Select Database
						mysql_select_db("balfour", $con); 
						
						$sql="INSERT INTO sites (recordID,recordText,recordListingID,username,page, type) VALUES ('1','title','1','$username', '$page','title')";
						$sql2="INSERT INTO sites (recordID,recordText,recordListingID,username,page, type) VALUES ('2','subtitle','2','$username', '$page','subtitle')";
						$sql3="INSERT INTO sites (recordID,recordText,recordListingID,username,page, type) VALUES ('3','footer','3','$username', '$page','footer')";
						
						//Insert data
						if (!mysql_query($sql,$con))
							{
							die('Error: ' . mysql_error());
							$failed=true;
							}
						if (!mysql_query($sql2,$con))
							{
							die('Error: ' . mysql_error());
							$failed=true;
							}
						if (!mysql_query($sql3,$con))
							{
							die('Error: ' . mysql_error());
							$failed=true;
							}	
							
							if (!($failed)){$success=true;};						
}
							
?>
<ul>
<?php
				$query  = "SELECT DISTINCT page FROM sites WHERE username='$username'";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				if ($row['page'] !='')
				{
					?>
				<li><a class="arrow"href="editpage.php?id=<?php echo $row['page']; ?>&CALL911RIGHTNOWWWWWWUBWUBWUBW=<?php echo $username?>"><?php echo $row['page']; ?></a></li>
												
				<?php }} ?>
				<li>
<div id="newpage">
<form action="" method="post">
<input type="text" name="page" placeholder="new page name"/>
<input class="button white" type="submit" value="make a new page" />
</form>
</div>
</li>
</ul>

							</div>
<?php include("../php/iosfooter.php")?>