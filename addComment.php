<?php
	session_start();
	// define variables and set to empty values
	$firstname = "";
	$lastname = "";
	$email = "";
	$comment = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$firstname = test_input($_POST["nombre"]);
		$lastname = test_input($_POST["apellidos"]);
		$email = test_input($_POST["correo"]);
		$comment = test_input($_POST["comentario"]);

		$name = $firstname . " " . $lastname;

		include 'BD.php';

	  	$modelo = new Model();
		$modelo->conectar();

		// Compruebo que los datos sean los suyos
		if(strcmp($name, $_SESSION["usuario"]) == 0 && strcmp($email, $_SESSION["correo"] == 0)){
			$date = date("Y-m-d");
			$hour = date("H:i:s");

			$modelo->introducirComentario($name, $date, $hour, $comment);
			
			$id_comentario = $modelo->obtenerUltimoComentario();
			$id_obra = $_POST["id_obra"];

			$modelo->enlazarComentarioObra($id_comentario, $id_obra);
		}
		
		$modelo->desconectar();

		// Volvemos a la pagina de la obra de la que venimos
		header("Location: index.php?obra=" . $_POST["id_obra"]);
   		exit;
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>