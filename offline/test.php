<?php
$currentFile = $_SERVER["SCRIPT_NAME"];
$parts = Explode('/', $currentFile);
$as=$_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"];
$bs= str_replace($as,'',$_SERVER["SCRIPT_NAME"]);
$cs= $_SERVER['SERVER_NAME'].$bs;
$ds= str_replace($parts[2],'',$cs);

function get_url_contents($url){
        $crl = curl_init();
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
}

function getinitjs($id)
{
global $ds;
$url=$ds.'/export/id.init.js.php?id='.$id;
return get_url_contents($url);
}

function getquizlists($arrayofIDs)
{
	foreach ($arrayofIDs as $id)
	{
	
	$data.= '<li><a href="doquiz.html?id='.$id.'">'.$name.'</a></li>';
	}
	
}
?>