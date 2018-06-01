<?php
	header("Content-Type: text/html;charset=utf-8"); 
	//mysqli_query("SET NAMES 'utf8'");
	
	class Model {
		function Model(){
			$this->servidor = "localhost";
			$this->usuario = "Ruben Cespedes";
			$this->contraseña = "Ruben.phpmyadmin.1";
			$this->bd = "sibw";

			$this->conexion = NULL;
		}

		function conectar(){
			$this->conexion = new mysqli($this->servidor, $this->usuario, $this->contraseña, $this->bd);

			if($this->conexion->connect_errno){
				echo "Falló la conexión con la base de datos " . $this->bd . " [" . $this->servidor . "]<br>";
			}

            $this->conexion->set_charset("utf8");

			//echo "Conexión correcta <br>";
		}

		function desconectar(){
			$this->conexion->close();

			//echo "Conexión cerrada <br>";
		}

		function obtenerImagenObra($id_obra){

			// Mandamos la sentencia preparada al servidor
			$sentencia = $this->conexion->prepare("SELECT path FROM imagen, obratieneimagenes WHERE imagen.id = obratieneimagenes.id_imagenes AND obratieneimagenes.id_obra = ?");

			// Enlazamos los parametros ocultos
			$sentencia->bind_param("i", $id_obra);
			// Ejecutamos en el servidor
			$sentencia->execute();
			// Obtenemos los resultados en un objeto
			$result = $sentencia->get_result();
			// Extraemos la primera fila
			$fila = $result->fetch_assoc();

			$path = $fila["path"];
			//echo "<img src='" . $fila["path"] . "' alt='Imagen de la obra'><br>";

			$sentencia->close();

			return $path;
		}

		function obtenerTituloObra($id_obra){
			// Mandamos la sentencia preparada al servidor
			$sentencia = $this->conexion->prepare("SELECT titulo FROM obra WHERE id=?");

			// Enlazamos los parametros ocultos
			$sentencia->bind_param("i", $id_obra);
			// Ejecutamos en el servidor
			$sentencia->execute();
			// Obtenemos los resultados en un objeto
			$result = $sentencia->get_result();
			// Extraemos la primera fila
			$fila = $result->fetch_assoc();

			$titulo = $fila["titulo"];
			//echo "Titulo: " . $fila["titulo"] . "<br>";

			$sentencia->close();

			return $titulo;
		}

		function obtenerAutorObra($id_obra){
			// Mandamos la sentencia preparada al servidor
			$sentencia = $this->conexion->prepare("SELECT nombre_autor FROM autortieneobras, obra WHERE autortieneobras.id_obra = obra.id AND obra.id = ?");

			// Enlazamos los parametros ocultos
			$sentencia->bind_param("i", $id_obra);
			// Ejecutamos en el servidor
			$sentencia->execute();
			// Obtenemos los resultados en un objeto
			$result = $sentencia->get_result();
			// Extraemos la primera fila
			$fila = $result->fetch_assoc();

			$autor = $fila["nombre_autor"];
			//echo "Autor: " . $fila["nombre_autor"] . "<br>";

			$sentencia->close();

			return $autor;
		}

		function obtenerUltimaObra(){
			$sentencia = $this->conexion->prepare("SELECT MAX(id) FROM obra");

			$sentencia->execute();

			$id = NULL;

			$sentencia->bind_result($id);

			$sentencia->fetch();

			$sentencia->close();

			return $id;
		}

		function obtenerUltimaObraPublicada(){
			$sentencia = $this->conexion->prepare("SELECT MAX(id) FROM obra WHERE publicado=true");

			$sentencia->execute();

			$id = NULL;

			$sentencia->bind_result($id);

			$sentencia->fetch();

			$sentencia->close();

			return $id;
		}

		function obtenerObrasNoPublicadas(){
			// Preparamos la sentencia (la mandamos al servidor y este comprueba la sintaxis e inicializa los recursos)
			$sentencia = $this->conexion->prepare("SELECT id FROM obra WHERE publicado=false");

			// La ejecutamos
			$sentencia->execute();

			// Obtenemos un conjunto de resultados de la sentencia preparada
			$resultado = $sentencia->get_result();

			$ids = array(); // Vector donde almacenaremos los ids de las obras no publicadas

			// Vamos obteniendo todas las filas de resultado como un vector asociativo
			while($fila = $resultado->fetch_assoc()){
				// Añadimos al vector anterior el campo 'id' de cada tupla obtenida
				array_push($ids, $fila["id"]);
			}

			// Cerramos la sentencia preparada
			$sentencia->close();

			// Devolvemos el array con los ids de las obras no publicadas
			return $ids;
		}

		function obtenerBiografiaAutor($autor){
			$sentencia = $this->conexion->prepare("SELECT biografia FROM autor WHERE nombre = ?");

			$sentencia->bind_param("s", $autor);

			$sentencia->execute();

			$resultado = $sentencia->get_result();

			$fila = $resultado->fetch_assoc();

			$biografia = $fila["biografia"];

			$sentencia->close();

			return $biografia;
		}

		function obtenerDatacionObra($id){
			$sentencia = $this->conexion->prepare("SELECT datacion FROM obra WHERE id = ?");

			$sentencia->bind_param("i", $id);

			$sentencia->execute();

			$resultado = $sentencia->get_result();

			$fila = $resultado->fetch_assoc();

			$datacion = $fila["datacion"];

			$sentencia->close();

			return $datacion;
		}

		function obtenerDescripcionObra($id){
			$sentencia = $this->conexion->prepare("SELECT descripcion FROM obra WHERE id = ?");

			$sentencia->bind_param("i", $id);

			$sentencia->execute();

			$resultado = $sentencia->get_result();

			$fila = $resultado->fetch_assoc();

			$descripcion = $fila["descripcion"];

			$sentencia->close();

			return $descripcion;
		}

		function obtenerObrasAutor($autor){
			$sentencia = $this->conexion->prepare("SELECT id_obra FROM autortieneobras, autor WHERE autortieneobras.nombre_autor = autor.nombre AND autor.nombre = ?");

			$sentencia->bind_param("s", $autor);

			$sentencia->execute();

			$resultado = $sentencia->get_result();

			$obras = array();

			while($fila = $resultado->fetch_assoc()){
				array_push($obras, $fila["id_obra"]);
			}

			$sentencia->close();

			return $obras;
		}

		function obtenerComentariosObra($id){
			$sentencia = $this->conexion->prepare("SELECT comentario.id FROM comentario, obratienecomentarios WHERE comentario.id = obratienecomentarios.id_comentario AND obratienecomentarios.id_obra = ?");

			$sentencia->bind_param("i", $id);

			$sentencia->execute();

			$resultado = $sentencia->get_result();

			$comentarios = array();

			while($fila = $resultado->fetch_assoc()){
				array_push($comentarios, $fila["id"]);
			}

			$sentencia->close();

			return $comentarios;
		}

		function obtenerAutorComentario($id){
			$sentencia = $this->conexion->prepare("SELECT autor FROM comentario WHERE id=?");

			$sentencia->bind_param("i", $id);

			$sentencia->execute();

			$resultado = $sentencia->get_result();

			$fila = $resultado->fetch_assoc();

			$autor = $fila["autor"];

			$sentencia->close();

			return $autor;
		}

		function obtenerFechaComentario($id){
			$sentencia = $this->conexion->prepare("SELECT fecha FROM comentario WHERE id=?");

			$sentencia->bind_param("i", $id);

			$sentencia->execute();

			$resultado = $sentencia->get_result();

			$fila = $resultado->fetch_assoc();

			$fecha = $fila["fecha"];

			$sentencia->close();

			return $fecha;
		}

		function obtenerHoraComentario($id){
			$sentencia = $this->conexion->prepare("SELECT hora FROM comentario WHERE id=?");

			$sentencia->bind_param("i", $id);

			$sentencia->execute();

			$resultado = $sentencia->get_result();

			$fila = $resultado->fetch_assoc();

			$hora = $fila["hora"];

			$sentencia->close();

			return $hora;
		}

		function obtenerTextoComentario($id){
			$sentencia = $this->conexion->prepare("SELECT texto FROM comentario WHERE id=?");

			$sentencia->bind_param("i", $id);

			$sentencia->execute();

			$resultado = $sentencia->get_result();

			$fila = $resultado->fetch_assoc();

			$texto = $fila["texto"];

			$sentencia->close();

			return $texto;
		}

		function obtenerNombreColeccion($id){
		    $sentencia = $this->conexion->prepare("SELECT nombre FROM coleccion WHERE id = ?");

		    $sentencia->bind_param("i", $id);

		    $sentencia->execute();

		    $resultado = $sentencia->get_result();

		    $fila = $resultado->fetch_assoc();

		    $nombre = $fila["nombre"];

		    return $nombre;
        }

        function obtenerObrasColeccion($id){
            $sentencia = $this->conexion->prepare("SELECT id_obra FROM coleccion, obrapertenececoleccion WHERE obrapertenececoleccion.id_coleccion = coleccion.id AND coleccion.id = ?");

            $sentencia->bind_param("i", $id);

            $sentencia->execute();

            $resultado = $sentencia->get_result();

            $ids = array();

            while($fila = $resultado->fetch_assoc()){
                array_push($ids, $fila["id_obra"]);
            }

            return $ids;
        }

        function obtenerUltimaColeccion(){
            $sentencia = $this->conexion->prepare("SELECT MAX(id) FROM coleccion");

            $sentencia->execute();

            $id = NULL;

            $sentencia->bind_result($id);

            $sentencia->fetch();

            $sentencia->close();

            return $id;
        }

        function obtenerColeccionObra($id){
            // Mandamos la sentencia preparada al servidor
            $sentencia = $this->conexion->prepare("SELECT coleccion.id FROM coleccion, obrapertenececoleccion, obra WHERE coleccion.id = obrapertenececoleccion.id_coleccion AND obrapertenececoleccion.id_obra = obra.id AND obra.id = ?");

            // Enlazamos los parametros ocultos
            $sentencia->bind_param("i", $id);
            // Ejecutamos en el servidor
            $sentencia->execute();
            // Obtenemos los resultados en un objeto
            $result = $sentencia->get_result();
            // Extraemos la primera fila
            $fila = $result->fetch_assoc();

            $coleccion = $fila["id"];
            //echo "Autor: " . $fila["nombre_autor"] . "<br>";

            $sentencia->close();

            return $coleccion;
		}

		function obtenerPalabrasProhibidas(){
			$sentencia = $this->conexion->prepare("SELECT texto FROM palabras");

			$sentencia->execute();

			$result = $sentencia->get_result();

			$palabras = array();

			while($fila = $result->fetch_assoc()){
                array_push($palabras, $fila["texto"]);
            }

            $sentencia->close();

            return $palabras;
		}

		function introducirUsuario($nombre, $correo){
			// Preparamos y enlazamos
			$sentencia = $this->conexion->prepare("INSERT INTO `usuario` (`id`, `nombre`, `correo`, `rol`) VALUES (NULL, ?, ?, 'usuario');");
			$sentencia->bind_param("ss", $name, $email);

			// Establecemos los parametros y ejecutamos
			$name = $nombre;
			$email = $correo;
			$sentencia->execute();

			//echo "Nuevas filas introducidas correctamente";

			$sentencia->close();
		}

		function obtenerRolUsuario($nombre){
			$sentencia = $this->conexion->prepare("SELECT rol FROM usuario WHERE nombre = ?");

		    $sentencia->bind_param("s", $nombre);

		    $sentencia->execute();

		    $resultado = $sentencia->get_result();

		    $fila = $resultado->fetch_assoc();

		    $rol = $fila["rol"];

		    return $rol;
		}

		function obtenerCorreoUsuario($nombre){
			$sentencia = $this->conexion->prepare("SELECT correo FROM usuario WHERE nombre=?");

		    $sentencia->bind_param("s", $nombre);

		    $sentencia->execute();

		    $resultado = $sentencia->get_result();

		    $fila = $resultado->fetch_assoc();

		    $correo = $fila["correo"];

		    return $correo;
		}

		function introducirComentario($nombre, $fecha, $hora, $comentario){
			// Preparamos y enlazamos
			$sentencia = $this->conexion->prepare("INSERT INTO `comentario` (`id`, `autor`, `fecha`, `hora`, `texto`) VALUES (NULL, ?, ?, ?, ?);");
			$sentencia->bind_param("ssss", $name, $date, $hour, $comment);

			// Establecemos los parametros y ejecutamos
			$name = $nombre;
			$date = $fecha;
			$hour = $hora;
			$comment = $comentario;
			$sentencia->execute();

			//echo "Nuevas filas introducidas correctamente";

			$sentencia->close();
		}

		function obtenerUltimoComentario(){
			$sentencia = $this->conexion->prepare("SELECT MAX(id) FROM comentario");

			$sentencia->execute();

			$id = NULL;

			$sentencia->bind_result($id);

			$sentencia->fetch();

			$sentencia->close();

			return $id;
		}

		function enlazarComentarioObra($id_comentario, $id_obra){
			// Preparamos y enlazamos
			$sentencia = $this->conexion->prepare("INSERT INTO `obratienecomentarios` (`id_comentario`, `id_obra`) VALUES (?, ?);");
			$sentencia->bind_param("ss", $id_comment, $id_artwork);

			// Establecemos los parametros y ejecutamos
			$id_comment = $id_comentario;
			$id_artwork = $id_obra;
			$sentencia->execute();

			//echo "Nuevas filas introducidas correctamente";

			$sentencia->close();
		}

		function obtenerIdentificadorUsuario($nombre){
			$sentencia = $this->conexion->prepare("SELECT id FROM `usuario` WHERE nombre = ?");

		    $sentencia->bind_param("s", $nombre);

		    $sentencia->execute();

		    $resultado = $sentencia->get_result();

		    $fila = $resultado->fetch_assoc();

		    $id = $fila["id"];

		    return $id;
		}

		function actualizarDatosPersonales($id, $name, $email){
			// Preparamos y enlazamos
			$sentencia = $this->conexion->prepare("UPDATE `usuario` SET `nombre` = ?, `correo` = ? WHERE `usuario`.`id` = ?");

			$sentencia->bind_param("sss", $nombre, $correo, $identificador);

			// Establecemos los parametros y ejecutamos
			$nombre = $name;
			$correo = $email;
			$identificador = $id;

			$sentencia->execute();

			$sentencia->close();
		}

		function obtenerComentarios(){
			$sentencia = $this->conexion->prepare("SELECT * FROM `comentario`");

			$sentencia->execute();

			$result = $sentencia->get_result();

			$comentarios = array();

			while($fila = $result->fetch_assoc())
				array_push($comentarios, $fila);

			return $comentarios;
		}

		function obtenerObras(){
			$sentencia = $this->conexion->prepare("SELECT * FROM `obra`");

			$sentencia->execute();

			$result = $sentencia->get_result();

			$obras = array();

			while($fila = $result->fetch_assoc()){
				array_push($obras, $fila);
			}

			return $obras;
		}

		function obtenerImagenesObra($id_obra){

			$sentencia = $this->conexion->prepare("SELECT * FROM imagen, obratieneimagenes, obra WHERE obra.id = ? AND obratieneimagenes.id_obra = obra.id AND obratieneimagenes.id_imagenes = imagen.id");

			$sentencia->bind_param("i", $id_obra);

			$sentencia->execute();

			$result = $sentencia->get_result();
			
			$imagenes = array();

			while($fila = $result->fetch_assoc())
				array_push($imagenes, $fila);
			
			$sentencia->close();

			return $imagenes;
		}

		function obtenerDatosComentario($id){
			$sentencia = $this->conexion->prepare("SELECT * FROM `comentario` WHERE id=?");

			$sentencia->bind_param("s", $identificator);

			$identificator = $id;

			$sentencia->execute();

			$result = $sentencia->get_result();

			$comentario = $result->fetch_assoc();

			return $comentario;
		}

		function obtenerDatosObra($id){
			$sentencia = $this->conexion->prepare("SELECT * FROM `obra` WHERE id=?");

			$sentencia->bind_param("s", $identificator);

			$identificator = $id;

			$sentencia->execute();

			$result = $sentencia->get_result();

			$obra = $result->fetch_assoc();

			return $obra;
		}

		function borrarComentario($id){
			$sql = "DELETE FROM comentario WHERE id=" . $id;

			if ($this->conexion->query($sql) === TRUE) {
			    echo "Record deleted successfully";
			} else {
			    echo "Error deleting record: " . $conn->error;
			}
		}

		function borrarObra($id){
			$sql = "DELETE FROM obra WHERE id=" . $id;

			if ($this->conexion->query($sql) === TRUE) {
			    echo "Record deleted successfully";
			} else {
			    echo "Error deleting record: " . $conn->error;
			}
		}

		function borrarImagen($id){
			$sql = "DELETE FROM imagen WHERE id=" . $id;

			if ($this->conexion->query($sql) === TRUE) {
			    echo "Record deleted successfully";
			} else {
			    echo "Error deleting record: " . $conn->error;
			}
		}

		function actualizarComentario($id, $autor, $fecha, $hora, $texto){
			// Preparamos y enlazamos
			$sentencia = $this->conexion->prepare("UPDATE `comentario` SET `autor` = ?, `fecha` = ?, `hora` = ?, `texto` = ? WHERE `comentario`.`id` = ?");

			$sentencia->bind_param("sssss", $author, $date, $hour, $text, $identificator);

			// Establecemos los parametros y ejecutamos
			$author = $autor;
			$date = $fecha;
			$hour = $hora;
			$text = $texto;
			$identificator = $id;

			$sentencia->execute();

			$sentencia->close();
		}

		function actualizarObra($id, $titulo, $autor, $datacion, $descripcion){
			// Preparamos y enlazamos
			$sentencia = $this->conexion->prepare("UPDATE `obra` SET `titulo` = ?, `autor` = ?, `datacion` = ?, `descripcion` = ? WHERE `obra`.`id` = ?");

			$sentencia->bind_param("sssss", $title, $author, $dating, $description, $identificator);

			// Establecemos los parametros y ejecutamos
			$title = $titulo;
			$author = $autor;
			$dating = $datacion;
			$description = $descripcion;
			$identificator = $id;

			$sentencia->execute();

			$sentencia->close();
		}

		function introducirObra($title, $author, $dating, $description){
			// Preparamos y enlazamos
			$sentencia = $this->conexion->prepare("INSERT INTO `obra` (`id`, `titulo`, `autor`, `datacion`, `descripcion`) VALUES (NULL, ?, ?, ?, ?)");
			$sentencia->bind_param("ssss", $titulo, $autor, $datacion, $descripcion);

			// Establecemos los parametros y ejecutamos
			$titulo = $title;
			$autor = $author;
			$datacion = $dating;
			$descripcion = $description;
			
			$sentencia->execute();

			//echo "Nuevas filas introducidas correctamente";

			$sentencia->close();
		}

		/*function obtenerObrasColeccion($coleccion){
            $sentencia = $this->conexion->prepare("SELECT id_obra FROM obrapertenececoleccion, coleccion WHERE obrapertenececoleccion.id_coleccion = coleccion.id AND coleccion.id = ?");

            $sentencia->bind_param("s", $coleccion);

            $sentencia->execute();

            $resultado = $sentencia->get_result();

            $ids = array();

            while($fila = $resultado->fetch_assoc()){
                array_push($ids, $fila["id_obra"]);
            }

            $sentencia->close();

            return $ids;
        }*/
	}

	/* CONTROLADOR PARA EL INDEX.PHP
	$model = new Model();

	$model->conectar();
	$ultimo_id = $model->obtenerUltimaObra();
	$id = rand(1,$ultimo_id);
	$path = $model->obtenerImagenObra($id);
	$titulo = $model->obtenerTituloObra($id);
	$autor = $model->obtenerAutorObra($id);
	
	$model->desconectar();

	//echo "Id de la ultima obra: " . $ultimo_id . "<br>";
	
	echo "<img src='" . $path . "' alt='Imagen de la obra'><br>";
	echo "Titulo: " . $titulo . "<br>";
	echo "Autor: " . $autor . "<br>";
	/* FIN CONTROLADOR PARA INDEX.PHP */

	/* CONTROLADOR PARA EL OBRA.PHP
	$model = new Model();

	$model->conectar();
	$id = 1;
	$path = $model->obtenerImagenObra($id);
	$autor = $model->obtenerAutorObra($id);
	$biografia = $model->obtenerBiografiaAutor($autor);
	$titulo = $model->obtenerTituloObra($id);
	$datacion = $model->obtenerDatacionObra($id);
	$descripcion = $model->obtenerDescripcionObra($id);
	$obras = $model->obtenerObrasAutor($autor);

	$titulo_obras = array();

	for($x = 0; $x < count($obras); $x++){
		array_push($titulo_obras, $model->obtenerTituloObra($obras[$x]));
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

	echo "<img src='" . $path . "' alt='Imagen de la obra'><br>";
	echo "Autor: " . $autor . "<br>";
	echo "Biografia: " . $biografia . "<br>";
	echo "Datacion: " . $datacion . "<br>";
	echo "Descripcion: " . $descripcion . "<br>";
	echo "Obras de " . $autor . ": ";

	for($x = 0; $x < count($titulo_obras); $x++){
		echo $titulo_obras[$x] . ", ";
	}

	for($x = 0; $x < count($comentarios); $x++){
		echo "COMENTARIO CON ID " . $comentarios[$x] . "<br>";
		echo "Autor_comentario: " . $autores_comentarios[$x] . "<br>";
		echo "Fecha comentario: " . $fechas_comentarios[$x] . "<br>";
		echo "Hora comentario: " . $horas_comentarios[$x] . "<br>";
		echo "Texto comentario: " . $textos_comentarios[$x] . "<br>";
	}

	echo "<br>";
	/* FIN CONTROLADOR PARA OBRA.PHP */

	/* CONTROLADOR PARA EL OBRA_IMPRIMIR.PHP 
	$model = new Model();

	$model->conectar();

	$id = 1;
	$titulo = $model->obtenerTituloObra($id);
	$datacion = $model->obtenerDatacionObra($id);
	$path = $model->obtenerImagenObra($id);
	$autor = $model->obtenerAutorObra($id);
	$biografia = $model->obtenerBiografiaAutor($autor);
	$descripcion = $model->obtenerDescripcionObra($id);

	$model->desconectar();

	echo "Titulo de la obra: " . $titulo . "<br>";
	echo "Datacion: " . $datacion . "<br>";
	echo "<img src='" . $path . "' alt='Imagen de la obra'>";
	echo "Autor de la obra: " . $autor . "<br>";
	echo "Biografia del autor: " . $biografia . "<br>";
	echo "Descripcion de la obra: " . $descripcion . "<br>";
	/* FIN CONTROLADOR PARA EL OBRA_IMPRIMIR.PHP */
?>