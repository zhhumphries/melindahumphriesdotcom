<?php include("/home/humphrz/secure_folder/password_protect.php"); ?>
<html>
	<head>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-filestyle.min.js"> </script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/gallery.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/gallery.css">
	</head>
	<body>
		<div id="site-wrapper">
			<div role='navigation' id="navbar">
				<a href='index.php' class='btn btn-primary btn-lg stButton'>Home</a>
				<a href='weddings.php' class='btn btn-primary btn-lg stButton'>Weddings</a>
				<a href='couples.php' class='btn btn-primary btn-lg stButton'>Couples</a>
				<a href='lifestyles.php' class='btn btn-primary btn-lg stButton active'>Lifestyles</a>
			</div>
			<div id="origin" class="rearangediv fbox">
				<h1>Rearange images here</h1>
				<ul class="list" id="sortable">
					<?php
						$dir = "../images/lifestyles/";
						$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
						$files = iterator_to_array($iterator);
						// sort them by name
						uasort($files, create_function('$a,$b', 'return strnatcasecmp($a->getFilename(), $b->getFilename());'));

						$dom = new DomDocument("1.0");
						$dom->formatOutput = true;

						foreach($files as $name => $item)
						{
							if ((strcmp($item->getFilename(), ".") !== 0) && (strcmp($item->getFilename(), "..") !== 0)
								&& (pathinfo($item->getFilename(), PATHINFO_EXTENSION) == "jpg"))
							{
								$filename=pathinfo($item->getFilename(),PATHINFO_FILENAME);
								if (substr_compare ( $filename , '_s' , -2 , 2) == 0)	// look for the _s on the image filename
								{
									$image_id = substr($filename, 0, -2);
									$image = $item->getFilename();
									$img_li = $dom->createElement('li');
									$img = $dom->createElement('img');
									$img_li = $dom->appendChild($img_li);
									$img = $img_li->appendChild($img);
									$img_li->setAttribute('id', $image_id);
									$img->setAttribute('src',$dir . $image);
									$img->setAttribute('class', 'draggable');
								}
							}
						}
						echo $dom->saveHtml();
					?>
				</ul>
			</div>

			<div id="drop" class="deletediv fbox">
				<h1>Drag here to Delete</h1>
				<ul id="sortable2" class="list">

				</ul>
			</div>
		</div>

		<div id="scrolling-div">
		    <button class="btn btn-primary btn-lg stButton" onclick="saveOrder()" id="saveButton" origin="lifestyles">Save</button>
			<a class="btn btn-primary btn-lg stButton" href="#loadModal" data-toggle="modal" role="button">Load</a>
			<button class="btn btn-primary btn-lg stButton" onclick="deleteImages()" id="deleteButton" origin="lifestyles">Delete</button>
		</div>

		<div id="loadModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form role="form" action="upload.php" enctype="multipart/form-data" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<h2 id="myModalLabel">Upload File(s)</h2>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<input type="file" name="files[]" id="files" class="filestyle" data-size="lg" multiple="multiple" accept="image/jpeg"/>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer" style="border-top:none;">
							<div class="form-group">
								<button onclick="clearUploadForm()" class="btn btn-lg" data-dismiss="modal" aria-hidden="true">Cancel</button>
							
								<button type="submit" class="btn btn-primary btn-lg" name="lifestyles">Upload</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>