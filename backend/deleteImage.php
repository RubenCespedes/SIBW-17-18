<?php
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		include '../BD.php';

	  	$modelo = new Model();
		$modelo->conectar();

		$id = $_POST["id"];

		$modelo->borrarImagen($id);
		
		$modelo->desconectar();

		$_SESSION["deleteImg"] = "yes";

		// Volvemos a la pagina de la obra de la que venimos
		header("Location: " . $_POST['uri']);
   		exit;
	}
?>