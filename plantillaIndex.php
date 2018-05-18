<?php
class Vista {
	function Vista(){

	}

	function imprimirIndex($paths, $titulos, $autores){
		include 'head.php';
		include 'header.php';
		include 'footer.php';

		imprimirHead();

		echo "<body>";

		imprimirHeader();

		echo "</body>";

			echo '<section class="index-page page-content no-margin-top">

	        <aside class="menu small-width">

	            <p>Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Mendrerit id, lorem. Maecenas nec odio e sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>
	        </aside>
	        <div class="categorias small-width">
	            <p class="title">Últimas ofertas</p>
	            <div class="categorias-cards-container">
	                <div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $paths[0] . '\');">
	                        <div class="discount"><p>1</p></div>
	                    </div>
	                    <div class="title">' . $titulos[0] . ' | <span class="smaller-txt">' . $autores[0] . '</span></div>
	                </div>
	                <div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $paths[1] . '\');">
	                        <div class="discount"><p>2</p></div>
	                    </div>
	                    <div class="title">' . $titulos[1] . ' | <span class="smaller-txt">' . $autores[1] . '</span></div>
	                </div>
	                <div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $paths[2] . '\');">
	                        <div class="discount"><p>3</p></div>
	                    </div>
	                    <div class="title">' . $titulos[2] . ' | <span class="smaller-txt">' . $autores[2] . '</span></div>
	                </div>
	                <div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $paths[3] . '\');">
	                        <div class="discount"><p>4</p></div>
	                    </div>
	                    <div class="title">' . $titulos[3] . ' | <span class="smaller-txt">' . $autores[3] . '</span></div>
	                </div>
	                <div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $paths[4] . '\');">
	                        <div class="discount"><p>5</p></div>
	                    </div>
	                    <div class="title">' . $titulos[4] . ' | <span class="smaller-txt">' . $autores[4] . '</span></div>
	                </div>
	                <div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $paths[5] . '\');">
	                        <div class="discount"><p>6</p></div>
	                    </div>
	                    <div class="title">' . $titulos[5] . ' | <span class="smaller-txt">' . $autores[5] . '</span></div>
	                </div>
	                <div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $paths[6] . '\');">
	                        <div class="discount"><p>7</p></div>
	                    </div>
	                    <div class="title">' . $titulos[6] . ' | <span class="smaller-txt">' . $autores[6] . '</span></div>
	                </div>
	                <div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $paths[7] . '\');">
	                        <div class="discount"><p>8</p></div>
	                    </div>
	                    <div class="title">' . $titulos[7] . ' | <span class="smaller-txt">' . $autores[7] . '</span></div>
	                </div>
	                <div class="offer-card-container">
	                    <div class="photo-container" style="background-image: url(\'' . $paths[8] . '\');">
	                        <div class="discount"><p>9</p></div>
	                    </div>
	                    <div class="title">' . $titulos[8] . ' | <span class="smaller-txt">' . $autores[8] . '</span></div>
	                </div>

	            </div>
	        </div>
	    </section>';

	    imprimirFooter();
	}
}
?>