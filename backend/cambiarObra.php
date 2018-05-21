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

		if (empty($_POST["descripcion2"]))
			# code...
			$descripcion = test_input($_POST["descripcion1"]);
		else 
			$descripcion = test_input($_POST["descripcion2"]);

		include '../BD.php';

		$modelo = new Model();
		$modelo->conectar();

		$modelo->actualizarObra($_POST["id"], $titulo, $autor, $datacion, $descripcion);

		$modelo->desconectar();

		$_SESSION['changeObra'] = "";

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