<?php
// Creamos una sesion o reanudamos la actual. Se basa en un identificador de sesion pasado por GET, POST o una cookie
session_start();

// define variables and set to empty values
$name = "";
$rol = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["uname"]);

	include 'BD.php';

  	$modelo = new Model();
	$modelo->conectar();

	$rol = $modelo->obtenerRolUsuario($name);
	$modelo->desconectar();

	if(empty($rol)){
		echo "Usuario no registrado.";
	} else {
		//echo "El rol del usuario " . $name . " es: " . $rol;
		// Establecemos en una variable de sesion el rol del usuario
		$_SESSION["rol"] = $rol;
		$_SESSION["usuario"] = $name;
		//print_r($_SESSION);
		//echo "Id de la sesion: " . session_id();
		//echo "Nombre de la sesion: " . session_name();
		// "Estado de la sesion: " . session_status();
		
		header("Location: index.php");
   		exit;
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/*switch($name){
	case "ruben":
		$role = "gestor";
		break;
	case "user":
		$role = "user";
		break;
	case "moderator":
		$role = "moderator";
		break;
	case "admin":
		$role = "superuser";
		break;
	default:
		$role = "";
		$name = "unknown";
		break;
}
	echo "El nombre del usuario es: " . $name . " y su rol es: " . $role;*/
?>