-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 12:46 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibw`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `nombre` char(255) COLLATE utf8_spanish_ci NOT NULL,
  `biografia` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`nombre`, `biografia`) VALUES
('Edvard Munch', 'En el año 1879 comienza la carrera de ingeniería, pero unos años más tarde la deja para empezar su carrera artística que le abrió el camino al desarrollo del expresionismo, hasta que en el año 1881 vende dos cuadros y pinta su primer autorretrato. El pintor naturalista noruego Christian Krohg fue un maestro esencial para Munch que en gran variedad de ocasiones corregía sus trabajos y le ayudaba a mejorar. Participó por primera vez en la exposición de otoño de Cristianía (Oslo) donde estableció relaciones con el círculo de literatos y artistas de la capital'),
('Leonardo da Vinci', 'El joven Leonardo era un amante de la naturaleza, que observaba con gran curiosidad. Dibujaba caricaturas y practicaba la escritura especular en dialecto toscano. A partir de 1469, Leonardo entró como aprendiz a uno de los talleres de arte más prestigiosos bajo el magisterio de Andrea del Verrocchio, a quien debe parte de su excelente formación multidisciplinaria, en la que se aproxima a otros artistas como Sandro Botticelli, Perugino y Domenico Ghirlandaio. En efecto, a finales de 1468, aunque Leonardo estaba empadronado como residente del municipio de Vinci, viajaba muy a menudo a Florencia, donde su padre trabajaba.'),
('Pablo Picasso', 'En el invierno de 1895 realizó su primer gran lienzo académico, La primera comunión (Museo Picasso, Barcelona),​ en Barcelona, ciudad en la que residió unos nueve años, salvo algunas vacaciones de verano y estancias más o menos largas en Madrid y París. En 1897 presentó el lienzo Ciencia y caridad (Museo Picasso, Barcelona) en la Exposición General de Bellas Artes de Madrid. Durante el verano pasó, una vez más, sus vacaciones en Málaga, donde pintó paisajes y corridas de toros'),
('Salvador Dalí', 'En 1922 Dalí se alojó en la célebre Residencia de Estudiantes de Madrid para comenzar sus estudios en la Real Academia de Bellas Artes de San Fernando. Dalí enseguida atrajo la atención por su carácter de excéntrico dandi. Lucía una larga melena con patillas, gabardina, medias y polainas al estilo de los artistas victorianos. Sin embargo, fueron sus pinturas, en las que Dalí tanteaba el cubismo, las que llamaron la atención de sus compañeros de residencia, entre los que se incluían futuras figuras del arte español, como Federico García Lorca, Pepín Bello o Luis Buñuel. En aquella época, sin embargo, es posible que Dalí no entendiese completamente los principios cubistas: sus únicas fuentes eran artículos publicados en la prensa y un catálogo que le había dado Pichot, puesto que en el Madrid de aquella época no había pintores cubistas.'),
('Vincent van Gogh', 'Desde muy joven mostró un carácter difícil y un temperamento fuerte. Tras abandonar los estudios y después de un año en Zundert, van Gogh empezó a trabajar en 1869, a la edad de 16 años, como aprendiz en Goupil & Co. (más tarde Boussod & Valadon), una importante compañía internacional de comercio de arte de La Haya de la que su tío Vincent fue socio');

-- --------------------------------------------------------

--
-- Table structure for table `autortieneobras`
--

CREATE TABLE `autortieneobras` (
  `id_obra` bigint(20) UNSIGNED NOT NULL,
  `nombre_autor` char(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `autortieneobras`
--

INSERT INTO `autortieneobras` (`id_obra`, `nombre_autor`) VALUES
(1, 'Leonardo da Vinci'),
(2, 'Leonardo da Vinci'),
(3, 'Leonardo da Vinci'),
(4, 'Pablo Picasso'),
(5, 'Pablo Picasso'),
(6, 'Salvador Dalí'),
(7, 'Salvador Dalí'),
(8, 'Salvador Dalí'),
(9, 'Salvador Dalí'),
(10, 'Salvador Dalí'),
(11, 'Vincent van Gogh'),
(12, 'Vincent van Gogh'),
(13, 'Edvard Munch');

-- --------------------------------------------------------

--
-- Table structure for table `coleccion`
--

CREATE TABLE `coleccion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` char(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `coleccion`
--

INSERT INTO `coleccion` (`id`, `nombre`) VALUES
(1, 'cubismo'),
(2, 'impresionismo alemán'),
(3, 'surrealismo'),
(4, 'postimpresionismo');

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `autor` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `texto` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id`, `autor`, `fecha`, `hora`, `texto`) VALUES
(1, 'Manolo Rivas Maldonado', '2018-04-17', '02:04:00', '¡La Gioconda es fantástica!'),
(2, 'Manolo Rivas Maldonado', '2018-04-17', '02:06:00', '¡La última cena es fantástica!'),
(3, 'Manolo Rivas Maldonado', '2018-04-17', '02:07:00', '¡El Hombre de Vitruvio es fantástico!'),
(4, 'Manolo Rivas Maldonado', '2018-04-17', '02:08:00', '¡El Guernica es fantástico!'),
(5, 'Manolo Rivas Maldonado', '2018-04-17', '02:09:00', '¡Las señoritas de Avignon son fantásticas!'),
(6, 'Juan Martinez', '2018-04-17', '02:09:00', '¡La persistencia de la memoria es una rallada!'),
(7, 'Juan Martinez', '2018-04-17', '02:11:00', '¡El Gran Masturbador es de un guarro!'),
(8, 'Juan Martinez', '2018-04-17', '02:11:00', '¡La Cara de la Guerra es demasiado oscura!'),
(9, 'Juan Martinez', '2018-04-17', '02:12:00', '¡El torero alucinógeno, vaya nombre!'),
(10, 'Juan Martinez', '2018-04-17', '02:13:00', '¡La desintegración de la persistencia de la memoria de Dalí es otra rallada! Pero mola'),
(11, 'Andrea Fernandez', '2018-04-17', '02:14:00', '¡La noche estrellada es muy bonita!'),
(12, 'Andrea Fernandez', '2018-04-17', '02:14:00', '¡La Casa Amarilla no me gusta demasiado!'),
(13, 'Andrea Fernandez', '2018-04-17', '02:15:00', '¡El grito mola mazo!'),
(14, 'Andrea Fernandez', '2018-04-17', '02:15:00', '¡La Gioconda tiene una sonrisa cautivadora!'),
(15, 'Andrea Fernandez', '2018-04-10', '02:16:00', '¡La última cena tuvo que estar chula!'),
(16, 'Marta Guirado', '2018-04-17', '02:17:00', '¡Al Hombre de Vitruvio se le ve el pito!'),
(17, 'Marta Guirado', '2018-04-17', '02:17:00', '¡El Guernica se pintó durante la Guerra Civil!'),
(18, 'Marta Guirado', '2018-04-17', '02:18:00', '¡Las señoritas de Avignon eran muy coquetas!'),
(19, 'Marta Guirado', '2018-04-17', '02:18:00', '¡La persistencia de la memoria me deja boquiabierta!'),
(20, 'Marta Guirado', '2018-04-17', '02:19:00', '¡El gran masturbador, que guarro el autor!'),
(21, 'Irene Contreras', '2018-04-17', '02:19:00', '¡La Cara de la Guerra no me gusta!'),
(22, 'Irene Contreras', '2018-04-17', '02:20:00', '¡El torero alucinógeno es un artista!'),
(23, 'Irene Contreras', '2018-04-17', '02:21:00', '¡La desintegración de la persistencia de la memoria es mi obra favorita!'),
(24, 'Irene Contreras', '2018-04-17', '02:21:00', '¡La noche estrellada se hizo durante el día!'),
(25, 'Irene Contreras', '2018-04-17', '02:22:00', '¡La Casa Amarilla lo mismo no era amarilla!'),
(26, 'Manolo Rivas Maldonado', '2018-04-22', '01:48:00', '¡La Gioconda tiene una sonrisa misteriosa!');

