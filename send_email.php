<?php

	//Check for POST variable adn decode JSON data from HTML frontend retrive to this php file using AJAX
	$data = "";

	if(isset($_POST['data'])) {
		$data = json_decode($_POST['data'], false);
	}

	//Object notation in PHP
	$name = $data->name;
	$email = $data->email;
	$message = $data->message;

	$emailUser = $data->email;

		if(isset($name) && isset($email) && isset($message)) {
	
			// Data To Send to me
			$toEmail = 'contacto@tecnolatam.cl';
			$subject1 = 'Mensaje Tecnolatam Portfolio - Contact Form';
			$body = "<h4>Nombre: <span>$name</span></h4>
							 <h4>Email: <span>$email</span></h4>
							 <h4>Mensaje:</h4><p>$message</p>
					";
			
			// Email Headers
				$headers = "MIME-Version: 1.0\r\n";
				/*The charset=ISO-8859-1 makes CSS available using like this: 
				<h1 style="font-size: 16px; color: #fff;">My Title</h1>
				*/
				$headers .="Content-Type:text/html; charset=ISO-8859-1\r\n";
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject1, $body, $headers)){
					// Email Sent
					echo "Mensaje enviado correctamente!\n";
				} else {
					// Failed
					echo "Sending message has failed";
				}

			// Confirmation message to the user
			$emailUser;
			$subjectUser = 'Mensaje Enviado Tecnolatam - Contact Form';
			$bodyUser = "<h4>Gracias por contactarme! / Thanks for contact me!</h4>

							 <p>I'll check it out your message later</p>
							 <p>Revisar&eacute; tu mensaje m&aacute;s tarde</p>

							 <p>Saludos cordiales / Kind Regards</p>
							 <p style=\"font-style: bold; font-size: 16px;\">Santiago Ram&iacute;rez</p>
							 <p>contacto@tecnolatam.cl</p>
							 <p>+56 9 6259 9662</p><br>
							 <p style=\"font-style: italic; font-size: 14px;\">Favor no responder al correo de or&iacute;gen!</p>
							 <p style=\"font-style: italic; font-size: 14px;\">Please do not reply to this email!</p>
					";
			
			// Email to USER Headers
				$headersToUsers = "MIME-Version: 1.0\r\n";
				/*The charset=ISO-8859-1 makes CSS available using like this: 
				<h1 style="font-size: 16px; color: #fff;">My Title</h1>
				*/
				$headersToUsers .="Content-Type:text/html; charset=ISO-8859-1\r\n";
				$headersToUsers .= "From: Tecnolatam" ."<contacto@tecnolatam.cl>". "\r\n";
				
			
				if(mail($emailUser, $subjectUser, $bodyUser, $headersToUsers)){
					// Email Sent
					echo "Mensaje de confirmacion enviado correctamente!";
				} else {
					// Failed
					echo "Sending message has failed";
				}
		};
	
?>