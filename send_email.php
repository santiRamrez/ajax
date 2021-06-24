<?php
  echo "Procesing... \n";

	//Check for GET variable
		/*	
			if(isset($_GET['name'])) {
				echo 'GET: Your name is ' . $_GET['name'];
			}
		*/

	//Check for POST variable
	$data = $_POST['data'];

	$str_arr = explode (",", $data);

	$name = $str_arr[0];
	$email = $str_arr[1];
	$message = $str_arr[2];

	print "$name \n $email \n $message";
	
?>