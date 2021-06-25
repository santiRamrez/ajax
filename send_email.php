<?php
	//Check for GET variable
		/*	
			if(isset($_GET['name'])) {
				echo 'GET: Your name is ' . $_GET['name'];
			}
		*/
	//Check for POST variable
	//$data = $_POST['data'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	//It converts a string into an array.
	//$str_arr = explode ("&", $data);

	/*$name = $str_arr[0];
	$email = $str_arr[1];
	$message = $str_arr[2];*/

//$emailConfirmation = $str_arr[1];

	//echo "$data \n";
	echo "$name \n$email \n$message";

	
	/*if(isset($name) && isset($email) && isset($message)) {
	
			// Passed
			$toEmail = 'contacto@tecnolatam.cl';
			$subject1 = 'Mensaje Tecnolatam Portfolio - Contact Form';
			$body = "<h4>Nombre: <span>$name</span></h4>
							 <h4>Email: <span>$email</span></h4>
							 <h4>Mensaje:</h4><p>$message</p>
					";
			
			// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject1, $body, $headers)){
					// Email Sent
					echo "Mensaje enviado correctamente!";
				} else {
					// Failed
					echo "Sending message has failed";
				}
				
	}*/
	
	
?>