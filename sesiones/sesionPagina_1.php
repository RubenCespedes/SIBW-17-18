<?php
// Creamos una sesion o reanudamos la actual. Se basa en un identificador de sesion pasado por GET, POST o una cookie
session_start();
?>

<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Sesiones: pagina 1</title>
</head>
<body>
	<?php
	// La funcion isset permite comprobar si una variable ha sido inicializada
	if(isset($_SESSION['usuario'])){
		// Si estando el usuario identificado accede a la pagina por segunda vez o mas, entonces se muestra un mensaje avisando que la sesion esta activa
		echo "<p><a href='sesionPagina_3.php'>Cerrar sesion</a></p>";
	} else {
		?>
	<!-- Si el usuario accede a la pagina sin estar identificado, se muestra un formulario-->
	<form action="sesionPagina_2.php" method="POST">
		<p>Nombre de usuario: <input type="text" placeholder="Escriba su nombre" name="usuario" required/></p>
		<input type="submit" value="Pulse aqui para iniciar la sesion"/>
	</form>
	
	<?php
	}
	?>
	
	<p><a href="sesionPagina_2.php">Ir a la pagina 2</a></p>
</body>
</html>