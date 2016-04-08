<?php
	include ('header.php');
?>

	<link rel="stylesheet" href="assets/owl/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/owl/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/custom/css/owl.css">
	<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
	<script src="assets/owl/js/owl.carousel.min.js"></script>
	<div class="owl-container">
		<div id="target" class="owl-carousel owl-theme owl-loaded">
			<img class="owl-item" src="images/image1.jpg" alt="" />
			<img class="owl-item" src="images/image2.jpg" alt="" />
			<img class="owl-item" src="images/image3.jpg" alt="" />
			<img class="owl-item" src="images/image4.jpg" alt="" />
			<img class="owl-item" src="images/image5.jpg" alt="" />
			<img class="owl-item" src="images/image6.jpg" alt="" />
		</div>
	</div>
	
	<script>
	$(document).ready(function($){
		$('#menu-item-home').addClass('active');
		var xPercent;
		var transitioning = false;
		var starttime;
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			loop:true,
			center:true,
			margin:10,
			items:2,
			dots:false,
			smartSpeed:5000,
			responsiveClass:true,
			responsive : {
				0 : {
					items : 1
				},
				768 : {
			        items : 2
			    }
			}
		});
		$( "#target" ).mousemove(function( event ) {
			var xCord = event.pageX;
			xPercent = xCord / $( document ).width() *100;
		});
		$(".owl-item").mouseenter(function() {
			if (transitioning == true) {
				var currtime = new Date().getTime();
				var diff = currtime - starttime;
				if (currtime >= starttime + 5750)
				{
					transitioning = false;
				}
			}
			if (transitioning == false) {
				if (xPercent >= 72) {
					transitioning = true;
					starttime = new Date().getTime();
					owl.trigger('next.owl.carousel');
				} else if (xPercent <= 28) {
					transitioning = true;
					starttime = new Date().getTime();
					owl.trigger('prev.owl.carousel');
				}
			}
		});
	});
	</script>
<?php
	include ('footer.php');
?>