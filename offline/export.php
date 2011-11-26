<?php
$currentFile = $_SERVER["SCRIPT_NAME"];
$parts = Explode('/', $currentFile);
$as=$_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"];
$bs= str_replace($as,'',$_SERVER["SCRIPT_NAME"]);
$cs= $_SERVER['SERVER_NAME'].$bs;
$ds= str_replace($parts[2],'',$cs);
//echo $ds;
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
$url='http://'.$ds.'export/id.init.js.php?id='.$id;
return get_url_contents($url);
}

function getquizlists($arrayofIDs)
{
	foreach ($arrayofIDs as $id)
	{	
	$data.= '<li><a href="doquiz.html?id='.$id.'">'.getQuizName($id).'</a></li>';
	}
	return base64_encode($data);
}

function getQuizName($id){
require("../php/db.php");
				$query  = "SELECT * FROM quiz WHERE id='$id'";
				$result = mysql_query($query,$conn);
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$name=$row['name'];
				}
		return $name;
}

function writeToFile($filename,$filecontents){
$myFile = "TKZOffline/".$filename;
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $filecontents);
fclose($fh);
}

/* http://davidwalsh.name/create-zip-php */
/* creates a compressed zip file */
function create_zip($files = array(),$destination = '',$overwrite = false) {
  //if the zip file already exists and overwrite is false, return false
  if(file_exists($destination) && !$overwrite) { return false; }
  //vars
  $valid_files = array();
  //if files were passed in...
  if(is_array($files)) {
    //cycle through each file
    foreach($files as $file) {
      //make sure the file exists
      if(file_exists($file)) {
        $valid_files[] = $file;
      }
    }
  }
  //if we have good files...
  if(count($valid_files)) {
    //create the archive
    $zip = new ZipArchive();
    if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
      return false;
    }
    //add the files
    foreach($valid_files as $file) {
      $zip->addFile($file,$file);
    }
    //debug
    //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
    
    //close the zip -- done!
    $zip->close();
    
    //check to make sure the file exists
    return file_exists($destination);
  }
  else
  {
    return false;
  }
}

$files_to_zip = array(
'TKZOffline/TKZOffline.app/Contents/PkgInfo',
'TKZOffline/TKZOffline.app/Contents/Info.plist',
'TKZOffline/TKZOffline.app/Contents/embedded.provisionprofile',
'TKZOffline/TKZOffline.app/Contents/_CodeSignature/CodeResources',
'TKZOffline/TKZOffline.app/Contents/CodeResources',
'TKZOffline/TKZOffline.app/Contents/MacOS/TKZOffline',
'TKZOffline/TKZOffline.app/Contents/Resources/English.lproj/InfoPlist.strings',
'TKZOffline/TKZOffline.app/Contents/Resources/English.lproj/MainMenu.nib',
'TKZOffline/TKZOffline.exe',
'TKZOffline/index.html',
'TKZOffline/index.html',
'TKZOffline/TiddlySaver.jar',
'TKZOffline/js/jquery.base64.min.js',
'TKZOffline/js/jquery.jquizzy.init.js',
'TKZOffline/js/jquery.jquizzy.js',
'TKZOffline/js/jquery.js',
'TKZOffline/js/jquery.moarmudkipz.js',
'TKZOffline/js/jquery.mudkipz.js',
'TKZOffline/js/jquery.twFile.js',
'TKZOffline/img/answer.png',
'TKZOffline/img/back.png',
'TKZOffline/img/confirm.png',
'TKZOffline/img/correct.png',
'TKZOffline/img/delete.png',
'TKZOffline/img/forward.png',
'TKZOffline/img/incorrect.png',
'TKZOffline/img/start.png',
'TKZOffline/css/index.css',
'TKZOffline/css/styles.css'
);
$files_to_zip[20]='TKZOffline/quizlist.ini';

// echo getinitjs('174df2dea6f481f42a781711791fea32');
$ids=$_POST;
writeToFile('quizlist.ini',getQuizlists($ids));
$x=21;
foreach ($ids as $id)
{	
	writeToFile($id.'.js',getinitjs($id));
	$files_to_zip[$x]='TKZOffline/'.$id.'.js';
	$x++;
}
//var_dump($files_to_zip);

$file = date("Ymdgi").'.zip'; 

$result = create_zip($files_to_zip,$file);

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}
unlink($file);
?>