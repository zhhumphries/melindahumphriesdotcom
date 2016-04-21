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

  var name = document.getElementById('contact-name').value;

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

    var phone = document.getElementById('contact-phone').value;
    var formattedPhoneNumber = phone;
    var phoneRegex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if (phoneRegex.test(phone)) {
        formattedPhoneNumber =
            phone.replace(phoneRegex, "($1) $2-$3");
    } else {
        producePrompt('Please enter a valid phone number: expected format is (###) ###-####','phone-error', 'red');
        return false;
    }
    document.getElementById('contact-phone').value = formattedPhoneNumber; //if we changed the phone format, then lets change it back
    producePrompt(' ','phone-error','green');
    return true;

}

function validateEmail () {

  var email = document.getElementById('contact-email').value;

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
  var message = document.getElementById('contact-message').value;
  var required = 30;
  var left = required - message.length;

  if (left > 0) {
    producePrompt('Please provide more detail about what information you are looking for.','message-error','red');
    return false;
  }

  producePrompt(' ','message-error','green');
  return true;

}

function validateForm() {
  var validName = validateName();
  var validPhone = validatePhone();
  var validEmail = validateEmail();
  var validMessage = validateMessage();

  if (!validName || !validPhone || !validEmail || !validMessage) {
    jsShow('submit-error');
    producePrompt('Please review and fix any errors above.', 'submit-error', 'red');
    setTimeout(function(){jsHide('submit-error');}, 2000);
      return false;
  }
  else {
    jQuery.ajax({
      type: 'POST',
      url: 'mail.php',
      data: {
        subject:'Inquiry Message from MelindaHumphries.com',
        name:jQuery('#contact-name').val(),
        phone:jQuery('#contact-phone').val(),
        email:jQuery('#contact-email').val(),
        issue:jQuery('#contact-category').val(),
        message:jQuery('#contact-message').val()
      },
      success: function(data) {
        // Check for a valid server side response
        if( data.response === 'success') {
          successMail();
          closeContactForm();
          clearContactForm();
        } else {
          failureMail();
        }
      },
      error:function(e){
        failureMail();
      }
    });
    return false;   // This will keep the form submit from occuring.
  }
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

function closeContactForm()
{
    $('#myModal').modal('hide');
}

function clearContactForm()
{
    $('#contactForm')[0].reset();
    producePrompt(' ','name-error','green');
    producePrompt(' ','phone-error','green');
    producePrompt(' ','email-error','green');
    producePrompt(' ','message-error','green');
}