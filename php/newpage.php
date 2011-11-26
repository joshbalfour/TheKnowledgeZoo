<?php
//DB entry
                	    $con = mysql_connect("localhost", "joshbalfour", "beaky1");                	
                		$username=$_COOKIE['user'];
                	    $page= $_GET["page"];
                		
                		
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
							}
						if (!mysql_query($sql2,$con))
							{
							die('Error: ' . mysql_error());
							}
						if (!mysql_query($sql3,$con))
							{
							die('Error: ' . mysql_error());
							}	
							
							
							
							
							echo '
						
<p>success</p>
<meta HTTP-EQUIV="REFRESH" content="0; url=edit.php?page='.$page.'">						
						';
							
?>