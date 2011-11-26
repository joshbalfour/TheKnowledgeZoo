<?php
// set the cookiez expiration date to one hour ago
setcookie("pupilusername", "", time()-3600);
setcookie("pupilpassword", "", time()-3600);
?><!DOCTYPE HTML>
<html>
<head>
<?php include ("../php/iosmeta.php")?>
<link rel="stylesheet" href="../css/iphone.css" type="text/css" media="screen" />
</head>
<body>
<div id="header"></div>
<h2>goodbye!</h2>
<h3>please come back again soon!</h3>
<meta http-equiv="refresh" content="3;url=index.php">
</body>
</html>