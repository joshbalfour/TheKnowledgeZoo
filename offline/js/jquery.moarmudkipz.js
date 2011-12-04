//this script uses the GET variables to import the required quiz based on the GET variable's ID
//it then saves each score into the userdata.ini file, coded into base64 for import later.
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
 var filepathz = document.location.href; // Get the current file
 var filepathz2 = filepathz.substring(0, filepathz.indexOf("doquiz.html?id="+$._GET['id']));
 var filepathz3 = filepathz2 + 'userdata.ini';
 filepathz4 = $.twFile.convertUriToLocalPath(filepathz3); // Convert the path to a readable format
 var textz2 = $.twFile.load(filepathz4);
 var textz3 = $.base64.decode(textz2);
 var textz4 = textz3.substring(0, textz3.indexOf("~"));
 function selectedAnswer(selAns,qn)
 {
 var questionNumber=qn.substr(0,qn.indexOf('/'));
 var answerGiven=selAns;
 var id=$._GET['id'];
 var username= textz4;
 var filepath7 = filepathz2 + 'useranswers.ini';
 filepath8 = $.twFile.convertUriToLocalPath(filepath7);
 var answer=id+'|'+username+'|'+questionNumber+'|'+answerGiven;
 var anAnswer=$.base64.encode(answer);
 var anAnswerNewLine = anAnswer+'~';
 var existingAnswers = $.twFile.load(filepath8);
 if (existingAnswers != null)
 	{
 var newFile = existingAnswers + anAnswerNewLine;
 	};
 	else 
 		{
 		var newFile = anAnswerNewLine;
 		}
 $.twFile.save(filepath8,newFile);
 };