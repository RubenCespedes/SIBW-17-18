<?php
	session_start();

	$name = "";
	$email = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		# code...
		$name = test_input($_POST["usrnm"]);
		$email = test_input($_POST["email"]);

		include '../BD.php';

		$modelo = new Model();
		$modelo->conectar();

		$id = $modelo->obtenerIdentificadorUsuario($_SESSION['usuario']);

		$modelo->actualizarDatosPersonales($id, $name, $email);

		$modelo->desconectar();

		$_SESSION['usuario'] = $name;
		$_SESSION['correo'] = $email;
		$_SESSION['change'] = "";

		header("Location: " . $_POST['uri']);
   		exit;
	}

	function test_input($data) {
		$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	
	  	return $data;
	}
?>