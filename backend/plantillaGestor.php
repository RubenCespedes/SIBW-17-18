<?php
class Vista {
	function Vista(){

	}

	function imprimirFormularioObra($nombre){
		include 'head.php';
		include 'footer.php';

		imprimirHead();
		
		echo '<body>';

		include 'header.php';

		imprimirHeader($nombre);

		echo '<div class="form-datos">
				<form action="/backend/aniadirObra.php" method="POST">
					<h2>Datos del comentario</h2>
					<div class="input-container">
					    <i class="fa fa-tag icon"></i>
					    <input class="input-field" type="text" placeholder="Titulo de la obra" name="titulo">
					</div>
		
					<div class="input-container">
						<i class="fa fa-user icon"></i>
						<input class="input-field" type="text" placeholder="Autor de la obra" name="autor">
					</div>

					<div class="input-container">
						<i class="fa fa-hourglass-half icon"></i>
						<input class="input-field" type="text" placeholder="Fecha de datacion de la obra" name="datacion">
					</div>

					<div class="input-container">
						<i class="fa fa-sticky-note icon"></i>
						<textarea name="descripcion" rows="10" cols="80" placeholder="Rellene la descripcion de la obra"></textarea>
					</div>

					<input type="text" name="uri" value="' . $_SERVER["REQUEST_URI"] .'" style="display:none;">
			
					<button type="submit" class="btn">Añadir nueva obra</button>
				</form>
			</div>
		</body>';

		imprimirFooter();
	}

	function imprimirFormularioGestor($obra, $imagenes, $nombre){
		include 'head.php';
		include 'footer.php';

		imprimirHead();
		
		echo '<body>';

		include 'header.php';

		imprimirHeader($nombre);

		echo '<div class="form-datos">
				<form action="/backend/cambiarObra.php" method="POST">
					<h2>Datos del comentario</h2>
					<div class="input-container">
					    <i class="fa fa-tag icon"></i>
					    <input class="input-field" type="text" placeholder="Autorname" name="titulo" value="' . $obra["titulo"] . '">
					</div>
		
					<div class="input-container">
						<i class="fa fa-user icon"></i>
						<input class="input-field" type="text" placeholder="Date" name="autor" value="' . $obra["autor"] . '">
					</div>

					<div class="input-container">
						<i class="fa fa-hourglass-half icon"></i>
						<input class="input-field" type="text" placeholder="Hour" name="datacion" value="' . $obra["datacion"] . '">
					</div>

					<div class="input-container">
						<i class="fa fa-sticky-note icon"></i>
						<input class="input-field" type="text" placeholder="Text" name="descripcion1" value="' . $obra["descripcion"] . '">
					</div>

					<div class="input-container">
						<i class="fa fa-sticky-note icon"></i>
						<textarea name="descripcion2" rows="10" cols="80" placeholder="Copie el texto del campo anterior y modifique lo que desee"></textarea>
					</div>

					<div class="input-container">';

					for ($i=0; $i < count($imagenes); $i++) { 
						# code...
						$this->imprimirImagenes($imagenes[$i]);
					}

					echo '</div>
					<input type="text" name="uri" value="' . $_SERVER["REQUEST_URI"] .'" style="display:none;">
					<input type="text" name="id" value="' . $obra["id"] .'" style="display:none;">
			
					<button type="submit" class="btn">Actualizar datos</button>
				</form>
			</div>
		</body>';

		imprimirFooter();
	}

	function imprimirImagenes($fila){
		echo '<form class="form-comment" action="./backend/deleteImage.php" method="POST">
			   	   	<input type="text" name="id" style="display: none;" value="' . $fila["id"] . '"></input>
			   	   	<input type="text" name="uri" style="display: none;" value="' . $_SERVER["REQUEST_URI"] . '"></input>
			   	   	<button class="imagebtn" type="submit"><span><img src="./assets/image/delete-big.png"><span></button>
		   	    </form>
		   	    <i class="fa fa-image icon"></i>
				<img src="' . $fila["path"] . '" style="max-height: 200px; margin-right: 5%">';
	}

	function imprimirVistaGestor($array_obras, $array_imagenes, $nombre){
		include 'head.php';
		include 'footer.php';

		imprimirHead();
		$this->imprimirBody($array_obras, $array_imagenes, $nombre);
		imprimirFooter();
	}

	function imprimirBody($array_obras, $array_imagenes, $nombre){
		echo '<body>';

		include 'header.php';

		imprimirHeader($nombre);

		echo'<section class="obras-page page-content no-margin-top">
			<aside class="menu small-width">
	            <p>Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Mendrerit id, lorem. Maecenas nec odio e sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>
	    	</aside>
	    	<div class="categorias small-width">
	        	<p class="title">Algunas Obras</p>
	    		<div class="categorias-cards-container">';

			        for ($i=0; $i < count($array_obras); $i++) { 
			         	# code...
			         	$this->imprimirObra($array_obras[$i], $array_imagenes[$i]);
			        }

			        echo '</div>
			    </div>
			</section>
		</body>';
	}

	function imprimirObra($fila, $imagen){
		echo '<div class="offer-card-container">
	            <div class="photo-container" style="background-image: url(\'' . $imagen . '\');">
	                <div class="discount"><p>' . $fila["id"] . '</p></div>
	            </div>
	            <div class="info-container">
	            	<div class="title"><a href=index.php?obra=' . $fila["id"] . '>' . $fila["titulo"] . ' | <span class="smaller-txt">' . $fila["autor"] . '</span>
	                    <p class="parrafo">' . $fila["datacion"] . '</p></a>
	                    <form class="form-comment" action="' . $_SERVER["PHP_SELF"] . '" method="POST">
			   	        	<input type="text" name="id" style="display: none;" value="' . $fila["id"] . '"></input>
			   	        	<input type="text" name="uri" style="display: none;" value="' . $_SERVER["REQUEST_URI"] . '"></input>
			   	        	<input type="text" name="accion" style="display: none;" value="add"></input>
			   	        	<button type="submit"><span><img src="./assets/image/add-big.png" style="cursor:pointer;"><span></button>
		   	        	</form>
	                    <form class="form-comment" action="' . $_SERVER["PHP_SELF"] . '" method="POST">
			   	        	<input type="text" name="id" style="display: none;" value="' . $fila["id"] . '"></input>
			   	        	<input type="text" name="uri" style="display: none;" value="' . $_SERVER["REQUEST_URI"] . '"></input>
			   	        	<input type="text" name="accion" style="display: none;" value="edit"></input>
			   	        	<button type="submit"><span><img src="./assets/image/edit-big.png" style="cursor:pointer;"><span></button>
		   	        	</form>
		   	        	<form class="form-comment" action="./backend/deleteObra.php" method="POST">
			   	        	<input type="text" name="id" style="display: none;" value="' . $fila["id"] . '"></input>
			   	        	<input type="text" name="uri" style="display: none;" value="' . $_SERVER["REQUEST_URI"] . '"></input>
			   	        	<button type="submit"><span><img src="./assets/image/delete-big.png" style="cursor:pointer;"><span></button>
		   	        	</form>
	                </div>
                </div>
            </div>';
	}
}
?>