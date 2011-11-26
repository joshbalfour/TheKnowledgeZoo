<html>
<head>
<title>AJAX Edit In Place With Prototype</title>
<style>
html { height: 100%; margin-bottom: 1px;}
body {  height: 100%; margin: 0; padding: 0;font: 10px arial, sans-serif;line-height: 150%;text-align: center;color: #A1988B;background-color: #FFF;}
.blacklink:link, .blacklink:alink, .blacklink:vlink, .blacklink:hover{color:#000000}
a.redlink{color: #96001C; text-decoration: none}
a:hover.redlink{color: #96001C; text-decoration: underline}
.error{ color:#FF0000;}
.textfield {width: 150px; color: #000000; font-size: 12px; height: 20px; border: 1px solid #7F9DB9}
.eip_mouseover { background-color: #ff9; padding: 3px; }
.eip_savebutton { background-color: #36f; color: #fff; }
.eip_cancelbutton { background-color: #000; color: #fff; }
.eip_saving { background-color: #903; color: #fff; padding: 3px; }
.eip_empty { color: red; }
.red{color:#FF0000;}
</style>
<script language="javascript" src="../js/prototype.js"></script>
<script language="javascript" src="../js/editinplace.js"></script>
<script type="text/javascript">
Event.observe(window, 'load', init, false);
function init() {
	// Over ride some of the default options.
	EditInPlace.defaults['type'] = 'text';
	EditInPlace.defaults['save_url'] = '../php/edit_eip.php';

	// Basic example.
	EditInPlace.makeEditable({ id: '1' });
	EditInPlace.makeEditable({ id: '2' });
	EditInPlace.makeEditable({ id: '3' });
	EditInPlace.makeEditable({ id: '4' });

	// Double click and selected text example.
	EditInPlace.makeEditable({
		id: 'twoclicks',
		click: 'dblclick',
		select_text: true,
		ajax_data: {
			db_id: 12345,
			username: 'devnull'
		}
	});

	// Example that starts out as an empty string and will cancel
	// the form when clicked away from.
	EditInPlace.makeEditable({ id: 'emptytext', on_blur: 'cancel' });

	// Select / Option list example.
	

	// Textarea example.

}
</script>
</head>
<body>
<?php
require("../php/db.php");
			$username='randomperson';
			$query  = "SELECT * FROM sites WHERE username='$username' ORDER BY recordListingID ASC";
			$result = mysql_query($query);
			

			while($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
			?>
			<p>
					<span id="<?php echo $row['recordID']; ?>"><?php echo $row['recordText']; ?></span>
			</p>	
			<?php } ?>
						
						
            
<script language="javascript" type="text/javascript">
var obj = {
	  fx: function(e) {
		var elm = Event.element(e);
			$(elm.id).removeClassName('validation-failed');
	  }
	};
	var Validation = Class.create();
	Validation.prototype = {
		initialize : function(form, options){
			this.options = Object.extend({
				onSubmit : true,
				immediate : false
			}, options || {});
			this.form = $(form);

			if(this.options.immediate) {
				this.form.getInputs('text').each(function(input) {
					Event.observe(input, 'focus', obj.fx.bindAsEventListener(obj));
				})
				this.form.getInputs('password').each(function(input) {
					Event.observe(input, 'focus', obj.fx.bindAsEventListener(obj));
				});
			}
		}
	}
	var valid = new Validation(formname, {immediate : true});
</script>	
</body>
</html>