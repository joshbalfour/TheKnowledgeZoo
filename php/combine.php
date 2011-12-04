<?php
// a botched attempt at combining all javascript files.
 $hs="<script src='http://code.jquery.com/jquery-latest.js'></script>
	<script src='../js/jquery.jquizzy.js'></script>
	<script src='../js/jquery.jquizzy.init.js'></script>
	"; 
 $other=" 
 <script src='../js/jquery.jquizzy.submit.php?id=&username='></script>
 	<script src='../js/init.php?id=174df2dea6f481f42a781711791fea32'></script> 
 
 ";
$combi=combine(search($hs));
var_dump($combi);
 ?>
 
 
<?php
function search($haystack)
{
$i=1;
$numberedString=$haystack;

while ($i<8)
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
	$script[$l]=str_replace("src='..","computing",substr($numberedString,$Pos[$j],$len));
	$j=$j+2;
	$l++;
}
return $script;

}
?>

<?php   
function combine($aFiles)
{
   // Written by Ed Eliot (www.ejeliot.com) - provided as-is, use at your own risk
   
   /****************** start of config ******************/
   define('FILE_TYPE', 'text/javascript'); // type of code we're outputting
   define('CACHE_LENGTH', 31356000); // length of time to cache output file, default approx 1 year
   define('CREATE_ARCHIVE', true); // set to false to suppress writing of code archive, files will be merged on each request
   define('ARCHIVE_FOLDER', 'js/archive'); // location to store archive, don't add starting or trailing slashes
   
   
   
   /****************** end of config ********************/
   
   // this is prepended to all file / folder paths so files and archive folder should be specified relative to this
   $sDocRoot = $_SERVER['DOCUMENT_ROOT'];
   
   /*
      if etag parameter is present then the script is being called directly, otherwise we're including it in 
      another script with require or include. If calling directly we return code othewise we return the etag 
      representing the latest files
   */
   if (isset($_GET['version'])) {
      $iETag = (int)$_GET['version'];     
      $sLastModified = gmdate('D, d M Y H:i:s', $iETag).' GMT';
      
      // see if the user has an updated copy in browser cache
      if (
         (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $sLastModified) ||
         (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] == $iETag)
      ) {
         header("{$_SERVER['SERVER_PROTOCOL']} 304 Not Modified");
         exit;
      }
      
      // create a directory for storing current and archive versions
      if (CREATE_ARCHIVE && !is_dir("$sDocRoot/".ARCHIVE_FOLDER)) {
         mkdir("$sDocRoot/".ARCHIVE_FOLDER);
      }
      
      // get code from archive folder if it exists, otherwise grab latest files, merge and save in archive folder
      if (CREATE_ARCHIVE && file_exists("$sDocRoot/".ARCHIVE_FOLDER."/$iETag.cache")) {
         $sCode = file_get_contents("$sDocRoot/".ARCHIVE_FOLDER."/$iETag.cache");
      } else {
         // get and merge code
         $sCode = '';
         $aLastModifieds = array();
         foreach ($aFiles as $sFile) {
            $aLastModifieds[] = filemtime("$sDocRoot/$sFile");
            $sCode .= file_get_contents("$sDocRoot/$sFile");
         }
         // sort dates, newest first
         rsort($aLastModifieds);
         
         if (CREATE_ARCHIVE) {
            if ($iETag == $aLastModifieds[0]) { // check for valid etag, we don't want invalid requests to fill up archive folder
               $oFile = fopen("$sDocRoot/".ARCHIVE_FOLDER."/$iETag.cache", 'w');
               if (flock($oFile, LOCK_EX)) {
                  fwrite($oFile, $sCode);
                  flock($oFile, LOCK_UN);
               }
               fclose($oFile);
            } else {
               // archive file no longer exists or invalid etag specified
               header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
               exit;
            }
         }
      }
   
      // send HTTP headers to ensure aggressive caching
      header('Expires: '.gmdate('D, d M Y H:i:s', time() + CACHE_LENGTH).' GMT'); // 1 year from now
      header('Content-Type: '.FILE_TYPE);
      header('Content-Length: '.strlen($sCode));
      header("Last-Modified: $sLastModified");
      header("ETag: $iETag");
      header('Cache-Control: max-age='.CACHE_LENGTH);
   
      // output merged code
      echo $sCode;
   } else {
      // get file last modified dates
      $aLastModifieds = array();
      foreach ($aFiles as $sFile) {
         $aLastModifieds[] = filemtime("$sDocRoot/$sFile");
      }
      // sort dates, newest first
      rsort($aLastModifieds);
      
      // output latest timestamp
      echo $aLastModifieds[0];
   }
}
?>