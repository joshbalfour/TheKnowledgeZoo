<?php
//open connection
$con = mysql_connect("localhost", "joshbalfour", "beaky1"); 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 

  
  
//Select Database
mysql_select_db("balfour", $con);  



//Drop Table
$sql="DROP TABLE SYSTEM";


// Create table
$sql2="CREATE TABLE SYSTEM(
         site_root text,
         company_name text,
         contact text
         
                  
       )" ;


if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Removed old data successfully :)";

if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<a href='editsystem.html'><p>Enter new data</p></a>";



//close connection
mysql_close($con);

?>



