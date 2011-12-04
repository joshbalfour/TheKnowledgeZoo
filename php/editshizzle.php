<?php //the javascript and css which is relavent to the pages where the user edits content on their website. ?>
<link rel="stylesheet" type="text/css" 
media="screen" href="../css/boxes.css">
<script type="text/javascript" src="../js/ajax_link.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js"></script>
<script type="text/javascript" src="../js/editinplace.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.7.1.custom.min.js"></script>
<script>
     jQuery.noConflict();
</script>
<script type="text/javascript" src="../js/edit.php?page=<?php echo $id; ?>&user=<?php echo $username;?>"></script>
<script type="text/javascript" src="../js/jquerysort2.php?username=<?php echo $username ?>"></script>
