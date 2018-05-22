<?php
	// Recupera la sesion abierta anteriormente
	session_start();
?>
<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Sesiones: pagina 2</title>
</head>
<body>
	<?php
	// Comprueba si la variable 'usuario' se encuentra inicializada
	if (isset($_POST['usuario'])) {
		// Si el usuario accede a la pagina inmediatamente despues de identificarse se muestra un mensaje inicial
		$_SESSION['usuario'] = $_POST['usuario'];
		echo "Esta en la pagina 2 y ha iniciado la sesion como: " . $_POST['usuario'];
	} else {
		if (isset($_SESSION['usuario'])) {
			// Si estando el usuario identificado accede a la pagina por segunda vez o mas, entonces se muestra un mensaje diferente y la informacion de la sesion
			echo "Ha vuelto a la pagina 2. Su sesion sigue activa y la inicio como: " . $_SESSION['usuario'];
			echo "<p>Otra informacion de su sesion es la siguiente:";
				// Obtenemos o establecemos el identificador de la sesion. El id de una sesion se guarda en una cookie denominada PHPSESSID
				echo "<p>session_id: " . session_id();
				// Obtenemos y/o establecemos el nombre de la sesion actual. Se necesita llamar a session_name() para cada peticion (y antes de llamar a session_start())
				echo "<p>session_name:" . session_name();
				echo "<p>";
				// Imprimimos informacion legible para humanos sobre una variable. Matriz con la informacion de la cookie de sesion actual. lifetime, path, domain, secure y httponly
				print_r(session_get_cookie_params());
		} else {
			// Si el usuario accede a la pagina sin identificarse se muestra un mensaje de aviso
			echo "Aviso: Acceso restringido. Debe indicar sesion dando su nombre.";
		}
	}
	?>
	<p><a href="sesionPagina_1.php">Ir a la pagina 1</a></p>
</body>
</html>