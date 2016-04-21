<?php
	include ('header.php');
?>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="assets/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen"/>

<script type="text/javascript">
	$(document).ready(function() {
		$('#menu-item-couples').addClass('active');
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
</script>
<div class="container fancybot-container">
	<div class="subpage-quote-div">
    	<h2 class="subpage-quote-text">When I met you...</h2>
    </div>
	<?php
		$dir = "images/couples/";
		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

		$files = iterator_to_array($iterator);

		// sort them by name
		uasort($files, create_function('$a,$b', 'return strnatcasecmp($a->getFilename(), $b->getFilename());'));

		$dom = new DomDocument("1.0");
		$dom->formatOutput = true;
		$row_div = $dom->createElement('div');
		$row_div = $dom->appendChild($row_div);
		$row_count = 0;
		foreach($files as $name => $item)
		{  
			if ((strcmp($item->getFilename(), ".") !== 0) && (strcmp($item->getFilename(), "..") !== 0))
			{
				$ext = substr($item->getFilename(), -6, 6);
				if ((strcmp($ext, "_s.jpg") !== 0))
				{
					$large = $item->getFilename();

					$len = strlen($large) - 4;

					$small = substr($large, 0, $len).'_s.jpg';

					$img_div = $dom->createElement('div');
					$href = $dom->createElement('a');
			    	$img = $dom->createElement('img');

			    	$img_div = $row_div->appendChild($img_div);
			    	$href = $img_div->appendChild($href);
			    	$img = $href->appendChild($img);

					
					if ($row_count === 2)
					{
						$row_count = 0;
						$row_div = $dom->createElement('div');
						$row_div = $dom->appendChild($row_div);
					}
					else
					{
						$row_count = $row_count + 1;
					}
			    	$img_div->setAttribute('class', 'col span_1_of_3');
			    	$href->setAttribute('class', 'fancybox');
			    	$href->setAttribute('rel', 'gallery');
			    	$href->setAttribute('href', $dir . $large);
			    	$img->setAttribute('src',$dir . $small);
			    }
		   	}
		}
		while ($row_count <= 2) {
			$img_div = $dom->createElement('div');
			$img_div = $row_div->appendChild($img_div);
			$img_div->setAttribute('class', 'col span_1_of_3');
			$row_count = $row_count + 1;
		}
		echo $dom->saveHtml();
	?>

    <div class="subpage-quote-div">
    	<h2 class="subpage-quote-text">... I just knew</h2>
    </div>
    
</div>

<?php
	include ('footer.php');
?>