    $("#sendmessage2").submit(function() {
      if ($("#messg2").val() != "") {
          $.post("../push/sendtoall.php", { user: $("#slct").val(), message: $("#messg2").val() });
          
        $("#fbk2").text("Message Sent").show().fadeOut(1000);
      	        
        return false;
      }
      $("#fbk2").text("Please input a message to be sent").show().fadeOut(1000);
      return false;
    });