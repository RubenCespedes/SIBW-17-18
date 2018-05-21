<?php
class Vista {
	function Vista(){

	}

	function imprimirVistaModerador($array_comments, $nombre){
		include 'head.php';
		include 'footer.php';

		imprimirHead();
		$this->imprimirBody($array_comments, $nombre);
		imprimirFooter();
	}

	function imprimirBody($array_comments, $nombre){
		echo '<body>';

		include 'header.php';

		imprimirHeader($nombre);

		echo'<section class="lista_comentarios-page page-content no-margin-top">
				<aside class="menu small-width">
			        <p>Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Mendrerit id, lorem. Maecenas nec odio e sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>
			    </aside>
			        
			    <div class="general small-width">
			        <p class="title">Comentarios</p>
			        
			        <div class="general-comments-container">';

			        for ($i=0; $i < count($array_comments); $i++) { 
			         	# code...
			         	$this->imprimirComentario($array_comments[$i]);
			        }

			        echo '
			        
			            <div class="comment-container-flex">
			        		<div class="child1"><img src="./assets/image/comment.png"></div>
			                <div class="child2">
			                    <div class="title"><p>20/05/18</p></div>
			                    <div class="normal"><p>Carlos Entrena Serrano</p></div>
		   	                    <a><div class="comment"><p>Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa</p></div></a>
			                </div>
			            </div>
			        	
			        	<div class="comment-container-flex">
			            	<div class="child1"><img src="./assets/image/comment.png"></div>
			            	<div class="child2">
				                <div class="title"><p>19/05/18</p></div>
			                	<div class="normal"><p>Carlos Entrena Serrano</p></div>
		   	                	<a><div class="comment"><p>Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa</p></div></a>
			            	</div>            
			        	</div>
			        
			        	<div class="comment-container-flex">
			                <div class="child1"><img src="./assets/image/comment.png"></div>
			                <div class="child2">
			                    <div class="title"><p>18/05/18</p></div>
			                    <div class="normal"><p>Carlos Entrena Serrano</p></div>
		   	                    <a><div class="comment"><p>Sidebar de prueba. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa</p></div></a>
			                </div>    
			            </div>
			        </div>
			    </div>
			</section>
		</body>';
	}

	function imprimirComentario($fila){
		echo '<div class="comment-container-flex">
			    <div class="child1"><img src="./assets/image/comment.png"></div>
			    <div class="child2">
			        <div class="title"><p>' . $fila["fecha"] . '</p></div>
			        <div class="normal"><p>' . $fila["autor"] . '</p></div>
		   	        <a><div class="comment"><p>' . $fila["texto"] . '</p></div></a>
		   	        <form class="form-comment" action="./backend/editComment.php" method="POST">
		   	        	<input type="text" name="id" style="display: none;" value="' . $fila["id"] . '"></input>
		   	        	<input type="text" name="uri" style="display: none;" value="' . $_SERVER["REQUEST_URI"] . '"></input>
		   	        	<button type="submit"><span><img src="./assets/image/edit.png"><span></button>
		   	        </form>
		   	        <form class="form-comment" action="./backend/deleteComment.php" method="POST">
		   	        	<input type="text" name="id" style="display: none;" value="' . $fila["id"] . '"></input>
		   	        	<input type="text" name="uri" style="display: none;" value="' . $_SERVER["REQUEST_URI"] . '"></input>
		   	        	<button type="submit"><span><img src="./assets/image/delete.png"><span></button>
		   	        </form>
			    </div>
			</div>';
	}
}
?>