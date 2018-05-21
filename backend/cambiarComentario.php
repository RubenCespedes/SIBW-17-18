<?php
	session_start();

	$autor = "";
	$fecha = "";
	$hora = "";
	$texto = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		# code...
		$autor = test_input($_POST["autor"]);
		$fecha = test_input($_POST["fecha"]);
		$hora = test_input($_POST["hora"]);
		$texto = test_input($_POST["text"]);

		include '../BD.php';

		$modelo = new Model();
		$modelo->conectar();

		echo $_POST["id"] . " " . $autor . " " . $fecha . " " . $hora . " " . $texto;

		$modelo->actualizarComentario($_POST["id"], $autor, $fecha, $hora, $texto);

		$modelo->desconectar();

		$_SESSION['changeComment'] = "";

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