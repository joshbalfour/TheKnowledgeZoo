<?php
ob_start("ob_gzhandler");
define('FILE_TYPE', 'text/css'); 
define('CACHE_LENGTH', 31356000); //one year
header('Expires: '.gmdate('D, d M Y H:i:s', time() + CACHE_LENGTH).' GMT'); // 1 year from now
header('Content-Type: '.FILE_TYPE);
$css=html_entity_decode($_GET['css'],ENT_QUOTES);
combine(array_unique(search($css))); 
?>


<?php


function search($haystack)
{
$i=1;
$numberedString=$haystack;

while ($i<6)
{
$Pos[$i] = strpos($numberedString, 'href="../', $Pos[$i-1]+1);
$Pos[$i+1]= strpos($numberedString, '"', $Pos[$i]+9);
$i=$i+2;
}
$l=0;
$j=1;
while ($l<(count($Pos)/2))
{
	$l1=$Pos[$j];
	$k=$j+1;
	$l2=$Pos[$k];
	$len=$l2-$l1;
	$css[$l]=str_replace('"','',str_replace('href=',"",substr($numberedString,$l1,$len)));
	$j=$j+2;
	$l++;
}
return $css;

}
?>

<?php 
function combine($css)
{
	$combinedcss='';
	$i=0;
	while ($i<count($css))
	{	
		if (is_file($css[$i]))
		{
			if (!($css[$i]=='../css/quiz.css'))
			{
		    $combinedcss .=compress(file_get_contents($css[$i]));
			}
			else
			{
			$combinedcss .=file_get_contents($css[$i]);
			}
		}
	  $i++;
	}
echo $combinedcss;
}
?>
<?php 
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
?>