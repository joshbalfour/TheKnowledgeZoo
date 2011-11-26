<?php


$pass = $_POST['pass'];


///////////olivers/////////////////
$pepper = md5('71658ne48vdoccf8ooeh');
$salt = sha1('hx465uxjfzhx465uxjfz');
$fish = md5('f1shy');
$chips = md5('g3n3kh0pf3qkuvbosxf0');
$vinigar = sha1('le510x3n9w7dt1rzsm0t');
$gravy = md5('fr1ck1nN0rth3nerz');
//////////////////////////////////
$olivers = crypt($salt.$pepper.$fish.$chips.$vinigar.$gravy);

///////////full english/////////////
$sausage = md5('m1ltaodkctk14c5ne9zv');
$bacon = sha1('qho7tp4qrs74tvux1moo');
$egg = md5('egggggggggggggggggggggggggg132');
$tomato =  md5('r3333333333d');
$mushrooms = sha1('mushy');
///////////////////////////////////
$fullenglish = crypt($sausage.$bacon.$egg.$tomato.$mushrooms);

////////pudding///////////////////////
$pie = md5('pieeeeeeeeeeeeeee');
$custard = sha1('cu2s74rd');
$cake =md5('12a713');
//////////////////////////////////////
$fattay = crypt($pie.$custard.$cake);

////////drinks///////////////////////
$coke = md5('hehkennythingstheydonthavecaffine');
$drpepper = sha1('THEBESTAR0UND');
$sprite =md5('fizzaaay');
$shandy =sha1('LOLath41gg3tt1ngp1223d0nsh4ndy');
//////////////////////////////////////
$dr1nks = crypt($coke.$drpepper.$sprite.$shandy);


////////////1st pass/////////////////////
$meal = hash_hmac('ripemd160', $fattay , $fullenglish);
$chippy = hash_hmac('ripemd160', $olivers , $dr1nks);
$drinks = hash_hmac('ripemd160', $dr1nks , $fullenglish);
$brekky = hash_hmac('ripemd160', $fullenglish , $olivers);
/////////////////////////////////////////


////////////2nd pass/////////////////////
$iOS = hash_hmac('ripemd160', $meal , $chippy);
$firmware = hash_hmac('ripemd160', $drinks , $brekky);
$baseband = hash_hmac('ripemd160', $brekky , $meal);
$pwn = hash_hmac('ripemd160', $chippy , $drinks);
/////////////////////////////////////////


////////////3rd times a charm ;) //////////
$qwerty = hash_hmac('ripemd160', $iOS , $firmware);
$asdfdg = hash_hmac('ripemd160', $baseband , $pwn);
$zxcvbn = hash_hmac('ripemd160', $iOS , $pwn);
$ugh = hash_hmac('ripemd160', $baseband , $firmware);
/////////////////////////////////////////

////////////bringing it all together////////////////////
$core = sha1($qwerty.$asdfdg);
$UXlayer = md5($zxcvbn.$ugh);
///////////////////////////////////////////////////////
$pass1 = md5($pass.$core);
$pass2 = md5($pass2.$UXlayer);
$password = md5($pass1.$pass2);


?>
