<?php 
    include 'header.php'; // AQUI SE INCLUYE EL HEAD Y EL HEADER
?>

    <section class="index-page page-content no-margin-top">

        <aside class="menu small-width">

            <p>Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Mendrerit id, lorem. Maecenas nec odio e sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. </p>
        </aside>

        <div class="contenido-obra">

            <!-- CONTENEDOR PARA COMENTARIOS -->
            <div id="contenedor" class="contenedor-comentarios">

                <!-- CRUZ PARA CERRAR -->
                <span class="close" onclick="ocultarComentarios()">&times;</span>

                <!-- COMENTARIO PREDETERMINADO 1 -->
                <div class="comentario">
                    <div class="superior">
                        <div class="autor"><p><strong>AUTOR: nombre apellidos apellidos</p></div>
                        <div class="contenedor-fecha"><div class="fecha"><p>FECHA: dd/mm/aaaa</p></div><div class="hora"><p>HORA: hh:mm</p></div></div>
                    </div>
                    <div class="inferior">
                        <p>Esto es un texto de prueba. Esto es un texto de prueba. Esto es un texto de prueba. Esto es un texto de prueba. Esto es un texto de prueba.</p>
                    </div>
                </div>

                <!-- COMENTARIO PREDETERMINADO 2 -->
                <div class="comentario">
                    <div class="superior">
                        <div class="autor"><p>AUTOR: nombre apellidos apellidos</p></div>
                        <div class="contenedor-fecha"><div class="fecha"><p>FECHA: dd/mm/aaaa</p></div><div class="hora"><p>HORA: hh:mm</p></div></div>
                    </div>
                    <div class="inferior">
                        <p>Esto es un texto de prueba. Esto es un texto de prueba. Esto es un texto de prueba. Esto es un texto de prueba. Esto es un texto de prueba.</p>
                    </div>
                </div>
                
                <form class="form" target="_blank">
                    <label for="fname">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre..." required>

                    <label for="lname">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Introduce tu/s apellido/s..." required>

                    <label for="mail">Correo electronico</label>
                    <input type="email" id="correo" name="correo" placeholder="Introduce tu correo electronico..." required>

                    <label for="comment">Comentario</label>
                    <textarea id="comentario" name="comentario" placeholder="Introduce tu comentario..." onkeyup="deteccion()" required></textarea>

                    <input type="reset" value="Enviar" onclick="aniadir_comentario()">
                </form>
            </div>

        	<!-- IMAGEN DE LA OBRA -->
        	<img src="assets\image\prueba.jpg" alt="AQUI VA LA IMAGEN" width="95%" height="70%">

        	<!-- PIE DE LA IMAGEN DE LA OBRA -->
        	<div class="pie-obra">
        		<p>Pie de imagen</p>
        		<p>Creditos de imagen</p>
        	</div>

        	<!-- AUTOR DE LA OBRA -->
        	<div class="contenedor-autor-obra">
        		<p class="titulo-destacado">AUTOR DE LA OBRA</p>
        		<p class="descripcion-autor">Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. Descripcion del autor de la obra. </p>
        	</div>

        	<!-- DESCRIPCION DE LA OBRA -->
        	<div class="descripcion-obra">
        		<p class="titulo-obra">TITULO DE LA OBRA</p>
    			<p class="datacion-obra">Datacion de la obra</p>
    			<p class="texto-descripcion-obra">Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra. Descripcion de la obra.</p>
        	</div>

        	<!-- BOTONES SOCIALES -->
        	<div class="botones-sociales">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-google"></a>
                <a class="hiperenlace-imprimir">
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
        		<ul class="lista-enlaces-externos">
					<li><a href="#">Enlace externo Enlace externo Enlace externo</a></li>
				  	<li><a href="#">Enlace externo Enlace externo Enlace externo</a></li>
				  	<li><a href="#">Enlace externo Enlace externo Enlace externo</a></li>
				  	<li><a href="#">Enlace externo Enlace externo Enlace externo</a></li>
				</ul>
        	</div>

        </div>
        
    </section>

<?php include 'footer.php';?>