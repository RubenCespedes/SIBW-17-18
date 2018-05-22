<?php
class Vista {
	function Vista(){

	}

	function imprimirVistaUsuario($nombre, $correo){
		include 'head.php';
		include 'footer.php';

		imprimirHead();
		$this->imprimirBody($nombre, $correo);
		imprimirFooter();
	}

	function imprimirBody($nombre, $correo){
		echo '<body>';

		include 'header.php';

		imprimirHeader($nombre);

		echo'<div class="form-datos">
					<form action="/backend/cambiarUsuario.php" method="POST">
						<h2>Datos personales</h2>
						<div class="input-container">
						    <i class="fa fa-user icon"></i>
						    <input class="input-field" type="text" placeholder="Username" name="usrnm" value="' . $nombre . '">
						</div>
			
						<div class="input-container">
							<i class="fa fa-envelope icon"></i>
							<input class="input-field" type="text" placeholder="Email" name="email" value="' . $correo . '">
						</div>

						<input type="text" name="uri" value="' . $_SERVER["REQUEST_URI"] .'" style="display:none;">
			
						<button type="submit" class="btn">Actualizar datos</button>
					</form>
				</div>
			</body>';
	}
}
?>