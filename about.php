<?php
	include ('header.php');
?>

<!-- Add notification assets -->
<script type="text/javascript" src="assets/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/noty/demo/animate.css" media="screen"/>
<script type="text/javascript" src="assets/noty/js/noty/themes/gold.js"></script>

<link rel="stylesheet" type="text/css" href="assets/custom/css/about.css" media="screen"/>
<script type="text/javascript" src="assets/contactable/js/jquery.contactable.js"></script>
<!--<link rel="stylesheet" href="assets/contactable/css/demo.css" type="text/css" />-->

<div id="my-contact-div" class="hidden-xs"><!-- contactable html placeholder --></div>

<link rel="stylesheet" href="assets/contactable/css/contactable.css" type="text/css" />

<script>
	$(document).ready(function($){
		$('#menu-item-about').addClass('active');
	});

	jQuery(function(){
		jQuery('#my-contact-div').contactable(
        {
            subject: 'feedback URL:'+location.href,
            header: "Let's Chat!",
            url: 'mail.php',
            name: 'Your Name:',
   			namePlace: 'Your name',
            phone: 'Your Phone Number:',
            phonePlace: '(123) 456-7890',
            email: 'Your Email Address:',
            emailPlace: 'you@mail.com',
            dropdownTitle: 'Reason for Inquiry',
            dropdownOptions: ['Wedding', 'Engagement','Prices', 'Event', 'Fashion', 'Family', 'General', 'Lifestyle', 'Pictures', 'Photoshoot',  'Quote', 'Other'],
            dropdownPlace: 'Wedding',
            message : 'Your Message:',
            messagePlace: "What's on your mind??",
            submit : 'Send',
            subject : 'Inquiry Message from MelindaHumphries.com',
            recievedMsg : 'Thank you for your message',
            notRecievedMsg : 'Sorry but your message could not be sent, try again later',
            footer: '',
            hideOnSubmit: false
        });
	});
</script>

<div class="container">
	<p id="about-me-image-p" class="pull-left"><img id="about-me-image"src="images/melinda.jpg"></p>
	<h3 id="about-me-title"><strong><em>Classy + Fun</em></strong></h3>
	<p class="about-me-p">If we haven't met already, hello! I'm Melinda.</p>
	<p class="about-me-p">I'm a lifestyle and wedding photographer in the beautiful and sunny San Diego area. If you can't tell already, i'm sort of in love with all things blush pink and gold. If you are to, well... let's be best friends. If I could, I would probably go out buy a closet filled with only blush clothes. I know, unrealistic. But I can dream, right?</p>
	<p class="about-me-p">I'm a wifey of one amazing husband who believes and dreams with me. He's the ranch to my celery or the celery to my ranch...which ever sounds better. But really. He's my love story that came true. Married now for three years and couldn't be happier.</p>
	<h1 id="about-me-quote">&#8220;she believed she could, so she did&#8221;</h1>
	<p class="about-me-p">I'm a mommy of two baby boys who are only 16 months apart. If you were wondering... It wasn't planned that way. AND I was seriously nervous with my second that I wouldn't be able to handle taking care of a 18 month old and a newborn. BUT I'm doing it and I love it. Yay. Go me!</p>
	<p class="about-me-p">I'm a daughter of our loving God. I am accepted and loved no matter what. Which has given me a peace and joy that is so freeing. Because He loved me first, now I can love others the way He intended me to.</p>
	<p class="about-me-p">I'm a friend. So let's go get some coffee at a cute coffee shop and talk ALL about your photoshoot or wedding day!</p><br>
	<p class="about-me-p">I can't wait to meet you, gorgeous!</p>
</div>



<br><br>
<?php
	include ('footer.php');
?>