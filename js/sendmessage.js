    $("#sendmessage").submit(function() {
      if ($("#messg").val() != "") {
          $.post("../push/sendmessage.php", { user: $("#slct").val(), message: $("#messg").val() });
          
        $("#fbk").text("Message Sent").show().fadeOut(1000);
      	        
        return false;
      }
      $("#fbk").text("Please input a message to be sent").show().fadeOut(1000);
      return false;
    });