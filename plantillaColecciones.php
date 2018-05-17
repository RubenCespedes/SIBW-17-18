<?php
class Vista {
    function Vista(){

    }

    function imprimirColecciones($paths, $titulos, $autores, $ids, $nombrecoleccion){
        include 'head.php';
        include 'header.php';
        include 'footer.php';

        imprimirHead();

        echo "<body>";

        imprimirHeader();

        echo '<section class="index-page page-content no-margin-top">

	        <aside class="menu small-width">
	            <p>Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Mendrerit id, lorem. Maecenas nec odio e sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>
	        </aside>
	        <div class="categorias small-width">
	            <p class="title">' . $nombrecoleccion . '</p>
	            <div class="categorias-cards-container">';

        for ($i = 0; $i < count($titulos); $i++){
            $this->mostrarObra($paths[$i], $titulos[$i], $ids[$i], $autores[$i], $i+1);
        }

        echo '</div>
	        </div>
	    </section>';

        imprimirFooter();

        echo "</body>";
    }

    function mostrarObra($imagen, $titulo, $id, $autor, $num){
        echo'<div class="offer-card-container">
	            <div class="photo-container" style="background-image: url(\'' . $imagen . '\');">
	                <div class="discount"><p>' . $num . '</p></div>
	            </div>
	            <div class="title"><a href="index.php?obra=' . $id . '">' . $titulo . ' | <span class="smaller-txt">' . $autor . '</span></a></div>
	    </div>';
    }


}
?>