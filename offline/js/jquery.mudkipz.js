//This script loads the list of quizzes after the user has entered a username and password
		// Run on document load
		jQuery(function() {
			$('#loginButton').click(function() {
				var filepath = document.location.href; // Get the current file
				var filepath2 = filepath.substring(0, filepath.indexOf("index.html"));
				var filepath3 = filepath2 + 'quizlist.ini';
				var filepath7 = filepath2 + 'userdata.ini';
				filepath4 = $.twFile.convertUriToLocalPath(filepath3); // Convert the path to a readable format
				filepath8 = $.twFile.convertUriToLocalPath(filepath7);
				var text = $.twFile.load(filepath4); // Load the file
				// If the file loads succesfully create an editing element
				if(text){
					var username=$("#username").val();
					var password=$("#password").val();
					var details=username+'~'+password;
					var userDetails=$.base64.encode(details);
					$.twFile.save(filepath8,userDetails);
					var textz = $.base64.decode(text);
					var textarea = $("<ul></ul>").css({}).html(textz);
					$("#quizzes").append(textarea);
					// Fade in
					textarea.animate({ opacity: 1 });
					
				} else {
					// Show an error message on fail
					$("#error").fadeIn();
				}
		})
	});