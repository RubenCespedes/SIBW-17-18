<?php
	// Se reanuda la sesion abierta
	session_start();
	// Destruimos toda la informacion asociada con la sesion actual, pero no las variables globales asociadas con la sesion. Al desconectar un usuario, debe destruirse el id de sesion
	session_destroy();
?>
<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Sesiones: pagina 3</title>
</head>
<body>
	<p>Esta en la pagina 3 y ha cerrado la sesion.</p>
	<p><a href="sesionPagina_1.php">Ir a la pagina 1</a></p>
</body>
</html>