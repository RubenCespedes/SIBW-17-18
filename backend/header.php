<?php
	function imprimirHeader($nombre){

		echo "<header>
	        <div class='header-wrapper medium-width inline'>
	    		<a href=\"index.php\"><div class='logo-container'>
	    			<img src=\"./assets/image/logo.png\">
	    		</div></a>
	            <div class='title-container'>
	                <a href=\"index.php\"><h1>Modern Museum</h1></a>
	            </div>
	    		<div class='links-container'>
	    			<ul>
	    				<li><a class= \"no-select\" href=\"\">Colecciones</a></li>
    				    <li><a class= \"no-select\" href=\"index.php?pagina=aboutus\">About us</a></li>
    				    <li><a class= \"no-select\" href=\"\">Contacto</a></li>
	    			</ul>
	    		</div>
	        </div>

	        <div id='user-container' class=\"user-container\">
			    <a href='controladorBackend.php'>
			    	<img src=\"img_avatar.png\" alt=\"Avatar\">
			    	<span>" . $nombre . "</span>
				</a>
			</div>

			<!-- Button to logout session -->
			<form id='formLogout' class=\"formLogout\" action=\"logout.php\" method=\"post\">
				<input type='text' name='uri' value='http://localhost' style='display: none'>
				<button type=\"submit\" class=\"logoutbtn\">Log Out</button>
			</form>
	    </header>";
	}
?>