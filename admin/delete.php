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

	$neworder = $_GET['delete'];
	echo $neworder;
	$fileids = explode(",", $neworder);
	$numoffiles = count($fileids);

	// first lets rename all files to temporary names
	for ($index = 0; $index < $numoffiles; $index++)
	{
		unlink($directory . $fileids[$index].".jpg");
		if ($_GET['origin'] != 'home') {
			unlink($directory . $fileids[$index]."_s.jpg");
		}
	}
?>