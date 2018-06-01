<?php
class Vista {
	function Vista(){

	}

	function imprimirIndex($ids, $paths, $titulos, $autores, $id_obras){
		include 'head.php';
		include 'header.php';
		include 'footer.php';
		include 'sidebar.php';

		imprimirHead();

		echo "<body>";

		imprimirHeader();


		echo '<section class="index-page page-content">';

		imprimirSidebar();

		echo '<div class="categorias small-width">
	            <p class="title">Algunas Obras</p>
	            <div class="categorias-cards-container">';

		for($x = 0; $x < count($ids); $x++){
		    $this->imprimirObra($ids[$x], $paths[$x], $titulos[$x], $autores[$x], $x+1);
        }

	            echo '</div>
	        </div>
	    </section>';

	    imprimirFooter();

        echo "</body>";
	}

	function imprimirObra($id, $path, $titulo, $autor, $num){
	    echo '<div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $path . '\');">
	                        <div class="discount"><p>' . $num . '</p></div>
	                    </div>
	                    <div class="title"><a href=index.php?obra=' . $id . '>' . $titulo . ' | <span class="smaller-txt">' . $autor . '</span></a></div>
	                </div>';
    }
}
?>