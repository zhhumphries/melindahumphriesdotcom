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
			<?php
				$dir = "images/";
				$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

				$dom = new DomDocument("1.0");
				$dom->formatOutput = true;
				foreach($iterator as $name => $item)
				{  
					if ((strcmp($item->getFilename(), ".") !== 0) && (strcmp($item->getFilename(), "..") !== 0))
					{
				    	$img = $dom->createElement('img');

				    	$img = $dom->appendChild($img);
				    	$img->setAttribute('src',$dir . $item->getFilename());
				    	$img->setAttribute('class', 'owl-item item');
				   	}
				}
				echo $dom->saveHtml();
			?>
		</div>
	</div>
	<div class="container">
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