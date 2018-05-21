<?php
	// Reanudamos la sesion del usuario
	session_start();

	if (isset($_SESSION["change"])) {
		# code...
		echo "<script type='text/javascript'>
				window.alert('El nombre y la contraseña han sido cambiados correctamente');
			</script>";
	}

	if (isset($_SESSION["delete"])) {
		# code...
		echo "<script type='text/javascript'>
				window.alert('El comentario ha sido borrado correctamente');
			</script>";
	}

	if (isset($_SESSION["changeComment"])) {
		# code...
		echo "<script type='text/javascript'>
			window.alert('El comentario ha sido modificado correctamente');
		</script>";
	}

	// Segun su rol, mostraremos un panel u otro
	switch ($_SESSION['rol']) {
		case 'usuario':
			# code...
			include './backend/plantillaUsuario.php';

			$nombre = $_SESSION['usuario'];
			$correo = $_SESSION['correo'];

			$vista = new Vista();
			$vista->imprimirVistaUsuario($nombre, $correo);

			unset($_SESSION['change']);

			break;
		case 'moderador':
			# code...

			include './BD.php';

			$model = new Model();
			$model->conectar();

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				# code...
				// Datos del comentario a editar
				$comentario = $model->obtenerDatosComentario($_POST["id"]);

				include './backend/plantillaModerador.php';

				// Imprimimos el formulario con los datos del comentario a editar
				$vista = new Vista();
				$vista->imprimirFormularioModerador($comentario, $_SESSION["usuario"]);
			} else {
				// Array con los datos de todos los comentarios
				$array_comments = $model->obtenerComentarios();

				$model->desconectar();

				$nombre = $_SESSION['usuario'];

				include './backend/plantillaModerador.php';

				$vista = new Vista();
				$vista->imprimirVistaModerador($array_comments, $nombre);

				unsed($_SESSION['delete']);
			}			

			break;
		default:
			# code...
			break;
	}
	//session_destroy();
?>