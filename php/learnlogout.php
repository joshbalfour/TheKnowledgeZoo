<?php
// set the expiration date to one hour ago
setcookie("pupilusername", "", time()-3600);
setcookie("pupilpassword", "", time()-3600);
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=learn.php?logout=true">

