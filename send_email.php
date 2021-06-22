<?php
  // Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message) && !empty($phone) && !empty($subject)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Por favor use un email válido';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'ymejias@mejiasasociados.cl';
				$subject1 = 'Cliente Sitio Web '.$name;
				$body = '<h2>Datos Cliente</h2>
          <h4>Nombre</h4><p>'.$name.'</p>
          <h4>Teléfono</h4><p>'.$phone.'</p>
          <h4>Email</h4><p>'.$email.'</p>
          <h4>Asunto</h4><p>'.$subject.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject1, $body, $headers)){
					// Email Sent
					$msg = 'Tu mensaje ha sido enviado correctamente';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Error, tu mensaje no fue enviado';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Por favor llene todos los campos';
			$msgClass = 'alert-danger';
		}
	}
?>