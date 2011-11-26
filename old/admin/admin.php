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
$sqlpages="CREATE TABLE PAGES(
         title text
                  
       )" ;

$sqlposts="CREATE TABLE POSTS(
         title text,
         content text,
         page text
         
       )" ; 

//Drop Table
$sqlpostsdrop="DROP TABLE POSTS";
$sqlpagesdrop="DROP TABLE PAGES";


//clean content
$post = Str_replace("'" , "", $_POST[content] );



//clean name
$postpagename2 = Str_replace("'" , "", $_POST[page] );
$postpagename3 = Str_replace("?" , "", $postpagename2 );
$postpagename = Str_replace(" " , "", $postpagename3 );


//Insert data
$sql="INSERT INTO POSTS (title, content, page) VALUES ('$_POST[title]','$post','$postpagename')";


//////////duplicate check////////////////////
 $data = mysql_query("SELECT * FROM PAGES WHERE title='$_POST[page]'") 
 or die(mysql_error());
 $num_rows = mysql_num_rows($data);
 if ($num_rows) {
 	$nodup ="false";
   echo "Page already exists, posting to already created page....";
   echo "</br>";
}
////////////////////////////////////////////




//////////page limit check/////////////////// 
 $data = mysql_query("SELECT * FROM PAGES") 
 or die(mysql_error());
 $num_rows = mysql_num_rows($data);
 if ($num_rows > 4) {
   echo "Page creation limit reached, please post content to another page.";
   echo "</br>";
}
else $nolim="true" ;
////////////////////////////////////////////


/////////create new page///////////////////
if ($nolim="true" and $nodup="true");
{
$file = 'page.php';
$newfile = "../".$postpagename.".php";

if (!copy($file, $newfile)) {
    echo "failed to create $newfile...\n"; }
else echo "New page created"; echo"</br>";
}
////////////////////////////////////////////


///////////////execute//////////////////////
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


if ($nodup="true" and $nolim="true") ;
{
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  } 

else 
echo "Posted Successfully :)";}
///////////////////////////////////////////




//close connection
mysql_close($con);

?>



