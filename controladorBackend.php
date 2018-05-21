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

	if (isset($_SESSION["deleteObra"])) {
		# code...
		echo "<script type='text/javascript'>
			window.alert('La obra ha sido borrada correctamente');
		</script>";
	}

	if (isset($_SESSION["changeObra"])) {
		# code...
		echo "<script type='text/javascript'>
				window.alert('Los datos de la obra han sido modificados');
			</script>";
	}

	if (isset($_SESSION["deleteImg"])) {
		# code...
		echo "<script type='text/javascript'>
			window.alert('La imagen ha sido borrada correctamente');
		</script>";
	}

	if (isset($_SESSION["aniadirObra"])) {
		# code...
		echo "<script type='text/javascript'>
			window.alert('La obra ha sido añadida correctamente');
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

			// Tenemos DOS OPCIONES: una mostrar el FORMULARIO de edicion y la otra mostrar TODOS LOS COMENTARIOS

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
			}	

			unset($_SESSION['changeComment']);
			unset($_SESSION['delete']);

			break;
		case 'gestor':
			# code...

			include './BD.php';

			$model = new Model();
			$model->conectar();

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				# code...

				switch ($_POST["accion"]) {
					case 'add':
						# code...

						include './backend/plantillaGestor.php';

						// Imprimimos el formulario con los datos a rellenar
						$vista = new Vista();
						$vista->imprimirFormularioObra($_SESSION["usuario"]);

						break;
					case 'edit':
						# code...

						$id = $_POST["id"];

						$obra = $model->obtenerDatosObra($id);
						$imagenes = $model->obtenerImagenesObra($id);

						include './backend/plantillaGestor.php';

						// Imprimimos el formulario con los datos del comentario a editar
						$vista = new Vista();
						$vista->imprimirFormularioGestor($obra, $imagenes, $_SESSION["usuario"]);

						break;
					default:
						# code...
						break;
				}
			} else {
				$array_obras = $model->obtenerObras();
				$array_imagenes = array();

				for ($i=0; $i < count($array_obras); $i++) { 
					# code...
					$fila = $model->obtenerImagenObra($array_obras[$i]["id"]);
					array_push($array_imagenes, $fila);
				}

				$model->desconectar();

				$nombre = $_SESSION["usuario"];

				include './backend/plantillaGestor.php';

				$vista = new Vista();
				$vista->imprimirVistaGestor($array_obras, $array_imagenes, $nombre);
			}

			unset($_SESSION["changeObra"]);
			unset($_SESSION["deleteObra"]);
			unset($_SESSION["deleteImg"]);
			unset($_SESSION["aniadirObra"]);

			break;
		default:
			# code...
			break;
	}
	//session_destroy();
?>