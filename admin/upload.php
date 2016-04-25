<?php include("/home/humphrz/secure_folder/password_protect.php"); ?>
<?php 

	$directory = './';

	if(isset($_POST['weddings'])) {
	    $directory = '../images/weddings/';
	} else if (isset($_POST['couples'])) {
	    $directory = '../images/couples/';
	} else if (isset($_POST['lifestyles'])) {
	    $directory = '../images/lifestyles/';
	} else if (isset($_POST['home'])) {
	    $directory = '../images/home/';
	}

	$message = 'error';

	$max_size = 2000000;

	if(count($_FILES['files']['name'])) {

		$index = 0;

		foreach ($_FILES['files']['name'] as $file) {
		    if ($_FILES['files']['size'][$index] <= $max_size && $_FILES['files']['size'][$index] > 0) {
				$new_name = $directory . time() . '-' . $file;
				$copied = copy($_FILES['files']['tmp_name'][$index], $new_name);
				usleep(50000);
				chmod($new_name, 0777);

				if ($copied) {
					$message = 'success';
					header('Location: ' . $_SERVER['HTTP_REFERER']);
				} else {
					$message = 'error';
					break;
				}
			} else {
				$message = 'max_size';
				break;
			}
			$index++;
		}
	}

?>
