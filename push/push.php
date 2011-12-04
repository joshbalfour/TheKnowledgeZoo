<?php
//adapted heavily from apple's push notification docu: http://developer.apple.com/library/mac/#documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/ApplePushService/ApplePushService.html
//this script sends a push notification to a given device token with a given message.
function sendPush($deviceToken,$message){
// Put your device token here (without spaces):
if ($deviceToken==''){ $deviceToken = '2bd1e9360f4a8dc2cb41178ce93266a14bfeaf38e3954cbd9977d5b40ea67c6a';
};
// Put your private key's passphrase here:
$passphrase = 'josh1194';

// Put your alert message here:
if ($message==''){$message = 'You have a new homework!';};

//put your badge value here
$badge=1;
////////////////////////////////////////////////////////////////////////////////

$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', 'TKZkey.pem');
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client(
	'ssl://gateway.sandbox.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
{
$mesg=("Failed to connect: $err $errstr" . PHP_EOL);
};


// Create the payload body
$body['aps'] = array(
	'alert' => $message,
	'sound' => 'default'
	);
$body['aps']['badge'] = intval($badge);
// Encode the payload as JSON
$payload = json_encode($body);

// Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));


if (!$result)
{
	$success=false;
	$mesg = $mesg. 'Message not delivered' . PHP_EOL;
}
else
{
	$success=true;
}

// Close the connection to the server
fclose($fp);
$return=array($success,$mesg);
return($return);
}
?>