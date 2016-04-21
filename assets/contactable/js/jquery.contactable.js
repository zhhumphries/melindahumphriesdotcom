/*
 * contactable 1.5 - jQuery Ajax contact form
 *
 * Copyright (c) 2009 Philip Beel (http://www.theodin.co.uk/)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Revision: $Id: jquery.contactable.min.js 2012-05-26 $
 *
 */

(function(jQuery){

	// Define the new for the plugin ans how to call it
	jQuery.fn.contactable = function(options) {
		// Set default options
		var defaults = {
			url: 'mail.php',
			header: '',
			name: 'Name',
			namePlace: 'Your name',
			email: 'Email',
			emailPlace: 'you@mail.com',
			phone: 'Phone',
			phonePlace: '(123) 456-7890',
			dropdownTitle: '',
			dropdownOptions: ['General', 'Website bug', 'Feature request'],
			dropdownPlace: 'General',
			message : 'Message',
			messagePlace: "What's on your mind??",
			subject : 'A contactable message',
			submit : 'SEND',
			recievedMsg : 'Thank you for your message',
			notRecievedMsg : 'Sorry but your message could not be sent, try again later',
			footer: 'Please feel free to get in touch, we value your feedback',
			hideOnSubmit: true
		};

		var options = jQuery.extend(defaults, options);

		return this.each(function() {

			// Create the form and inject it into the DOM
			var dropdown = ''
			,	filterEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
			,	filterPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/
			,	filterName = /^[A-Za-z]*\s{1}[A-Za-z]*$/
			,	dropdownLen = options.dropdownOptions.length
			,	i;

			// Add select option if applicable
			if(options.dropdownTitle) {
				dropdown += '<p><label for="contactable-dropdown">'+options.dropdownTitle+' </label><br /><input id="contactable-dropdown" class="contactable-dropdown" type="text" name="dropdown" list="categoryList" placeholder="'+options.dropdownPlace+'"><datalist id="categoryList">';

				for(i=0; i < dropdownLen; i++) {
					dropdown += '<option value="'+options.dropdownOptions[i]+'">'+options.dropdownOptions[i]+'</option>';
				}

				dropdown += '</datalist></p>';
			}
			// Form layout
			/*
			*	<div id="contactable-inner"></div>
			*	<form id="contactable-contactForm" method="" action="">
			*  		<div id="contactable-loading"></div>
			*		<div id="contactable-callback"></div>
			* 		<div class="contactable-holder">
			*			<p class="contactable-header">Header text</p>
			* 			<p>
			*				<label for="contactable-name">Name<span class="contactable-gold"> * </span></label><br />
			*				<input id="contactable-name" class="contactable-contact contactable-validate" name="name" placeholder="Your Name"/>
			*			</p>
			*			<p>
			*				<label for="contactable-phone">Phone</label><br />
			*				<input id="contactable-phone" class="contactable-contact contactable-validate-nonReq" name="phone" placeholder="(123) 456-7890"/>
			*			</p>
			*			<p>
			*				<label for="contactable-email"> Email address <span class="contactable-gold"> * </span></label><br />
			* 				<input id="contactable-email" class="contactable-contact contactable-validate" name="email" placeholder="you@mail.com"/>
			*			</p>
			* 			<p>
			*				<label for="contactable-message"> Message <span class="contactable-gold"> * </span></label><br />
			* 				<textarea id="contactable-message" name="message" class="contactable-message contactable-validate" rows="4" cols="30" placeholder="What's on your mind??"></textarea>
			*			</p>
			*			<p>
			*				<input class="contactable-submit" type="submit" value="Submit"/>
			*			</p>
			*			<p class="contactable-footer">Footer text</p>
			*		</div>
			*	</form>
			*/

			jQuery(this).html('<div id="contactable-inner"></div><form id="contactable-contactForm" method="" action=""><div id="contactable-loading"></div><div id="contactable-callback"></div><div class="contactable-holder"><h2 class="contactable-header">'+options.header+'</h2><br /><p><label for="contactable-name">'+options.name+'<span class="contactable-gold"> * </span><span class="error-message" id="name-error"></span></label><br /><input id="contactable-name" class="contactable-contact contactable-validate" name="name" placeholder="'+options.namePlace+'" onblur="validateName()"/></p><p><label for="contactable-phone">'+options.phone+'</label><span class="error-message" id="phone-error"></span><br /><input id="contactable-phone" class="contactable-contact contactable-validate-nonReq" name="phone" placeholder="'+options.phonePlace+'" onblur="validatePhone()"/></p><p><label for="contactable-email">'+options.email+' <span class="contactable-gold"> * </span></label><br /><input id="contactable-email" class="contactable-contact contactable-validate" name="email"  placeholder="'+options.emailPlace+'" onblur="validateEmail()"/></p>'+dropdown+'<p><label for="contactable-message">'+options.message+' <span class="contactable-gold"> * </span><span class="error-message" id="message-error"></span></label><br /><textarea id="contactable-message" name="message" class="contactable-message contactable-validate" style="resize: none;" rows="4" cols="30"  placeholder="'+options.messagePlace+'" onblur="validateMessage()"></textarea></p><p><input class="contactable-submit btn btn-default pull-right" type="submit" value="'+options.submit+'"/></p><p class="contactable-footer">'+options.footer+'</p></div></form>');

			// hide header or footer when empty
			if(options.header.length === 0) {
				jQuery(this).find(".contactable-header").hide();
			}
			if(options.footer.length === 0) {
				jQuery(this).find(".contactable-footer").hide();
			}

			// Toggle the form visibility
			jQuery.fn.toggleClick = function() {
				var functions = arguments, iteration = 0
				return this.click(function() {
					functions[iteration].apply(this, arguments)
					iteration = (iteration + 1) % functions.length
				})
			}

			jQuery('#contactable-inner').toggleClick(function() {
				jQuery('#contactable-overlay').css({display: 'block'});
				jQuery(this).animate({"marginLeft": "-=5px"}, "2000");
				jQuery('#contactable-contactForm').animate({"marginLeft": "-=0px"}, "2000");
				jQuery(this).animate({"marginLeft": "+=387px"}, "4000");
				jQuery('#contactable-contactForm').animate({"marginLeft": "+=390px"}, "4000");
			},
			function() {
				jQuery('#contactable-contactForm').animate({"marginLeft": "-=390px"}, "4000");
				jQuery(this).animate({"marginLeft": "-=387px"}, "4000").animate({"marginLeft": "+=5px"}, "2000");
				jQuery('#contactable-overlay').css({display: 'none'});
			});

			// Submit the form
			jQuery("#contactable-contactForm").submit(function() {

				// Validate the entries
				var valid = true
				,	params;

				//Remove any previous errors
				jQuery("#contactable-contactForm .contactable-validate").each(function() {
					jQuery(this).removeClass('contactable-invalid');
				});

				// Loop through non-required but validate fields
				jQuery("#contactable-contactForm .contactable-validate-nonReq").each(function() {
					if(jQuery(this).val().length > 0)
					{
						// Check phone is valid
						if (!filterPhone.test(jQuery("#contactable-contactForm #contactable-phone").val())) {
							jQuery("#contactable-contactForm #contactable-phone").addClass("contactable-invalid");
							valid = false;
						}
					}

				});

				// Loop through required field
				jQuery("#contactable-contactForm .contactable-validate").each(function() {

					// Check the min length
					if(jQuery(this).val().length < 2) {
						jQuery(this).addClass("contactable-invalid");
						valid = false;
					}

					// Check that message is minimum length
					if(jQuery("#contactable-contactForm #contactable-message").val().length < 30) {
						jQuery("#contactable-contactForm #contactable-message").addClass("contactable-invalid");
						valid = false;
					}

					// Check that name is both first and last
					if(!filterName.test(jQuery("#contactable-contactForm #contactable-name").val())) {
						jQuery("#contactable-contactForm #contactable-name").addClass("contactable-invalid");
						valid = false;
					}

					//Check email is valid
					if (!filterEmail.test(jQuery("#contactable-contactForm #contactable-email").val())) {
						jQuery("#contactable-contactForm #contactable-email").addClass("contactable-invalid");
						valid = false;
					}
				});

				if(valid === true) {
					submitForm();
				}
				return false;
			});

			function submitForm() {
				// Trigger form submission if form is valid
				jQuery.ajax({
					type: 'POST',
					url: options.url,
					data: {
						subject:options.subject,
						name:jQuery('#contactable-name').val(),
						phone:jQuery('#contactable-phone').val(),
						email:jQuery('#contactable-email').val(),
						issue:jQuery('#contactable-dropdown').val(),
						message:jQuery('#contactable-message').val()
					},
					success: function(data) {
												// Hide loading animation
						jQuery('#contactable-loading').css({display:'none'});

						// Check for a valid server side response
						if( data.response === 'success') {
							successMail();
							jQuery('#contactable-inner').click();
							clearContactForm();
						} else {
							failureMail();
						}
					},
					error:function(e){
						failureMail();
					}
				});
			}
		});
	};

})(jQuery);

