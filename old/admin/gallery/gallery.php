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
$sql4="CREATE TABLE GALLERY(
         fullres text,
         tmb text,
         title text  
                  
       )" ;



//Drop Table
$sql3="DROP TABLE GALLERY";


//Insert data
$sql="INSERT INTO GALLERY (fullres, tmb, title) VALUES ('$_POST[fullres]','$_POST[tmb]','$_POST[title]')";




if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Successful :)";

//close connection
mysql_close($con);

?>



