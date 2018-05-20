<?php
// define variables and set to empty values
$firstname = "";
$lastname = "";
$email = "";

$role = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$firstname = test_input($_POST["firstname"]);
	$lastname = test_input($_POST["lastname"]);
	$email = test_input($_POST["email"]);

	$name = $firstname . " " . $lastname;

	include 'BD.php';

  	$modelo = new Model();
	$modelo->conectar();

	$modelo->introducirUsuario($name, $email);

	$rol = $modelo->obtenerRolUsuario($name);
	$modelo->desconectar();

	session_start();

	$_SESSION["rol"] = $rol;
	$_SESSION["usuario"] = $name;

	header("Location: " . $_POST['uri']);
   	exit;
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