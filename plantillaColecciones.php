<?php
class Vista {
    function Vista(){

    }

    function imprimirColecciones($paths, $titulos, $autores, $ids, $nombrecoleccion){
        include 'head.php';
        include 'header.php';
        include 'footer.php';
        include 'sidebar.php';

        imprimirHead();

        echo "<body>";

        imprimirHeader();

        echo '<section class="index-page page-content no-margin-top">';

        imprimirSidebar();

        echo '<div class="categorias small-width">
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