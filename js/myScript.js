function mostrarSocialMedia() {
// Get the modal
    var modal = document.getElementById("facebook");

    var i = null;
    // Get the button that opens the modal
        this.i = document.getElementById("FB");


// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
    this.i.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

//var fwords = [ <?php echo implode("','",$imagenes);?> ]

function desplegarComentarios(){
	document.getElementById("contenedor").style.display = "block";
}

function ocultarComentarios(){
	document.getElementById("contenedor").style.display = "none";
}

function forbiddenWords(){
    // Lista de palabras prohibidas
    var fwords= ["hola", "adios", "tu", "yo", "nosotros"];

    // Texto del comentario
    var text = document.getElementById("comentario").value;

    // Palabras por separado
    var words = text.split(" ");

    // Recorremos todas las palabras
    for(j=0; j < words.length; j++){

        // Por cada palabra comprobamos si contiene el patron (palabra prohibida)
        for(i=0; i < fwords.length; i++){
            var patt = new RegExp(fwords[i]);
            var word = words[j];
            var res = patt.test(word);

            if(res == true){
                switch(word.length){
                    case 2:
                        // Sustituimos por **
                        words[j] = "**";
                        break;
                    case 4:
                        // Sustituimos por ****
                        words[j] = "****";
                        break;
                    case 5:
                        // Sustituimos por *****
                        words[j] = "*****";
                        break;
                    case 8:
                        // Sustituimos por ********
                        words[j] = "********";
                        break;
                }
            }
        }
    }

    var words = words.join(" ");

    document.getElementById("comentario").value = words;
    /*var img = [ <?php echo implode("','",$imagenes);?> ]
	var num_palabras = prohibidas.length;
	var i;
	var encontrado = -1;
	var texto = document.getElementById("comentario").value;
	var nuevo_texto;

	for(i=0; i < num_palabras && encontrado === -1; i=i+1){
		encontrado = texto.indexOf(prohibidas[i]);
	}

	if(encontrado !== -1){
		var asteriscos = "*";
		var k;

		for (k=0; k < prohibidas[i-1].length-1; k=k+1) {
            asteriscos += "*";
        }

		nuevo_texto = texto.replace(prohibidas[i-1],asteriscos);

		document.getElementById("comentario").value = nuevo_texto;
	}*/
}

function aniadir_comentario(){
	var nombre, d, fecha, hora, comentario;

    nombre = document.getElementById("nombre").value;
    nombre += " ";
    nombre += document.getElementById("apellidos").value;
    d = new Date();
    fecha = d.getDate();
    fecha += "/";

    if(d.getMonth()+1 < 10){
    	fecha += "0";
    }

    fecha += d.getMonth()+1;
    fecha += "/";
    fecha += d.getFullYear();
    hora = d.getHours();
    hora += ":";
    
    if(d.getMinutes() < 10){
    	hora += "0";
    }
    
    hora += d.getMinutes();
    comentario = document.getElementById("comentario").value;

    var html = document.getElementById("contenedor").innerHTML;
    var indice = html.indexOf("<form");

    var parte1 = html.slice(0,indice);
    var parte2 = html.slice(indice,html.length);

    document.getElementById("contenedor").innerHTML = parte1 + 
    "<div class='comentario'><div class='superior'><div class='autor'><p>AUTOR: " + nombre + 
    "</p></div><div class='contenedor-fecha'><div class='fecha'><p>FECHA: " + fecha + 
    "</p></div><div class='hora'><p>HORA: " + hora + 
    "</p></div></div></div><div class='inferior'><p>" + comentario + 
    "</p></div></div>" +
    parte2;
}

function showResult(str) {
    if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
    }
    
    if (window.XMLHttpRequest)
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    else  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").innerHTML=this.responseText;
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        }
    }
    
    xmlhttp.open("GET","livesearch.php?search="+str,true);
    xmlhttp.send();
}