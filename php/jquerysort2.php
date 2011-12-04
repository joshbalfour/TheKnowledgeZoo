<?php // static javascript, which allows the user to drag boxes which contain content to order them, converted into dynamic javascript by inserting a php variable into the javascript, 
      // this means that the jquery will post the new position to a php file and also send the user's username along with it. ?>
jQuery(document).ready(function(){ 
						   
	jQuery(function() {
		jQuery("#contentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = jQuery(this).sortable("serialize") + '&action=updateRecordsListings'; 
			jQuery.post("../php/updateDB.php?username=<?echo $_GET['username']?>", order, function(theResponse){
				jQuery("#contentRight").html(theResponse);
			}); 															 
		}								  
		});
	});

});