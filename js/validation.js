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