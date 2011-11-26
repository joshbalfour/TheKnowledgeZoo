
 if (jQuery) (function($){
	// Import GET Vars
	$._GET = [];
	var urlHalves = String(document.location).split('?');
	if(urlHalves[1]){
	var urlVars = urlHalves[1].split('&');
	for(var i=0; i<=(urlVars.length); i++){
	if(urlVars[i]){
	var urlVarPair = urlVars[i].split('=');
	$._GET[urlVarPair[0]] = urlVarPair[1];
	}
	}
	}

 var scriptName = $._GET['id'] + '.js';

 	var filepath = document.location.href; // Get the current file
	var filepath2 = filepath.substring(0, filepath.indexOf("doquiz.html?id="+$._GET['id']));
	var filepath3 = filepath2 + scriptName;
	
			filepath4 = $.twFile.convertUriToLocalPath(filepath3); // Convert the path to a readable format
			var text = $.twFile.load(filepath4); // Load the file
			// If the file loads succesfully create an editing element
			if(text){
				
				var textarea = $("<script>").css({}).html(text);
				$("nom").append(textarea);
			} else {
				// Show an error message on fail
			}
	})(jQuery);
 
 