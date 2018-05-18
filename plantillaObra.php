<?php
	class Vista{
		function Vista(){

		}

		function imprimirObra($id, $path, $autor, $biografia, $titulo, $datacion, $descripcion, $ids, $titulo_obras, $autores_comentarios, $fechas_comentarios, $horas_comentarios, $textos_comentarios, $nameErr, $emailErr, $textoErr){
			include 'head.php';
			include 'header.php';
			include 'footer.php';

			imprimirHead();

			echo "<body>";

			imprimirHeader();

			echo '<section class="index-page page-content no-margin-top">

	        <aside class="menu small-width">
	            <p>Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Mendrerit id, lorem. Maecenas nec odio e sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. </p>
	        </aside>

	        <div class="contenido-obra">

	            <!-- CONTENEDOR PARA COMENTARIOS -->
	            <div id="contenedor" class="contenedor-comentarios">

	                <!-- CRUZ PARA CERRAR -->
	                <span class="close" onclick="ocultarComentarios()">&times;</span>';

	                for($x = 0; $x < count($textos_comentarios); $x++){
	                	$this->imprimirComentario($autores_comentarios[$x], $fechas_comentarios[$x], $horas_comentarios[$x], $textos_comentarios[$x]);
	                }
	                
	                echo '<form method="post" class="form" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '?obra=' . $id . '">
	                    <label for="fname">Nombre</label><span class="error">* ' . $nameErr . '</span>
	                    <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre..." required>

	                    <label for="lname">Apellidos</label><span class="error">* ' . $nameErr . '</span>
	                    <input type="text" id="apellidos" name="apellidos" placeholder="Introduce tu/s apellido/s..." required>

	                    <label for="mail">Correo electronico</label><span class="error">* ' . $emailErr . '</span>
	                    <input type="email" id="correo" name="correo" placeholder="Introduce tu correo electronico..." required>

	                    <label for="comment">Comentario</label><span class="error">* ' . $textoErr . '</span>
	                    <textarea id="comentario" name="comentario" placeholder="Introduce tu comentario..." onchange="deteccion()" required></textarea>

	                    <input type="submit" name="submit" value="Enviar">
	                </form>
	            </div>

	        	<!-- IMAGEN DE LA OBRA -->
	        	<div>
	        		<img src="' . $path . '" alt="AQUI VA LA IMAGEN" style="max-width:1060px;max-height:560px;margin-left:30.5%">
	        	</div>

	        	<!-- PIE DE LA IMAGEN DE LA OBRA -->
	        	<div class="pie-obra">
	        		<p>Pie de imagen</p>
	        		<p>Creditos de imagen</p>
	        	</div>

	        	<!-- AUTOR DE LA OBRA -->
	        	<div class="contenedor-autor-obra">
	        		<p class="titulo-destacado">' . $autor . '</p>
	        		<p class="descripcion-autor">' . $biografia . '</p>
	        	</div>

	        	<!-- DESCRIPCION DE LA OBRA -->
	        	<div class="descripcion-obra">
	        		<p class="titulo-obra">' . $titulo . '</p>
	    			<p class="datacion-obra">' . $datacion . '</p>
	    			<p class="texto-descripcion-obra">' . $descripcion . '</p>
	        	</div>

	        	<!-- BOTONES SOCIALES -->
	        	<div class="botones-sociales">
	        	    
	                <a href="#" class="fa fa-facebook" id="FB" onclick="mostrarSocialMedia()"></a>
	                <a href="#" class="fa fa-twitter" id="TWT" onclick="mostrarSocialMedia()"></a>
	                <a href="#" class="fa fa-google"></a>
	                <a href="index.php?obra_imprimir=' . $id .'" class="hiperenlace-imprimir">
	                    <i class="material-icons print">print</i>
	                </a>
	                
	            </div>

	            <!-- CONTENEDOR DEL BOTON DE COMENTARIOS -->
	            <div class="contenedor-boton-comentarios">
	                <button class="boton-comentarios" onclick="desplegarComentarios()">
	                    <p>VER COMENTARIOS</p>
	                </button>
	            </div>

	        	<!-- ENLACES EXTERNOS -->
	        	<div class="enlaces-externos">
	        		<p class="titulo-destacado">Enlaces externos Enlaces externos:</p>
	        		<ul class="lista-enlaces-externos">';

	        			for($x = 0; $x < count($ids); $x++){
	                		$this->imprimirEnlaceExterno($ids[$x], $titulo_obras[$x]);
	                	}

					echo '</ul>
                        </div>
        
                    </div>
                    
                    <div id="facebook" class="modal">
        
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p>Se publicará en Facebook el siguiente mensaje:</p>
                            <p>' . $titulo .' vía @ModernMuseum.</p>
                            <img src="' . $path .'">
                        </div>
                    </div>
                    
                    <div id="twitter" class="modal">
        
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p>Se publicará en Twitter el siguiente mensaje:</p>
                            <p>' . $titulo .' vía @ModernMuseum.</p>
                            <img src="' . $path .'">
                        </div>
                    </div>
                
                </section>
            </body>';

		    imprimirFooter();
		}

		function imprimirEnlaceExterno($id, $titulo_obra){
			echo "<li><a href='index.php?obra=" . $id . "'>" . $titulo_obra . "</a></li>";
		}

		function imprimirComentario($autor, $fecha, $hora, $texto){
			echo '<div class="comentario">
	                    <div class="superior">
	                        <div class="autor"><p><strong>AUTOR: ' . $autor . '</p></div>
	                        <div class="contenedor-fecha"><div class="fecha"><p>FECHA: ' . $fecha . '</p></div><div class="hora"><p>HORA: ' . $hora . '</p></div></div>
	                    </div>
	                    <div class="inferior">
	                        <p>' . $texto . '</p>
	                    </div>
	                </div>';
		}
	}
?>