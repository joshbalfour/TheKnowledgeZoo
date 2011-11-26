<?php ob_start("ob_gzhandler"); //gzip compression?>
<?php // include("../php/obfuscation.php")?>

<?php
// set the expiration date to one hour ago
setcookie("user", "", time()-3600);
setcookie("password", "", time()-3600);
$success=true;
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">