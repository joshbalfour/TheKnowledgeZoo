<?php //redirects the user to the logout.php page.  ?>
<?php ob_start("ob_gzhandler"); //gzip compression ?>
<?php // include("../php/obfuscation.php")?>

<meta HTTP-EQUIV="REFRESH" content="0; url=../logout.php">