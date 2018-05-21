<?php
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		include '../BD.php';

	  	$modelo = new Model();
		$modelo->conectar();

		$id = $_POST["id"];
		$imagenes = $modelo->obtenerImagenesObra($id);;

		$modelo->borrarObra($id);

		for ($i=0; $i < count($imagenes); $i++) { 
			# code...
			$modelo->borrarImagen($imagenes["id"]);
		}
		
		$modelo->desconectar();

		$_SESSION["deleteObra"] = "yes";

		// Volvemos a la pagina de la obra de la que venimos
		header("Location: " . $_POST['uri']);
   		exit;
	}
?>