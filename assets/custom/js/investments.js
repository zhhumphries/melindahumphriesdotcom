$(document).ready(function() {
    $('#menu-item-investments').addClass('active');
    $(".fancybox").fancybox({

        padding: 0,

        openEffect : 'none',
        closeEffect : 'none',
        nextEffect : 'none',
        prevEffect : 'none',

        closeClick : true,

        helpers : {
            title : {
                type : 'inside'
            },
            overlay : {
                css : {
                    'background' : 'rgba(238,238,238,0.85)'
                }
            }
        }
    });
});

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

    producePrompt('Name is required', 'name-error' , '#C10101')
    return false;

  }

  if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {

    producePrompt('First and last name, please.','name-error', '#C10101');
    return false;

  }
  producePrompt(' ','name-error','green');
  return true;

}

function validatePhone() {

  var phone = document.getElementById('contact-phone').value;

    if(phone.length == 0) {
      return true;  // phone number is not required.
      producePrompt(' ','phone-error','green');
    }

    if(phone.length != 10) {
      producePrompt('Include area code.', 'phone-error', '#C10101');
      return false;
    }

    if(!phone.match(/^[0-9]{10}$/)) {
      producePrompt('Only digits, please.' ,'phone-error', '#C10101');
      return false;
    }
    producePrompt(' ','phone-error','green');
    return true;

}

function validateEmail () {

  var email = document.getElementById('contact-email').value;

  if(email.length == 0) {

    producePrompt('Email Invalid','email-error', '#C10101');
    return false;

  }

  if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {

    producePrompt('Email Invalid', 'email-error', '#C10101');
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
    producePrompt(left + ' more characters required','message-error','#C10101');
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
    producePrompt('Please fix errors to submit.', 'submit-error', '#C10101');
    setTimeout(function(){jsHide('submit-error');}, 2000);
      return false;
  }
  else {
    clearContactForm();
    successMail();
    return false;
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
    //data-dismiss="modal" aria-hidden="true"
    $('#')
}

function clearContactForm()
{
    $('#contactForm')[0].reset();
    producePrompt(' ','name-error','green');
    producePrompt(' ','phone-error','green');
    producePrompt(' ','email-error','green');
    producePrompt(' ','message-error','green');
}