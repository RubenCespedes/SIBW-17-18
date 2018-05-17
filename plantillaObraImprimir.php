<?php
	class Vista{
		function Vista(){

		}

		function imprimirObraImprimir($titulo, $datacion, $path, $autor, $biografia, $descripcion, $titulo_obras){
			include 'head.php';

			imprimirHead();

			echo "<body>";

			echo '<div class="imprimir">
	            <!-- AUTOR DE LA OBRA -->
	            <div class="autor-imprimir">
	                <p class="titulo-destacado">' . $autor . '</p>
	                <p class="descripcion-autor">' . $biografia . '</p>
	            </div>

	            <!-- DESCRIPCION DE LA OBRA -->
	            <div class="descripcion-imprimir">
	                <img class="logo-imprimir" src="assets/image/logo.png" alt="LOGOTIPO DEL MUSEO" width="25%">
	                <p class="titulo-imprimir">' . $titulo . '</p>
	                <p class="datacion-imprimir">' . $datacion . '</p>
	                <p class="texto-descripcion-obra">' . $descripcion . '<img src="' . $path . '" alt="AQUI VA LA IMAGEN" width="50%" height="50%" class="imagen-imprimir"></p>
	            </div>

	            <!-- ENLACES EXTERNOS -->
	            <div class="enlaces-imprimir">
	                <p class="titulo-destacado">Enlaces externos Enlaces externos: ';

	             		for($x = 0; $x < count($titulo_obras); $x++){
	                		$this->imprimirEnlaceExterno($titulo_obras[$x]);
	                	}

	                	echo '</p>
	            </div>
	        </div>
	        </body>';
		}

		function imprimirEnlaceExterno($titulo_obra){
			echo "<a href='#'>" . $titulo_obra . "</a>";
		}
	}
?>