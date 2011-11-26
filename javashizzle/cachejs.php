<?php 
include("../php/jsmin.php"); 

function combine($js)
{
	$combinedjs='';
	$i=0;
	while ($i<count($js))
	{	
		if (is_file($js[$i]))
		{
		$combinedjs .=JSMin::minify(file_get_contents($js[$i]));
		}
	  $i++;
	}
return $combinedjs;
}
?>
<?php
function search($haystack)
{
$i=1;
$numberedString=$haystack;

while ($i<16)
{
$Pos[$i] = strpos($numberedString, "src='../", $Pos[$i-1]+1);
$Pos[$i+1]= strpos($numberedString, "'></script>", $Pos[$i]);
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
	$script[$l]=str_replace("<script ","",str_replace("src='","",substr($numberedString,$Pos[$j],$len)));
	$j=$j+2;
	$l++;
}
return $script;

}
?>

<?php 
$js=html_entity_decode($_GET['js'],ENT_QUOTES);
$data=combine(search($js)); 
$ourFileName = "doquiz.js";
$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
fwrite($ourFileHandle, $data);
fclose($ourFileHandle);
?>