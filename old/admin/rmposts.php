<?php
//open connection
$con = mysql_connect("localhost", "joshbalfour", "beaky1"); 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 
$br = '</br>';
  
  
//Select Database
mysql_select_db("balfour", $con);  



//Drop Table
$sqlpostsdrop="DROP TABLE POSTS";
$sqlpagesdrop="DROP TABLE PAGES";



// Create table
$sqlpages="CREATE TABLE PAGES(
         title text,
         file text         
       )" ;

$sqlposts="CREATE TABLE POSTS(
         title text,
         content text,
         page text
         
       )" ; 


if (!mysql_query($sqlpostsdrop,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Removed old posts successfully :)",$br;

if (!mysql_query($sqlpagesdrop,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Removed old pages successfully :),$br";

if (!mysql_query($sqlposts,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Created new posts table database successfully",$br;


if (!mysql_query($sqlpages,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Created new pages table database successfully";
echo "<a href='addpost.html'><p>Enter new data</p></a>";



//close connection
mysql_close($con);

?>



