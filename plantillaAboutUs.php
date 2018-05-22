<?php


class Vista {
    function Vista(){

    }

    function imprimirAboutUs(){
        include 'head.php';
        include 'header.php';
        include 'footer.php';

        imprimirHead();

        echo "<body>";

        imprimirHeader();

        echo "</body>";

        echo '<section class="aboutus-page page-content no-margin-top">
        <div class="top-photo big-width" style="background-image: url(\'assets/image/aboutus.jpg\');"></div>
        <div class="wellcome-container small-width">
            <p class="title">Bienvenido al hotel</p>
            <p class="description">Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe parte dellas.</p>
            <p class="description">Una mañana, tras un sueño intranquilo, Gregorio Samsa se despertó convertido en un monstruoso insecto. Estaba echado de espaldas sobre un duro caparazón</p>
        </div>
        <div class="enviar-mensaje"> <a href="contact.php">¡Envíanos un mensaje!</a></div>
        <div class="direction-container small-width">
            <p class="title">A 5 minutos del centro histórico</p>
            <p class="direction">
                <span class="bigger-txt">Dirección:</span> C/ Plaza Flores, 8 . España, Almería - Almería
            </p>
            <div class="map-container">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2234.125864150221!2d-3.191356584253135!3d55.947190380605875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887c784d1bae421%3A0x88cc2703f2beb5c3!2sMuseo+de+Escocia!5e0!3m2!1ses!2ses!4v1524490492719" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>            </div>
        </div>
    </section>';

        imprimirFooter();
    }
}
?>