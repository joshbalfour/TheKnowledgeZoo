<?php
//open connection
$con = mysql_connect("localhost", "joshbalfour", "beaky1"); 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 

  
  
//Select Database
mysql_select_db("balfour", $con);  

// Create table
$sql2="CREATE TABLE SYSTEM(
         site_root text,
         company_name text,
         contact text
         
                  
       )" ;



//Drop Table
$sql3="DROP TABLE SYSTEM";


//Insert data
$sql="INSERT INTO SYSTEM (site_root, company_name, contact) VALUES ('$_POST[site_root]','$_POST[company_name]','$_POST[contact]')";




if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Successful :) 
<a href='http://www.beakybal4.co.uk/cmsonline/index.php'><p>view site</p></a> ";



//close connection
mysql_close($con);

?>



