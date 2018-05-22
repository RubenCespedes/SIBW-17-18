<?php
	session_start();

	$titulo = "";
	$autor = "";
	$datacion = "";
	$descripcion = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		# code...
		$titulo = test_input($_POST["titulo"]);
		$autor = test_input($_POST["autor"]);
		$datacion = test_input($_POST["datacion"]);
		$descripcion = test_input($_POST["descripcion"]);

		include '../BD.php';

		$modelo = new Model();
		$modelo->conectar();

		echo $titulo . " " . $autor . " " . $datacion . " " . $descripcion;

		$modelo->introducirObra($titulo, $autor, $datacion, $descripcion);

		$modelo->desconectar();

		$_SESSION['aniadirObra'] = "";

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