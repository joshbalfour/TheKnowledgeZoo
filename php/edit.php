<?php //old, botched attempt, disregard. ?>
<?php require("php/db.php"); ?>
<?php $page=$_GET["page"];?>
<?php $username=$_COOKIE['user'];?>	
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Drag and Drop Website Creator</title>
<link rel="stylesheet" type="text/css" 
media="screen" href="css/boxes.css">
<script type="text/javascript" src="js/ajax_link.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js"></script>
<script type="text/javascript" src="js/editinplace.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.1.custom.min.js"></script>
<script>
     jQuery.noConflict();
</script>
<script type="text/javascript" src="js/edit.php?page=<?php echo $page; ?>"></script>
<script type="text/javascript" src="js/jquerysort.js"></script>
</head>
<body>
<a align="right" href="logout.php" style="color: black;">logout</a>
<a align="right" href="quiz/admin.php" style="color: black;">Homework Manager</a>

<div id="nav">
<?php include("php/editnav.php");?>
</div>
	
 <div id="contentWrap">
	<div id="contentLeft">
<!-- title begin -->
				<h1><?php include("php/title.php")?></h1>
<!-- title end -->

<!-- subtitle begin -->				
				<h2><?php include("php/subtitle.php")?></h2>						
<!-- subtitle end -->

<!-- content begin -->
		
		<ul class="sortable" id="new">
		
				<?php
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='' AND page='$page' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				?><li id="recordsArray_<?php echo $row['recordID']; ?>"><span id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span></li>
				<?php } ?>
						
		</ul>
		<br/>
	
	<!-- content end -->
	
	<!-- footer begin -->
	<?php include("php/footer.php")?>
	<!-- footer end -->
</div>

<div id="sidebar" align="right">	
<div id="newpage">
<p>Create new Page</p>
<form action="newpage.php" method="get">
Page Name:<input type="text" name="page" />
<input type="submit" value="Submit" />
</form>
</div>	
<br/>

<div id="templatechooser">
Template chooser:
<form action="templatechooser.php" method="GET">
<select name="template">
  <option>surreal</option>
  <option>yellowing</option>
  <option>green and black</option>
</select>
<input type="submit" value="Submit" />
</form>
</div>
</div>
<br/>
<a align="right" href="#" style="color: black;"><div id="ajaxlink" onclick="loadurl('php/new.php?page=<?php echo $page?>')">New Content Item</div></a>
</div>
</body>
</html>