(function ($) {
	"use strict";
	/* Validate form */
	zodonations_ajax();

	$(document).ajaxComplete(function(event, xhr, settings){
		zodonations_ajax();
	});

	function validateForm(form) {
		var	f, field, formvalid = true;
		// loop all fields
		for (f = 0; f < form.elements.length; f++) {
			// get field
			field = form.elements[f];
	 
			// ignore buttons, fieldsets, etc.
			if (field.nodeName !== "INPUT" && field.nodeName !== "TEXTAREA" && field.nodeName !== "SELECT") continue;
	 
			// is native browser validation available?
			if (typeof field.willValidate !== "undefined") {
	 
				// native validation available
				if (field.nodeName === "INPUT" && field.type !== field.getAttribute("type")) {
	 
					// input type not supported! Use legacy JavaScript validation
					field.setCustomValidity(LegacyValidation(field) ? "" : "error");
	 
				}
	 
				// native browser check
				field.checkValidity();
	 
			}
			else {
	 
				// native validation not available
				field.validity = field.validity || {};
	 
				// set to result of validation function
				field.validity.valid = LegacyValidation(field);
	 
				// if "invalid" events are required, trigger it here
	 
			}
	 
			if (field.validity.valid) {
	 
				// remove error styles and messages
				$(field).removeClass('invalid');
	 
			}
			else {
	 
				$(field).addClass('invalid');
				formvalid = false;
			}
	 
		}
		return formvalid;
	}
	 
	 
	// basic legacy validation checking
	function LegacyValidation(field) {
	 
		var
			valid = true,
			val = field.value,
			type = field.getAttribute("type"),
			chkbox = (type === "checkbox" || type === "radio"),
			required = field.getAttribute("required"),
			minlength = field.getAttribute("minlength"),
			maxlength = field.getAttribute("maxlength"),
			pattern = field.getAttribute("pattern");
	 
		// disabled fields should not be validated
		if (field.disabled) return valid;
	 
		// value required?
		valid = valid && (!required ||
			(chkbox && field.checked) ||
			(!chkbox && val !== "")
		);
	 
		// minlength or maxlength set?
		valid = valid && (chkbox || (
			(!minlength || val.length >= minlength) &&
			(!maxlength || val.length <= maxlength)
		));
	 
		// test pattern
		if (valid && pattern) {
			pattern = new RegExp(pattern);
			valid = pattern.test(val);
		}
	 
		return valid;
	}
	/* End validate */
	if($.fn.datetimepicker){ $('.zodate').datetimepicker(); }

	if(typeof(zodonations) != 'undefined' && typeof(zodonations.success) != 'undefined'){
		top.location.href = zodonations.honmeurl;
	}
	$('.amount_wrapper label').live('click', function () {
        $(this).closest('form').find('.amount_wrapper label.active').addClass('bordered_1');
        $(this).closest('form').find('.amount_wrapper label.active').removeClass('active');
        $(this).removeClass('bordered_1');
        $(this).addClass('active');
        $(this).closest('form').find('.amount_wrapper .custom-amount').removeClass('active').val("");
    });

    $('.amount_wrapper .custom-amount').live('change', function () {
        $(this).closest('form').find('.amount_wrapper label.active').addClass('bordered_1');
        $(this).closest('form').find('.amount_wrapper label.active').removeClass('active');
        $(this).addClass('active');
    });

    function zodonations_ajax() {
    	$('.button_donate').each(function() {
    		$(this).click(function () {
				var form_id = $(this).closest('.site_donation_popup_form').attr('id');
				var form = document.getElementById(form_id);
				form.noValidate = true;		 
				// set handler to validate the form
				// onsubmit used for easier cross-browser compatibility
				var invalid = validateForm(form);
				if(invalid == false) return false;
		        var $this = $(this);
		        var $wrap = $(this).closest('.site_donation_popup_form');
				var amount = $('input[name="donor[amount]"]:checked',$wrap).val();
				var custom_amount = $('input[name="donor[custom_amount]"]',$wrap).val();
				var first_name = $('input[name="donor[first_name]"]',$wrap).val();
				var last_name = $('input[name="donor[last_name]"]',$wrap).val();
				var email = $('input[name="donor[email]"]',$wrap).val();
				var phone = $('input[name="donor[phone]"]',$wrap).val();
				var address = $('textarea[name="donor[address]"]',$wrap).val();
				var notes = $('textarea[name="donor[notes]"]',$wrap).val();
				var sing_up = $('input[name="donor[sing_up]"]:checked',$wrap).val() | 0;

				var donation_id, donation_input, donation_select;
					donation_input = $('input[name="donor[donation_id]"]',$wrap).val();
					donation_select = $('select[name="donor[donation_id]"]',$wrap).val();

				if ( undefined != donation_input ) donation_id = donation_input;
				if ( undefined != donation_select ) donation_id = donation_select;

				var data = {'amount':amount,'custom_amount':custom_amount,'first_name':first_name,'last_name':last_name,'email':email,'phone':phone,'address':address,'notes':notes,'sing_up':sing_up,'donation_id':donation_id};
		        $($this).removeClass('error').attr('disabled', 'disabled');
		        $(form).find('.loading').css({'visibility': 'visible'});
		        jQuery.ajax({
					type: 'POST',
					url: zodonations.ajaxurl,
					data: {
						action: 'savepayment',
						data: data
					},
					success: function(data){
						data = jQuery.parseJSON(data);
						$($this).find('.loading').css({'visibility': 'hidden'});
						if(data.success){
							top.location.href = data.success;
						}else {
							for (var k in data['errors']) {
								$($this).find('input[name="donor[' + k + ']"]').addClass('error');
							}
						}
		            }
		        });
		        $($this).find('.error').live('hover', function () {
		            $(this).removeClass('error');
		        });
		        return false;
		    });
    	});
    }

	
})(jQuery);