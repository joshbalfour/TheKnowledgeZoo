<?php
//algorithm that inserts a new content box with sample content into the database for the user.

//DB entry
                	    $con = mysql_connect("localhost", "joshbalfour", "beaky1");                	
                		$username=$_GET['user'];
                    	$page= $_GET["page"];
                		
                		
                		//open connection
						 if (!$con)
						  {
						  die('Could not connect: ' . mysql_error());
						  } 						  
						//Select Database
						mysql_select_db("balfour", $con); 
						
                		
						$query  = "SELECT * FROM sites WHERE username='$username' AND page='$page' ORDER BY recordID DESC";
						$result = mysql_query($query);
						$row = mysql_fetch_array($result, MYSQL_ASSOC);
						$last=$row['recordID'];
						
						
						
						$pos=$last + 1;
						$sql="INSERT INTO sites (recordID,recordText,recordListingID,username,page) VALUES ('$pos','New box','$pos','$username', '$page')";
						//Insert data
						if (!mysql_query($sql,$con))
							{
							die('Error: ' . mysql_error());
							}
						echo '
						
<meta http-equiv="refresh" content="0; URL=../admin/editpage?id='.$page.'">						
						';
							
?>