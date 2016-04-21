<?php
	$to = 'melindahumphries82@gmail.com';
	// Assign contact info
	$name = stripcslashes($_POST['name']);
	$phone = stripcslashes($_POST['phone']);
	$emailAddr = stripcslashes($_POST['email']);
	$issue = stripcslashes($_POST['issue']);
	$comment = stripcslashes($_POST['message']);
	$subject = stripcslashes($_POST['subject']);

	// Set headers
	$headers   = "From: " . $emailAddr . "\r\n";
	$headers  .= "Reply-To: " . $emailAddr . "\r\n";
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers  .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Format message
	$contactMessage =
	"<html><body>
	<div style='min-width:800px;max-width:100%;width:auto;'>
		<table rules='all' style='border-color: #e5e5e5;' cellpadding='10'>
		<tr style='background: #eee;'>
			<td><strong>Name:</strong></td>
			<td>$name</td>
		</tr>
		<tr>
			<td><strong>Phone:</strong></td>
			<td>$phone</td>
		</tr>
		<tr>
			<td><strong>Email:</strong></td>
			<td>$emailAddr</td>
		</tr>
		<tr>
			<td><strong>Category:</strong></td>
			<td>$issue</td>
		</tr>
		<tr>
			<td><strong>Sent From:</strong></td>
			<td>$_SERVER[HTTP_HOST]</td>
		</tr>
		<tr>
			<td><strong>Sending IP:</strong></td>
			<td>$_SERVER[REMOTE_ADDR]</td>
		</tr>
		<tr>
			<td colspan='2' style='text-align:center;background: #eee;'><strong>Message:</strong></td>
		</tr>
		<tr>
			<td colspan='2' style='text-align:justify;'>$comment</td>
		</tr>
		</table>
	</div>
	</body></html>";

	// Send and check the message status
	$response = (mail($to, $subject, $contactMessage, $headers) ) ? "success" : "failure" ;
	$output = json_encode(array("response" => $response));

	header('content-type: application/json; charset=utf-8');
	echo($output);

?>