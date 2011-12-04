<?php 
//this script compresses a given css file by removing all unnecessary whitespace, comments, and return characters.

/* initialize ob_gzhandler to send and compress data */
//ob_start ("ob_gzhandler");
/* initialize compress function for whitespace removal */
//ob_start("compress");
/* required header info and character set */
header("Content-type: text/css;charset: UTF-8");
/* cache control to process */
header("Cache-Control: must-revalidate");
/* duration of cached content (1 hour) */
$offset = 60 * 60 ; 
/* expiration header format */
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s",time() + $offset) . " GMT";
/* send cache expiration header to broswer */
header($ExpStr);
/* Begin function compress */
function compress($buffer) {
/* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
/* remove tabs, spaces, new lines, etc. */        
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
/* remove unnecessary spaces */        
    $buffer = str_replace('{ ', '{', $buffer);
    $buffer = str_replace(' }', '}', $buffer);
    $buffer = str_replace('; ', ';', $buffer);
    $buffer = str_replace(', ', ',', $buffer);
    $buffer = str_replace(' {', '{', $buffer);
    $buffer = str_replace('} ', '}', $buffer);
    $buffer = str_replace(': ', ':', $buffer);
    $buffer = str_replace(' ,', ',', $buffer);
    $buffer = str_replace(' ;', ';', $buffer);
    
return $buffer;
}
if (!($_GET['file']=='quiz' or $_GET['file']=='quiz.css'))
{
echo compress((file_get_contents($_GET['file'].'.css')));
}
else
{
echo (file_get_contents($_GET['file'].'.css'));
}
?>