function generateNotification(type, text) {

    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        layout      : 'bottomRight',
        closeWith   : ['click'],
        theme       : 'gold',
        maxVisible  : 10,
        timeout     : 5000,
        animation   : {
            open  : 'animated bounceInRight',
            close : 'animated bounceOutRight',
            easing: 'swing',
            speed : 500
        }
    });
    console.log('html: ' + n.options.id);
}

function successMail()
{
    var text = "Thank you for contacting me, I'll get back to you ASAP!";
    generateNotification('alert', text);
}

function validateName() {

  var name = document.getElementById('contactable-name').value;

  if(name.length == 0) {

    producePrompt('Please enter your first and last name.', 'name-error' , 'red')
    return false;

  }

  if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {

    producePrompt('Please provide both your first and last name.','name-error', 'red');
    return false;

  }
  producePrompt(' ','name-error','green');
  return true;

}

function validatePhone() {

    var phone = document.getElementById('contactable-phone').value;
    var formattedPhoneNumber = phone;
    var phoneRegex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if(phone.length == 0) {
    	producePrompt(' ','phone-error','green');
    	return true;
    }

    if (phoneRegex.test(phone)) {
        formattedPhoneNumber =
            phone.replace(phoneRegex, "($1) $2-$3");
    } else {
        producePrompt('Please enter a valid phone number.','phone-error', 'red');
        return false;
    }
    document.getElementById('contactable-phone').value = formattedPhoneNumber; //if we changed the phone format, then lets change it back
    producePrompt(' ','phone-error','green');
    return true;

}