-- --------------------------------------------------------

--
-- Table structure for table `imagen`
--

CREATE TABLE `imagen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` char(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `imagen`
--

INSERT INTO `imagen` (`id`, `path`) VALUES
(1, './images/la_gioconda_1.jpg'),
(2, './images/la_gioconda_2.jpg'),
(3, './images/la_gioconda_3.jpg'),
(4, './images/la_ultima_cena_1.jpg'),
(5, './images/la_ultima_cena_2.jpg'),
(6, './images/hombre_de_vitruvio_1.jpg'),
(7, './images/hombre_de_vitruvio_2.jpg'),
(8, './images/hombre_de_vitruvio_3.jpg'),
(9, './images/guernica_1.jpg'),
(10, './images/guernica_2.jpg'),
(11, './images/guernica_3.jpg'),
(12, './images/las_señoritas_de_avignon_1.jpg'),
(13, './images/las_señoritas_de_avignon_2.jpg'),
(14, './images/las_señoritas_de_avignon_3.jpg'),
(15, './images/la_persistencia_de_la_memoria_1.jpg'),
(16, './images/la_persistencia_de_la_memoria_2.jpg'),
(17, './images/la_persistencia_de_la_memoria_3.jpg'),
(18, './images/el_gran_masturbador_1.jpg'),
(19, './images/el_gran_masturbador_2.jpg'),
(20, './images/el_gran_masturbador_3.jpg'),
(21, './images/la_cara_de_la_guerra_1.jpg'),
(22, './images/la_cara_de_la_guerra_2.jpg'),
(23, './images/la_cara_de_la_guerra_3.jpg'),
(24, './images/el_torero_alucinogeno_1.jpg'),
(25, './images/el_torero_alucinogeno_2.jpg'),
(26, './images/el_torero_alucinogeno_3.jpg'),
(27, './images/la_desintegracion_de_la_persistencia_de_la_memoria_1.jpg'),
(28, './images/la_desintegracion_de_la_persistencia_de_la_memoria_2.jpg'),
(29, './images/la_desintegracion_de_la_persistencia_de_la_memoria_3.jpg'),
(30, './images/la_noche_estrellada_1.jpg'),
(31, './images/la_noche_estrellada_2.jpg'),
(32, './images/la_noche_estrellada_3.jpg'),
(33, './images/la_casa_amarilla_1.jpg'),
(34, './images/la_casa_amarilla_2.jpg'),
(35, './images/el_grito_1.jpg'),
(36, './images/el_grito_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `obra`
--

CREATE TABLE `obra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` char(255) COLLATE utf8_spanish_ci NOT NULL,
  `autor` char(255) COLLATE utf8_spanish_ci NOT NULL,
  `datacion` smallint(4) NOT NULL,
  `descripcion` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `obra`
--

INSERT INTO `obra` (`id`, `titulo`, `autor`, `datacion`, `descripcion`) VALUES
(1, 'La Gioconda', 'Leonardo da Vinci', 1503, 'El Retrato de Lisa Gherardini, esposa de Francesco del Giocondo,​ más conocido como La Gioconda (La Joconde en francés), o Mona Lisa, es una obra pictórica del pintor renacentista italiano Leonardo da Vinci. Fue adquirida por el rey Francisco I de Francia a principios del siglo XVI y desde entonces es propiedad del Estado Francés. Se exhibe en el Museo del Louvre de París.\r\n\r\nSu nombre, La Gioconda (la alegre, en castellano), deriva de la tesis más aceptada acerca de la identidad de la modelo: la esposa de Francesco Bartolomeo de Giocondo, que realmente se llamaba Lisa Gherardini, de donde viene su otro nombre: Mona (señora, en el italiano antiguo) Lisa. El Museo del Louvre acepta el título completo indicado al principio como el título original de la obra, aunque no reconoce la identidad de la modelo y tan solo la acepta como una hipótesis.'),
(2, 'La última cena', 'Leonardo da Vinci', 1495, 'La última cena (en italiano: Il cenacolo o L’ultima cena) es una pintura mural original de Leonardo da Vinci ejecutada entre 1495 y 1497. Se encuentra en la pared sobre la que se pintó originariamente, en el refectorio del convento dominico de Santa Maria delle Grazie, en Milán (Italia), declarado Patrimonio de la Humanidad por la Unesco en 1980. La pintura fue elaborada para su patrón, el duque Ludovico Sforza de Milán. No es un fresco tradicional, sino un mural ejecutado al temple y óleo sobre dos capas de preparación de yeso extendidas sobre enlucido. Mide 460 cm de alto por 880 cm de ancho. Muchos expertos e historiadores del arte consideran La última cena como una de las mejores obras pictóricas del mundo.'),
(3, 'Hombre de Vitruvio', 'Leonardo da Vinci', 1490, 'El Hombre de Vitruvio o Estudio de las proporciones ideales del cuerpo humano es un famoso dibujo acompañado de notas anatómicas de Leonardo da Vinci realizado alrededor del año 1490 en uno de sus diarios. Representa una figura masculina desnuda en dos posiciones sobreimpresas de brazos y piernas e inscrita en una circunferencia y un cuadrado (\'Ad quadratum\'). Se trata de un estudio de las proporciones del cuerpo humano, realizado a partir de los textos de arquitectura de Vitruvio, arquitecto de la antigua Roma, del cual el dibujo toma su nombre.\r\n\r\nPerteneció a la colección del escritor y pintor Giuseppe Bossi hasta que, tras su muerte acaecida en 1815, su colección fue comprada en una subasta por Luigi Celotti y posteriormente adquirida por la Galería de la Academia de Venecia, donde se conserva desde 1822, aunque se exhibe al público rara vez por motivos de conservación. Por esta razón no es parte de la exposición habitual del museo.'),
(4, 'Guernica', 'Pablo Picasso', 1937, 'Guernica es un famoso cuadro de Pablo Picasso, pintado entre los meses de mayo y junio de 1937, cuyo título alude al bombardeo de Guernica, ocurrido el 26 de abril de dicho año (1937), durante la guerra civil española. Fue realizado por encargo del Director General de Bellas Artes, Josep Renau a petición del Gobierno de la Segunda República Española para ser expuesto en el pabellón español durante la Exposición Internacional de 1937 en París, con el fin de atraer la atención del público hacia la causa republicana en plena guerra civil española.'),
(5, 'Las señoritas de Avignon', 'Pablo Picasso', 1907, 'Las señoritas de Avignon, Las señoritas de Aviñón o, más correctamente, Las señoritas de la calle de Avinyó,​ es un cuadro del pintor español Pablo Picasso pintado en 1907 al óleo sobre lienzo y sus medidas son 243,9 x 233,7 cm. Se conserva en el Museo de Arte Moderno de Nueva York.'),
(6, 'La persistencia de la memoria', 'Salvador Dalí', 1931, 'La persistencia de la memoria, conocido también como Los relojes blandos​ o Los relojes derretidos es un famoso cuadro del pintor español Salvador Dalí pintado en 1931. Realizado mediante la técnica del óleo sobre lienzo, es de estilo surrealista y sus medidas son 24 x 33 cm. La pintura fue exhibida en la primera exposición individual de Dalí en la Galerie Pierre Colle de París,​ del 3 al 15 de junio de 1931, y en enero de 1932 en una exposición en la Julien Levy Gallery de Nueva York, Surrealism: Paintings, Drawings and Photographs. Se conserva en el MoMA (Museo de Arte Moderno) de Nueva York, donde llegó en 1934.​ En una revisión posterior del cuadro, Dalí creó La desintegración de la persistencia de la memoria.'),
(7, 'El gran masturbador', 'Salvador Dalí', 1929, 'El gran masturbador es un famoso cuadro del pintor español Salvador Dalí pintado en 1929. Está hecho mediante la técnica del óleo sobre lienzo, es de estilo surrealista y sus medidas son 110 x 150 cm. Se conserva en Madrid, en el Museo Reina Sofía pues fue legado por Dalí a España.'),
(8, 'La Cara de la Guerra', 'Salvador Dalí', 1940, 'Dalí representa un rostro sin cuerpo flotando en un paisaje desolador de un desierto. El rostro se marchita como la de un cadáver y tiene una expresión de miseria, angustia, llanto y dolor. En su boca y cuencas de los ojos muestra caras idénticas, en un proceso que parece ser infinito.\r\n\r\nEn torno a la cara grande aparece un enjambre de serpientes picando el rostro. Utiliza colores ocres y en algunos momentos oscuros, con un discreto tinte azul del cielo.\r\n\r\nEn la esquina inferior derecha hay una impresión de la mano que Dalí insistía fue dejado por su propia mano.'),
(9, 'El torero alucinógeno', 'Salvador Dalí', 1968, 'En este gran lienzo, en el cual trabajó el artista durante bastante tiempo, aparecen muchas de las imágenes favoritas de Dalí, entremezcladas en un juego de alusiones múltiples que van desde los cuadros más antiguos hasta los experimentos de violenta descomposición de las figuras que caracterizan su periodo llamado de la \"mística nuclear\". Entre ellas se pueden reconocer el rostro de Gala, el busto de Voltaire y la figura del niño con traje de marinero el artista de pequeño, que ya aparecía en El espectro del sex appeal, de 1943.'),
(10, 'La desintegración de la persistencia de la memoria', 'Salvador Dalí', 1952, 'En 1931 Salvador Dalí realizaba una de sus obras más conocidas en todo el mundo, La persistencia de la memoria. No sólo por el aspecto de esos objetos sino porque llevaban a una interpretación metafísica: la única certeza del hombre moderno, el reloj, también es su mayor esclavitud. Al derretir los relojes que aparecían en dicho cuadro, Dalí se rebelaba contra esa inmensa convención humana -seguramente, la mayor de todas- que es el tiempo. Veinte años más tarde retoma ese argumento aunque ya adopta otro punto de vista. En el cuadro de 1931 los componentes oníricos, derivados del inconsciente, eran prioritarios y declaraban el trabajo de Dalí con el grupo surrealista.'),
(11, 'La noche estrellada', 'Vincent van Gogh', 1889, 'La noche estrellada (en neerlandés De sterrennacht) es la obra maestra del pintor postimpresionista Vincent van Gogh. El cuadro lo realizó en el sanatorio Saint-Rémy-de-Provence, donde se recluyó hacia el final de su vida. Fue pintada a mediados de 1889, trece meses antes de la muerte de van Gogh. Desde 1941 forma parte de la colección permanente del Museo de Arte Moderno de Nueva York. Considerado como el magnum opus de van Gogh, el cuadro ha sido reproducido en numerosas ocasiones y es conocida como una de las pinturas mas famosas de la historia. Usó óleo humedecido y pinceles finos para realizar la obra.'),
(12, 'La Casa Amarilla', 'Vincent van Gogh', 1888, 'La casa amarilla es el título dado a una pintura al óleo del pintor holandés postimpresionista Vincent van Gogh, realizada en el año 1888. La casa albergaba el estudio que alquiló en el mes de septiembre, ya que deseaba arraigar en una casa que sintiese como propia. Allí se trasladó el día 17, y sus cartas reflejan el optimismo que le embargaba entonces.'),
(13, 'El grito', 'Edvard Munch', 1893, 'Es sin duda su obra más famosa. Influenciado por Van Gogh, Gauguin o Manet, Munch, el precursor del expresionismo en el arte moderno, pintó este óleo bautizado como “El grito” que forma parte de cuatro cuadros o versiones. Esta, la más famosa, de 1893, se encuentra en la Galería Nacional de Noruega. En ella aparece una figura andrógina en primer plano, símbolo de una profunda angustia y desesperación existencial; el fondo del cuadro representa Oslo, la capital de Noruega, vista desde la colina de Ekeberg. El grito se considera un icono cultural como la Gioconda de Da Vinci.');

-- --------------------------------------------------------

--
-- Table structure for table `obrapertenececoleccion`
--

CREATE TABLE `obrapertenececoleccion` (
  `id_obra` bigint(20) UNSIGNED NOT NULL,
  `id_coleccion` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `obrapertenececoleccion`
--

INSERT INTO `obrapertenececoleccion` (`id_obra`, `id_coleccion`) VALUES
(4, 1),
(5, 1),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 4),
(12, 4),
(13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `obratienecomentarios`
--

CREATE TABLE `obratienecomentarios` (
  `id_comentario` bigint(20) UNSIGNED NOT NULL,
  `id_obra` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `obratienecomentarios`
--

INSERT INTO `obratienecomentarios` (`id_comentario`, `id_obra`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 1),
(15, 2),
(16, 3),
(17, 4),
(18, 5),
(19, 6),
(20, 7),
(21, 8),
(22, 9),
(23, 10),
(24, 11),
(25, 12),
(26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `obratieneimagenes`
--

CREATE TABLE `obratieneimagenes` (
  `id_imagenes` bigint(20) UNSIGNED NOT NULL,
  `id_obra` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `obratieneimagenes`
--

INSERT INTO `obratieneimagenes` (`id_imagenes`, `id_obra`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 3),
(7, 3),
(8, 3),
(9, 4),
(10, 4),
(11, 4),
(12, 5),
(13, 5),
(14, 5),
(15, 6),
(16, 6),
(17, 6),
(18, 7),
(19, 7),
(20, 7),
(21, 8),
(22, 8),
(23, 8),
(24, 9),
(25, 9),
(26, 9),
(27, 10),
(28, 10),
(29, 10),
(30, 11),
(31, 11),
(32, 11),
(33, 12),
(34, 12),
(35, 13),
(36, 13);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` char(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` char(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`) VALUES
(1, 'Manolo Rivas Maldonado', 'manolo_rivas@gmail.com'),
(2, 'Juan Martinez', 'juan_martinez@gmail.com'),
(3, 'Andrea Fernandez', 'andrea_fernandez@gmail.com'),
(4, 'Marta Guirado', 'marta_guirado@gmail.com'),
(5, 'Irene Contreras', 'irene_contreras@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usuariorealizadocomentarios`
--

CREATE TABLE `usuariorealizadocomentarios` (
  `id_comentario` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuariorealizadocomentarios`
--

INSERT INTO `usuariorealizadocomentarios` (`id_comentario`, `id_usuario`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`nombre`);

--
-- Indexes for table `autortieneobras`
--
ALTER TABLE `autortieneobras`
  ADD PRIMARY KEY (`id_obra`);

--
-- Indexes for table `coleccion`
--
ALTER TABLE `coleccion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `obrapertenececoleccion`
--
ALTER TABLE `obrapertenececoleccion`
  ADD PRIMARY KEY (`id_obra`);

--
-- Indexes for table `obratienecomentarios`
--
ALTER TABLE `obratienecomentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indexes for table `obratieneimagenes`
--
ALTER TABLE `obratieneimagenes`
  ADD PRIMARY KEY (`id_imagenes`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `usuariorealizadocomentarios`
--
ALTER TABLE `usuariorealizadocomentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coleccion`
--
ALTER TABLE `coleccion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `obra`
--
ALTER TABLE `obra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autortieneobras`
--
ALTER TABLE `autortieneobras`
  ADD CONSTRAINT `autortieneobras_ibfk_1` FOREIGN KEY (`id_obra`) REFERENCES `obra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obrapertenececoleccion`
--
ALTER TABLE `obrapertenececoleccion`
  ADD CONSTRAINT `obrapertenececoleccion_ibfk_1` FOREIGN KEY (`id_obra`) REFERENCES `obra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obratienecomentarios`
--
ALTER TABLE `obratienecomentarios`
  ADD CONSTRAINT `obratienecomentarios_ibfk_1` FOREIGN KEY (`id_comentario`) REFERENCES `comentario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obratieneimagenes`
--
ALTER TABLE `obratieneimagenes`
  ADD CONSTRAINT `obratieneimagenes_ibfk_1` FOREIGN KEY (`id_imagenes`) REFERENCES `imagen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuariorealizadocomentarios`
--
ALTER TABLE `usuariorealizadocomentarios`
  ADD CONSTRAINT `usuariorealizadocomentarios_ibfk_1` FOREIGN KEY (`id_comentario`) REFERENCES `comentario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
