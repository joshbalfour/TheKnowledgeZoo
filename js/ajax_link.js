// taken from http://chriscook.me/web-development/phpajax-execute-php-function-by-clicking-a-link/
function loadurl(dest) {

	try {
// Moz supports XMLHttpRequest. IE uses ActiveX.
// browser detction is bad. object detection works for any browser
xmlhttp = window.XMLHttpRequest?new XMLHttpRequest(): new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {
// browser doesn't support ajax. handle however you want
}
// the xmlhttp object triggers an event everytime the status changes
// triggered() function handles the events
xmlhttp.onreadystatechange = triggered;
// open takes in the HTTP method and url.
xmlhttp.open("GET", dest);
// send the request. if this is a POST request we would have
// sent post variables: send("name=aleem gender=male)
// Moz is fine with just send(); but
// IE expects a value here, hence we do send(null);
xmlhttp.send("null");

}
function triggered() {
{
document.getElementById("new").innerHTML += xmlhttp.responseText;
}
}