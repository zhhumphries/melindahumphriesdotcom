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
	<h3 id="about-me-title"><strong><em>I believe...</em></strong></h3>
	<p class="about-me-p">Love exists all around us in many different forms. Love is the passion you have for the world around you, the service you provide for those in need, and why you do the things that truly matter. I have a passion to understand love, completely. Love can make you laugh uncontrollably, or it can cause tears to trickle swiftly down your cheeks. Love makes us human.</p>
	<p class="about-me-p">Since I was young, I have always been fascinated by people and their stories, the pure joy of new life, or the heartbreak of a loved one lost. The rawness of human emotion inspires me to document this four letter word that can change our world in every way. Whether it be the love that two people share, or the love that a parent has for their child, it is my passion to record memories. These moments we have together can be long, but they also may be short. Love, documented and held onto, can be used to teach and inspire future generations.</p>
	<h1 id="about-me-quote">&#8220;My mission is to connect generations together through my photography.&#8221;</h1>
	<p class="about-me-p">Now imagine the future, as you look over at your grandchildren sitting on the floor. They flip through the crisp pages of your photographs, placing themselves in your younger years. They see memories of the past, a time they never knew. Through these images, they see your memories, your personality, and your passions. They see what life looked like for you, and in that moment they are instantly connected with you.</p>
    <p class="about-me-p">I believe there is a need for raw, high-quality, beautiful photographs of important, treasured moments in your life. This is a belief that I apply to my own life, as every day, I see my two baby boys growing and changing. I want to remember these times when they are young. I want to hold onto the feeling I have for them at this moment. I want to look back at the times my husband and I were young newlyweds and tell the next generations about how we have been in love the entire time. I truly believe in this idea. I believe in lasting impressions. I believe that the relationships you have now will affect the future to come. I have a passion to story tell. My mission is to connect generations together through my photography.</p>
</div>



<br><br>
<?php
	include ('footer.php');
?>