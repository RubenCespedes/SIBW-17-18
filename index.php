<!DOCTYPE html>
<html>

<?php
	
	include 'BD.php';
	
	if(empty($_GET)){
		
		/* MOSTRAMOS EL INDEX */
		$ids = array();

		$modelo = new Model();
		$modelo->conectar();

		while(count($ids) < 9){	// Necesitamos obtener los identificadores de 9 obras distintas
			$random = rand(1, $modelo->obtenerUltimaObra());

			while(in_array($random, $ids)){
				$random = rand(1, $modelo->obtenerUltimaObra());
			}

			array_push($ids, $random);
		}

		$paths = array();
		$titulos = array();
		$autores = array();

		for($x = 0; $x < 9; $x++){
			array_push($paths, $modelo->obtenerImagenObra($ids[$x]));
			array_push($titulos, $modelo->obtenerTituloObra($ids[$x]));
			array_push($autores, $modelo->obtenerAutorObra($ids[$x]));
		}

		$modelo->desconectar();

		//include 'plantillaMainPage.php';

		include 'plantillaListaObras.php';

		$vista = new Vista();
		//$vista->imprimirIndex($ids, $paths, $titulos, $autores, $ids);
        $vista->imprimirListaObras($ids, $paths, $titulos, $autores, $ids);

	} else {
		if(!empty($_GET["obra"])){

		    $model = new Model();
			$model->conectar();

			$ultimaID = $model->obtenerUltimaObra();

			if($_GET["obra"] <1 OR $_GET["obra"] > $ultimaID){
			    exit("Has introducido una URL maliciosa");
            }

            $id = $_GET["obra"];
			$path = $model->obtenerImagenObra($id);
			$autor = $model->obtenerAutorObra($id);
			$biografia = $model->obtenerBiografiaAutor($autor);
			$titulo = $model->obtenerTituloObra($id);
			$datacion = $model->obtenerDatacionObra($id);
			$descripcion = $model->obtenerDescripcionObra($id);
			$ids = $model->obtenerObrasAutor($autor);

			$titulo_obras = array();

			for($x = 0; $x < count($ids); $x++){
				array_push($titulo_obras, $model->obtenerTituloObra($ids[$x]));
			}

			$comentarios = $model->obtenerComentariosObra($id);
			$autores_comentarios = array();
			$fechas_comentarios = array();
			$horas_comentarios = array();
			$textos_comentarios = array();

			for($x = 0; $x < count($comentarios); $x++){
				array_push($autores_comentarios, $model->obtenerAutorComentario($comentarios[$x]));
				array_push($fechas_comentarios, $model->obtenerFechaComentario($comentarios[$x]));
				array_push($horas_comentarios, $model->obtenerHoraComentario($comentarios[$x]));
				array_push($textos_comentarios, $model->obtenerTextoComentario($comentarios[$x]));
			}
	
			$model->desconectar();

			// INICIO LOGICA VALIDACION FORMULARIO
            $nombreErr = $emailErr = $textoErr = "";
            $nombre = $email = $texto = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                validarFormulario();
            }

			include 'plantillaObra.php';

			$vista = new Vista();
			$vista->imprimirObra($id, $path, $autor, $biografia, $titulo, $datacion, $descripcion, $ids, $titulo_obras, $autores_comentarios, $fechas_comentarios, $horas_comentarios, $textos_comentarios, $nameErr, $emailErr, $textoErr);
		} else if(!empty($_GET["obra_imprimir"])){


			$model = new Model();
			$model->conectar();

			$ultimaID = $model->obtenerUltimaObra();

            if($_GET["obra_imprimir"] <1 OR $_GET["obra_imprimir"] > $ultimaID){
                exit("Has introducido una URL maliciosa");
            }

            $id = $_GET["obra_imprimir"];
			$titulo = $model->obtenerTituloObra($id);
			$datacion = $model->obtenerDatacionObra($id);
			$path = $model->obtenerImagenObra($id);
			$autor = $model->obtenerAutorObra($id);
			$biografia = $model->obtenerBiografiaAutor($autor);
			$descripcion = $model->obtenerDescripcionObra($id);
			$obras = $model->obtenerObrasAutor($autor);

			$titulo_obras = array();

			for($x = 0; $x < count($obras); $x++){
				array_push($titulo_obras, $model->obtenerTituloObra($obras[$x]));
			}

			$model->desconectar();

			include 'plantillaObraImprimir.php';

			$vista = new Vista();
			$vista->imprimirObraImprimir($titulo, $datacion, $path, $autor, $biografia, $descripcion, $titulo_obras);
		} else if(!empty($_GET["coleccion"])){

            $model = new Model();
            $model->conectar();

            $ultimaID = $model->obtenerUltimaColeccion();

            if($_GET["coleccion"] <1 OR $_GET["coleccion"] > $ultimaID){
                exit("Has introducido una URL maliciosa");
            }

            $id_coleccion = $_GET["coleccion"];
            $nombre_coleccion = $model->obtenerNombreColeccion($id_coleccion);
            $ids = $model->obtenerObrasColeccion($id_coleccion);
            $titulos = array();
            $paths = array();
            $autores = array();
            for($x = 0; $x < count($ids); $x++) {
                array_push($titulos, $model->obtenerTituloObra($ids[$x]));
                array_push($paths, $model->obtenerImagenObra($ids[$x]));
                array_push($autores, $model->obtenerAutorObra($ids[$x]));
            }

            $model->desconectar();

            include 'plantillaColecciones.php';

            $vista = new Vista();
            $vista->imprimirColecciones($paths, $titulos, $autores, $ids, $nombre_coleccion);
        } else if(!empty($_GET["pagina"])){

		    if($_GET["pagina"] != "aboutus"){
                exit("Has introducido una URL maliciosa");
            }

            include 'controladorAboutUs.php';
        }
	}

	function validarFormulario(){

	    global $nombreErr, $emailErr, $textoErr, $nombre, $email, $texto;

        if(empty($_POST["nombre"])){
            $nombreErr = "Nombre requerido";
        } else {
            $nombre = test_input($_POST["nombre"]) . " ";

            if(!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
                $nombreErr = "Solo se permiten letras y espacios";
            }

        }

        if(empty($_POST["apellidos"])){
            $nombreErr = "Nombre requerido";
        } else {
            $nombre = $nombre . test_input($_POST["apellidos"]);

            if(!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
                $nombreErr = "Solo se permiten letras y espacios";
            }
        }

        if(empty($_POST["correo"])){
            $emailErr = "Correo requerido";
        } else {
            $email = test_input($_POST["correo"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Formato de correo invalido";
            }
        }

        if(empty($_POST["comentario"])){
            $textoErr = "Comentario requerido";
        } else {
            $texto = test_input($_POST["comentario"]);
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>

</html>