function validateEmail () {

  var email = document.getElementById('contactable-email').value;

  if(email.length == 0) {

    producePrompt('Email Invalid','email-error', 'red');
    return false;

  }

  if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {

    producePrompt('Please enter a valid email: expected format is you@mail.com.', 'email-error', 'red');
    return false;

  }
  producePrompt(' ','email-error','green');
  return true;

}

function validateMessage() {
  var message = document.getElementById('contactable-message').value;
  var required = 30;
  var left = required - message.length;

  if (left > 0) {
    producePrompt('Please provide more detail about what information you are looking for.','message-error','red');
    return false;
  }

  producePrompt(' ','message-error','green');
  return true;

}

function clearContactForm()
{
    $('#contactable-contactForm')[0].reset();
    producePrompt(' ','name-error','green');
    producePrompt(' ','phone-error','green');
    producePrompt(' ','email-error','green');
    producePrompt(' ','message-error','green');

    //Remove any previous errors
	jQuery("#contactable-contactForm .contactable-validate").each(function() {
		jQuery(this).removeClass('contactable-invalid');
	});
	jQuery('#contactable-inner').click();
	return false;
}

function jsShow(id) {
  document.getElementById(id).style.display = 'block';
}

function jsHide(id) {
  document.getElementById(id).style.display = 'none';
}

function producePrompt(message, promptLocation, color) {

  document.getElementById(promptLocation).innerHTML = message;
  document.getElementById(promptLocation).style.color = color;

}