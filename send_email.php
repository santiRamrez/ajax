<?php
  echo 'Procesing...';

	//Check for GET variable
	if(isset($_GET['name'])) {
		echo 'GET: Your name is ' . $_GET['name'];
	}

	//Check for POST variable
	if(isset($_POST['data'])) {
		echo 'POST: Your name is ' . $_POST['data'];
	}
?>