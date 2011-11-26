<?php
ob_start("ob_gzhandler");
//echo $_GET['phpjs'];
//echo $_GET['js'];
include("../php/jsmin.php"); 
define('FILE_TYPE', 'text/javascript'); 
define('CACHE_LENGTH', 31356000); //one year
header('Expires: '.gmdate('D, d M Y H:i:s', time() + CACHE_LENGTH).' GMT'); // 1 year from now
header('Content-Type: '.FILE_TYPE);
$js=html_entity_decode($_GET['js'],ENT_QUOTES);
$phpjs3=html_entity_decode($_GET['phpjs'],ENT_QUOTES);
if (!($_GET['username']==''))
{
$phpjs2='&username='.html_entity_decode($_GET['username'],ENT_QUOTES);
$phpjs=$phpjs3.$phpjs2;
//echo $phpjs;
}
else {$phpjs=$phpjs3;}
$sphpjs=search2($phpjs);
if (is_array($sphpjs))
{
$jfkdl=array_unique(($sphpjs));
$phpjsfiles=remvars($jfkdl);
foreach(getvars($jfkdl) as $jsphpelement)
{
	$ak=array_keys($jsphpelement);
	if (is_array($jsphpelement[0]["id"]))
	{
	$as=$jsphpelement[0]["id"][0];
	$df=$jsphpelement[1]["username"][0];
	if ($jsphpelement[1]["username"][0]=='')
	{
		$df=$jsphpelement[0]["username"][0];
	}
	}
	if (is_array($jsphpelement[0]["owlthought"]))
	{
		$e=$jsphpelement[0]["owlthought"][0];
		$f='';
	}
	if (is_array($jsphpelement[0]["pigthought"]))
	{
		$e='';
		$f=$jsphpelement[0]["pigthought"][0];
	}
}
$itsgonnagetstronger=true;
if ($e=='' and $f=='')
{
	$itsgonnagetstronger=false;
	$wegottagetfaster=true;
}
}

if ($wegottagetfaster)
{
	itsgonnagetLOUDER($phpjsfiles,$as,$df,$e,$f);	
}

combine(search($js)); 

if ($itsgonnagetstronger)
{
	itsgonnagetLOUDER($phpjsfiles,$as,$df,$e,$f);
	
}
?>
 
<?php 
function itsgonnagetLOUDER($a,$c,$d,$e,$f)
{
	$id=$c;
	$username=$d;
	$owlthought=$e;
	$pigthought=$f;
	//CHHHHHHANGES
	// WE'RE MAKING FOR THE BETERRR
	// WE'RE GOING THROUGH TOGETHERRRRRRR
	// THERE'S NOWHERE YOU CAN HIIIIIIDE
	// It's gonna' get louder.
	// We're gonna' get stronger.
	// We're gonna' feel better.
	// You can't change this energy inside
	// </singing>
foreach ($a as $b)
{
	include($b);
}

} 
?>
<?php 
function remvars($a)
{
	$x=0;
	foreach ($a as $b)
	{	
		$js[$x]=substr($b,0,strpos($b,'?'));
		$x++;
	}
	return $js;
}
?> 
 
<?php 
function getvars ($a)
{
//var_dump($a);
$i=0;
$l=0;
$f=0;
$v=array();
	while ($f<count($a))
	{
	$i=0;
	$l=0;
	$b=$a[$f];
	$Pos[$i] = strpos($b, "?")+1;
	$Pos[$i+1]= strpos($b, "=", $Pos[$i]);
	$j=$Pos[$i+1]-$Pos[$i];
	if (is_int(strpos($b,"&",$Pos[$i+1])))
	{
		$Pos[$i+2]=strpos($b,"&",$Pos[$i+1]);
		$Pos[$i+3]=strpos($b,"=",$Pos[$i+2]);
		$var3=substr($b,$Pos[$i+3]+1,strlen($b)-$Pos[$i+3]);
		$var2=substr($b,$Pos[$i+1]+1,$Pos[$i+2]-$Pos[$i+1]-1);
		$k[$l][substr($b,$Pos[$i],$j)][0]=$var2;
		$k[$l+1][substr($b,$Pos[$i+2]+1,($Pos[$i+3]-$Pos[$i+2])-1)][0]=$var3;
	}
	else 
	{
	 	$k[$l][substr($b,$Pos[$i],$j)][0]=substr($b,$Pos[$i+1]+1,strlen($b)-$Pos[$i+1]);
	}
	$v[$f]=$k;
	$f++;
	}
return $v;
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
function search2($haystack)
{
$i=1;
$numberedString=$haystack;

while ($i<substr_count($haystack,"<script")*2)
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
echo $combinedjs;
}
?>