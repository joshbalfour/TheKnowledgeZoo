<?php // takes the value of the $_GET['u'] variable and the textbox with the id  messg2 and posts them to sendtoall.php?>
<?php header('Content-Type: text/javascript');?>
    $("#sendmessage2").submit(function() {
      if ($("#messg2").val() != "") {
          $.post("../push/sendtoall.php", { user:'<?php echo $_GET['u']?>', message: $("#messg2").val() });
          
        $("#fbk2").text("Message Sent").show().fadeOut(1000);
      	        
        return false;
      }
      $("#fbk2").text("Please input a message to be sent").show().fadeOut(1000);
      return false;
    });