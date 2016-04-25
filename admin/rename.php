<?php include("/home/humphrz/secure_folder/password_protect.php"); ?>
<?php

	$directory = './';

	if($_GET['origin'] == 'weddings') {
	    $directory = '../images/weddings/';
	} else if ($_GET['origin'] == 'couples') {
	    $directory = '../images/couples/';
	} else if ($_GET['origin'] == 'lifestyles') {
	    $directory = '../images/lifestyles/';
	} else if ($_GET['origin'] == 'home') {
	    $directory = '../images/home/';
	}

	$neworder = $_GET['order'];
	echo $neworder;
	$fileids = explode(",", $neworder);
	$numoffiles = count($fileids);

	clearstatcache();
	// first lets rename all files to temporary names
	for ($index = 0; $index < $numoffiles; $index++)
	{
		if (copy($directory.$fileids[$index].".jpg", $directory . "temp".$index) == TRUE)
		{
			echo "<p>Renamed " . $fileids[$index].".jpg to " . "temp".$index . " successfully</p><br />";
			unlink($directory.$fileids[$index].".jpg");
		} else {
			echo "<p>Failed to rename "  . $fileids[$index].".jpg</p><br />";
		}
		if ($_GET['origin'] != 'home') {
			if (copy($directory.$fileids[$index]."_s.jpg", $directory . "temp".$index."_s") == TRUE)
			{
				echo "<p>Renamed " . $fileids[$index]."_s.jpg to " . "temp".$index . "_s successfully</p><br />";
				unlink($directory.$fileids[$index]."_s.jpg");
			} else {
				echo "<p>Failed to rename "  . $fileids[$index]."_s.jpg</p><br />";
			}
		}
	} 

	clearstatcache();
	// rename to new naming convention
	for ($index = 0; $index < $numoffiles; $index++)
	{
		if (($index+1) < 10)
		{
			if (copy($directory . "temp".$index, $directory . "image-00".($index+1).".jpg") == TRUE)
			{
				echo "<p>Renamed temp".$index." to " . "image-00".($index+1).".jpg successfully</p><br />";
				unlink($directory . "temp".$index);
			} else
			{
				echo "<p>Failed to rename temp".$index."</p><br />";
			}
			if ($_GET['origin'] != 'home') {
				if (copy($directory . "temp".$index."_s", $directory . "image-00".($index+1)."_s.jpg") == TRUE)
				{
					echo "<p>Renamed temp".$index."_s to " . "image-00".($index+1)."_s.jpg successfully</p><br />";
					unlink($directory . "temp".$index."_s");
				} else
				{
					echo "<p>Failed to rename temp".$index."_s</p><br />";
				}
			}
		} else if (($index+1) >= 10 && ($index+1) < 100)
		{
			if (copy($directory . "temp".$index, $directory . "image-0".($index+1).".jpg") == TRUE)
			{
				echo "<p>Renamed temp".$index." to " . "image-0".($index+1).".jpg successfully</p><br />";
				unlink($directory . "temp".$index);
			} else {
				echo "<p>Failed to rename temp".$index."</p><br />";
			}
			if ($_GET['origin'] != 'home') {
				if (rename($directory . "temp".$index."_s", $directory . "image-0".($index+1)."_s.jpg") == TRUE)
				{
					echo "<p>Renamed temp".$index."_s to " . "image-0".($index+1)."_s.jpg successfully</p><br />";
					unlink($directory . "temp".$index."_s");
				} else {
					echo "<p>Failed to rename temp".$index."_s</p><br />";
				}
			}
		} else
		{
			if (rename($directory . "temp".$index, $directory . "image-".($index+1).".jpg") == TRUE)
			{
				echo "<p>Renamed temp".$index." to " . "image-".($index+1).".jpg successfully</p><br />";
				unlink($directory . "temp".$index);
			} else {
				echo "<p>Failed to rename temp".$index."</p><br />";
			}
			if ($_GET['origin'] != 'home') {
				if (rename($directory . "temp".$index."_s", $directory . "image-".($index+1)."_s.jpg") == TRUE)
				{
					echo "<p>Renamed temp".$index."_s to " . "image-".($index+1)."_s.jpg successfully</p><br />";
					unlink($directory . "temp".$index."_s");
				} else {
					echo "<p>Failed to rename temp".$index."_s</p><br />";
				}
			}
		}
	}
	clearstatcache();
?>