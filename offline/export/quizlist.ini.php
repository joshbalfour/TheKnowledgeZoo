<?php
$array=unserialize($_POST['bleh']);

foreach ($array as $item){
$id=$item[0];
$name=$item[1];
$data.= '<li><a href="doquiz.html?id='.$id.'">'.$name.'</a></li>';
}

//<li><a href="doquiz.html?id=ohai">quiz name</a></li>

echo base64_encode($data);
?>