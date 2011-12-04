//uses the jQuery sort and POST to make the content's new position save
jQuery(document).ready(function(){ 
						   
	jQuery(function() {
		jQuery("#contentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = jQuery(this).sortable("serialize") + '&action=updateRecordsListings'; 
			jQuery.post("../../php/updateDB.php", order, function(theResponse){
				jQuery("#contentRight").html(theResponse);
			}); 															 
		}								  
		});
	});

});