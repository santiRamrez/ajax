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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="description"
        content="Firma de Contadores Auditores en Santiago, Chile. Especialistas en contabilidad, auditorías, impuestos y remuneraciones. Más de 20 años de experiencia.">
    <meta name="description"
        content="Yraida Mejias, Contador auditor, auditorías, impuestos, remuneraciones, consultoría IFRS, flujos de caja, asesoría personalizada, formulario 29, previred, sii">
    <meta name="keywords"
        content="Contador auditor, auditorías, impuestos, remuneraciones, consultoría IFRS, flujos de caja, asesoría personalizada, formulario 29, previred, sii">
    <link
      rel="preload"
      as="font"
      href="Comfortaa/Comfortaa-VariableFont_wght.ttf"
      type="font/ttf"
      crossorigin="anonymous"
    />
    <link
      rel="preload"
      as="font"
      href="Poppins/Poppins-Regular.ttf"
      type="font/ttf"
      crossorigin="anonymous"
    />
    <link href="CSS/form.css?version=1.1" rel="stylesheet" type="text/css" media="screen">
    <link href="CSS/styles.css?version=1.4" rel="stylesheet" type="text/css" media="screen">
 
    <!-- LOGO  -->
    <link rel="icon" type="image/svg" href="Images/favicon.ico" />

    <title>Mejías | Contacto</title>

</head>

<body>
  <header>
      <div class="heading" id="heading">
        <div class="logo">
          <img src="Images/carpetas.svg" alt="Mejías & Asociados" />
          <a href="https://mejiasasociados.cl/">Mejías & Asociados</a>
        </div>
        <div class="mobile-nav" id="mobile-nav">
          <img
            src="Images/icons/close.svg"
            alt="x"
            id="clossing-menu"
            class="close-menu"
            style="width: 20px"
          />

          <div class="hidden-menu" id="hiddenMenu">
            <a href="https://mejiasasociados.cl/">Servicios</a>
            <a
              href="https://www.linkedin.com/in/yraida-mejías-acevedo-439670116"
              >Acerca de Nosotros</a
            >
            <a href="https://mejiasasociados.cl/formulario.php?v=0.001"
              >Contacto</a
            >
          </div>
        </div>
        <nav class="menu-links" id="menu-links">
          <img src="Images/icons/menu.svg" alt="Menu" id="menu-button" />
          <a class="mainMenu" href="https://mejiasasociados.cl/">Servicios</a>
          <a
            class="mainMenu"
            href="https://www.linkedin.com/in/yraida-mejías-acevedo-439670116"
            >Acerca de Nosotros</a
          >
          <a
            class="mainMenu"
            href="https://mejiasasociados.cl/formulario.php?v=0.001"
            >Contacto</a
          >
        </nav>
      </div>
    </header>
  
  <div class="container">

    <div class="title-form">
      <h1>¿Cómo podemos ayudarte?</h1>
      <p>Envíanos tu consulta y nos contactaremos contigo a la brevedad!</p>
    </div>
    <!-- Message to indicate if the message was sent correctly -->
    <?php if($msg != ''): ?>
    		<div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>

   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <label for="name">Nombre y Apellido</label>  
      <input type="text" id="name" name="name" placeholder="Nombre y Apellido" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
    <label for="phone">Teléfono</label>  
      <input type="text" id="phone" name="phone" placeholder="+56 9 8765 4321" value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>">
    <label for="email">Email</label> 
      <input type="text" id="email" name="email" placeholder="tucorreo@mail.com" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
    <label for="subject">Asunto</label> 
      <input type="text" id="subject" name="subject" placeholder="Asunto del Mensaje" value="<?php echo isset($_POST['subject']) ? $subject : ''; ?>">
      <textarea id="message" name="message" placeholder="¿Cómo podemos ayudarlo(a)?" value="<?php echo isset($_POST['message']) ? $message : ''; ?>"></textarea>
      <button class="submit" id="submit" name="submit" type="submit">Enviar Mensaje!</button>

    </form>
  </div>


    <footer id="footer" class="footer">
      <div class="phone grid">
        <img
          src="Images/icons/telephone2.svg"
          alt="phone"
          style="width: 40px; margin-right: 10px"
        />
        <p>+56 9 7286 2851</p>
      </div>

      <div class="email grid">
        <img
          src="Images/icons/letter3.svg"
          alt="mail"
          style="width: 40px; margin-right: 10px"
        />
        <p>ymejias@mejiasasociados.cl</p>
      </div>
      <p class="rights">&copy; Todos los derechos reservados.</p>
    </footer>

  <script src="Scripts/scripts.js?v=0.002"></script>
</body>


</html>