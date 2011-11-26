<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
//open connection
$con = mysql_connect("localhost", "joshbalfour", "beaky1"); 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 
  
// select table
mysql_select_db("balfour", $con);


// Collects data from "posts" table 
 $data = mysql_query("SELECT * FROM STYLE") 
 or die(mysql_error()); 

//creates array from $data and displays each entry
 while($info = mysql_fetch_array( $data )) 
 { 
 
 Print "<title>" .$info['name']. "</title>";
 } 

//close connection
mysql_close($con);

?>


<link href="css/css.css" rel="stylesheet" type="text/css">



</head>

<body>
<div class="container">
  <div class="header" >
    
    <?php
//open connection
$con = mysql_connect("localhost", "joshbalfour", "beaky1"); 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 
  
// select table
mysql_select_db("balfour", $con);


// Collects data from "posts" table 
 $data = mysql_query("SELECT * FROM STYLE") 
 or die(mysql_error()); 

//creates array from $data and displays each entry
 while($info = mysql_fetch_array( $data )) 
 { 
 Print "<h2><img name='img' src='".$info['logo_path']; 
 Print " ' width='526' height='61' alt='logo'>";
 Print $info['name'] . "</h2>";
 } 

//close connection
mysql_close($con);

?>
</div>


 
  <div class="menuHorizontalDiv">
    <ul id="nav">
      <?php
//open connection
$con = mysql_connect("localhost", "joshbalfour", "beaky1"); 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 
  
// select table
mysql_select_db("balfour", $con);


// Collects data from "PAGES" table 
 $data = mysql_query("SELECT * FROM PAGES") 
 or die(mysql_error()); 
 
echo "<li><a href='index.php'>Home</a></li>";
//creates array from $data and displays each entry
($info = mysql_fetch_array( $data ));
 
while($info = mysql_fetch_array( $data ))
{
if ($info['title'] != 'index'){
if ($info['title'] != 'home') {
 echo "<li><a href='".$info['file'] .".php'> ".$info['title'] . "</a></li>"; 
}}}
//close connection
mysql_close($con);

?>
    </ul>
    <div class="clear"></div>
  </div>
  
  <div class="threeCol">
    <div class="rightCol">
      <div class="centerCol">
        <div class="leftCol">
          <div class="leftSidebarContent">
            <p>Sidebar Content</p>
            </div>
<div class="mainContent">
            
            <br>

<?php
//Define Page Name
$dirname = dirname($_SERVER['SCRIPT_NAME']) ;
$strr = Str_replace(".php" , "" ,$_SERVER['SCRIPT_NAME'] );
$page = Str_replace("$dirname2" , "" ,$strr);
$dirname2 = $dirname.'/';
//open connection
$con = mysql_connect("localhost", "joshbalfour", "beaky1"); 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 
 
// select table
mysql_select_db("balfour", $con);

// Collects data from "posts" table 
 $data = mysql_query("SELECT * FROM POSTS WHERE PAGE LIKE '$page' ") 
 or die(mysql_error()); 


//creates array from $data and displays each entry
 while($info = mysql_fetch_array( $data )) 
 { 
 Print "<h2>".$info['title'] . "</h2> "; 
 Print "<p> ".$info['content'] . " </p>";
 Print "<br>";

 } 

//close connection
mysql_close($con);
?>


</div>
          <div class="rightSidebarContent"> 
<?php
//open connection
$con = mysql_connect("localhost", "joshbalfour", "beaky1"); 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 
  
// select table
mysql_select_db("balfour", $con);


// Collects data from "posts" table 
 $data = mysql_query("SELECT * FROM STYLE") 
 or die(mysql_error()); 

//creates array from $data and displays each entry
 while($info = mysql_fetch_array( $data )) 
 { 

 Print $info['adwords'];
 } 

//close connection
mysql_close($con);

?>

            
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="trifold">
    <div class="clear"></div>
  </div>
  <div class="footer">
<?php
//open connection
$con = mysql_connect("localhost", "joshbalfour", "beaky1"); 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 
  
// select table
mysql_select_db("balfour", $con);


// Collects data from "posts" table 
 $data = mysql_query("SELECT * FROM SYSTEM") 
 or die(mysql_error()); 

//creates array from $data and displays each entry
 $info = mysql_fetch_array( $data ); 
 { 

 Print "<p> © 2011 ";
 Print $info['company_name'];
 Print "  ";
 Print $info['contact']."</p>";
 } 

//close connection
mysql_close($con);

?>
    
    
    
    <div class="clear"></div>
  </div>
</div>
<p class="credit">Backend by Josh: <a href="http://www.twitter.com/bbal4">Twitter</a></p>
</body>
</html>

