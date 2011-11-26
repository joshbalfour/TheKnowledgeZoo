<?php
ob_start("ob_gzhandler");
define('FILE_TYPE', 'text/javascript'); 
define('CACHE_LENGTH', 31356000); //one year
header('Expires: '.gmdate('D, d M Y H:i:s', time() + CACHE_LENGTH).' GMT'); // 1 year from now
header('Content-Type: '.FILE_TYPE);
include("../php/jsmin.php"); 
echo JSMin::minify((file_get_contents($_GET['file'].'.js')));
?>