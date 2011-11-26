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
$sql4="CREATE TABLE STYLE(
         bar_colour text,
         logo_path text,
         adwords text,
         name text
                  
       )" ;



//Drop Table
$sql3="DROP TABLE STYLE";


//Insert data
$sql="INSERT INTO STYLE (bar_colour, logo_path, adwords, name) VALUES ('$_POST[colour]','$_POST[path]','$_POST[adwords]','$_POST[name]')";




if (!mysql_query($sql3,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Successful :)";

if (!mysql_query($sql4,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Successful :)";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Successful :) 
<a href='http://www.beakybal4.co.uk/cmsonline/index.php'><p>view site</p></a> ";



//close connection
mysql_close($con);

?>



