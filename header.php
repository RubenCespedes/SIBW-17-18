<?php
	function imprimirHeader(){
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

	        <!-- Button to open the modal Sign Up form -->
			<button onclick=\"document.getElementById('id02').style.display='block'\" class=\"signbtn\">Sign Up</button>

			<!-- The Modal (contains the Sign Up form) -->
			<div id=\"id02\" class=\"modal2\">
			  <span onclick=\"document.getElementById('id02').style.display='none'\" class=\"close\" title=\"Close Sign Up\">&times;</span>
			  
			  <!-- Modal Content -->
			  <form class=\"modal-content\" action=\"validation.php\" method=\"post\">
			    <div class=\"container\">
			      <h1>Sign Up</h1>
			      <p>Please fill in this form to create an account.</p>
			      <hr>
			      <label for=\"firstname\"><b>First Name</b></label>
			      <input type=\"text\" placeholder=\"Enter First Name\" name=\"firstname\" required>

			      <label for=\"lastname\"><b>Last Name</b></label>
			      <input type=\"text\" placeholder=\"Enter Last Name\" name=\"lastname\" required>

			      <label for=\"email\"><b>Email</b></label>
			      <input type=\"text\" placeholder=\"Enter Email\" name=\"email\" required>
			      
			      <label>
			        <input type=\"checkbox\" checked=\"checked\" name=\"remember\" style=\"margin-bottom:15px\"> Remember me
			      </label>

			      <p>By creating an account you agree to our <a href=\"#\" style=\"color:dodgerblue\">Terms & Privacy</a>.</p>

			      <div class=\"clearfix\">
			        <button type=\"button\" onclick=\"document.getElementById('id02').style.display='none'\" class=\"cancelbtn\">Cancel</button>
			        <button type=\"submit\" class=\"signupbtn\">Sign Up</button>
			      </div>
			    </div>
			  </form>
			</div>

	        <!-- Button to open the modal login form -->
			<button class=\"loginbtn\" onclick=\"document.getElementById('id01').style.display='block'\">Login</button>

			<!-- The Modal -->
			<div id=\"id01\" class=\"modal\">
			  <span onclick=\"document.getElementById('id01').style.display='none'\" 
			class=\"close\" title=\"Cerrar login\">&times;</span>

			  <!-- Modal Content -->
			  <form class=\"modal-content animate\" action=\"validation.php\" method=\"post\">
			    <div class=\"imgcontainer\">
			      <img src=\"/images/img_avatar2.png\" alt=\"Avatar\" class=\"avatar\">
			    </div>

			    <div class=\"container\">
			      <label for=\"uname\"><b>Username</b></label>
			      <input type=\"text\" placeholder=\"Enter Username\" name=\"uname\" required>

			      <label for=\"psw\"><b>Password</b></label>
			      <input type=\"password\" placeholder=\"Enter Password\" name=\"psw\" required>

			      <button type=\"submit\">Login</button>
			      <label>
			        <input type=\"checkbox\" checked=\"checked\" name=\"remember\"> Remember me
			      </label>
			    </div>

			    <div class=\"container\" style=\"background-color:#f1f1f1\">
			      <button type=\"button\" onclick=\"document.getElementById('id01').style.display='none'\" class=\"cancelbtn\">Cancel</button>
			      <span class=\"psw\">Forgot <a href=\"#\">password?</a></span>
			    </div>
			  </form>
			</div>
	    </header>";
	}
?>


