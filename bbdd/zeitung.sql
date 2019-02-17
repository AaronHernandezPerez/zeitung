-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2019 a las 19:33:28
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zeitung`
--
CREATE DATABASE IF NOT EXISTS `zeitung` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `zeitung`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(2, 'Política'),
(1, 'Tecnología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `noticia` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editores`
--

DROP TABLE IF EXISTS `editores`;
CREATE TABLE `editores` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `editores`
--

INSERT INTO `editores` (`id`, `username`, `password`, `email`, `nombre`, `apellidos`, `administrador`) VALUES
(1, 'test', '$argon2i$v=19$m=1024,t=2,p=2$TFlZbnMzc2VyUnVVcDFvVQ$F/XUnvveNILmr3Vo55syuNhpu0lc2jfPXD7YbGhrd3U', '12345@test', 'Tessst', 'Test Teeeeest', 1),
(2, 'dani', '$argon2i$v=19$m=1024,t=2,p=2$S0ZTWC5WeUxPUDdwS0VvOA$t+LAyQYs1HLSpGWo7DjPYmhbhI++9BAw8ak3PNh1rgc', '12345@dsad', 'Dani', 'Barriguita', 0),
(3, 'admin', '$argon2i$v=19$m=1024,t=2,p=2$RUw5U1pObXJSUDdVamliRw$a56Gnhn6x3JO3SQ4mGG1kZZB7KWSZJ7e8EJdk1UIuJQ', '1234@email', '1234', '1234 Dasd Asd As Das', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cabecera` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cuerpo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `autor`, `categoria`, `titulo`, `cabecera`, `cuerpo`, `fecha`) VALUES
(1, 1, 2, 'Pedro Sánchez convoca elecciones generales anticipadas el 28 de abril', 'Las elecciones generales serán el 28 de abril, justo después de la Semana Santa y menos de un mes antes de las municipales, autonómicas y europeas del 26 de mayo. El presidente del Gobierno, Pedro Sánchez, ha desvelado la incógnita este viernes sobre unos comicios a los que ha dicho que se ha visto abocado después de que sus Presupuestos no salieran adelante. \"Voy a, de forma humilde, pedir la confianza de los españoles\", ha indicado.', '<p>Las elecciones generales serán el&nbsp;28 de abril, justo después de la Semana Santa y menos de un mes antes de las municipales, autonómicas y europeas del 26 de mayo. El presidente del Gobierno, Pedro Sánchez, ha desvelado la incógnita este viernes sobre unos comicios a los que ha dicho que se ha visto abocado después de que sus Presupuestos no salieran adelante.&nbsp;\"Voy a, de forma humilde, pedir la confianza de los españoles\", ha indicado.</p><p>Sánchez se convirtió en presidente del Gobierno en pasado&nbsp;2 de junio&nbsp;a través de una&nbsp;moción de censura&nbsp;contra Mariano Rajoy cuya legitimidad se ha cuidado mucho en defender este viernes, frente a los ataques constantes de&nbsp;PP&nbsp;y&nbsp;Ciudadanos&nbsp;por este motivo. Antes de ganarla, afirmó que su intención era convocar elecciones \"cuanto antes\", pero a mitad de junio indicó que pretendía \"agotar la legislatura\", es decir, no convocar hasta 2020.</p><p>\"El Gobierno nos hemos topado con un bloqueo en forma de rechazo a los Presupuestos más sociales\", ha explicado. En ese caso \"la disyuntiva que se nos plantea es clara como Gobierno, o continuar con unos presupuestos que no son los nuestros o creer como creo que España necesita avanzar, no dar pasos atrás\".</p><p><br></p><p>\"De las dos opciones, no hacer nada y continuar si presupuestos o convocar y dar la palabra a los españoles, elijo la segunda\", ha concluido en una comparecencia tras una sesión extraordinaria del Consejo de Ministros a los que ha informado de la decisión. Después, lo ha comunicado al Rey y el 5 de marzo se disolverán las Cortes, 54 días antes de los comicios, mediante un real decreto ley. Sánchez ha terminado su intervención a la prensa asegurando que \"ha sido un placer\".</p><p><br></p><h2>Sin Presupuestos</h2><p><br></p><p>El rechazo a los Presupuestos esta semana en el Congreso tuvo dos protagonistas principales. Por una parte, PP y Ciudadanos, a quienes el PSOE se refiere como \"las derechas\" para dar cabida también a Vox. Por la otra, y ERC y PdeCAT, que cumplieron sus advertencias y presentaron sendas enmiendas a la totalidad porque el Gobierno no accedió a hablar de autodeterminación en la mesa de partidos que hasta la semana pasada negociaba con el Govern.</p><p>Estos dos bloques han tenido una clara presencia en la intervención de Sánchez este viernes. Ha criticado que en casi 9 meses él no ha podido contar con la \"lealtad no al Gobierno, sino al Estado\". \"No me los he encontrado a mi lado\" sobre Cataluña, ha dicho de PP y Ciudadanos, a los que ha acusado de \"bloquear\" en el Congreso numerosas iniciativas legislativas hasta contribuir finalmente a derribar la más importante, los Presupuestos.</p><p>La aversión de estos dos partidos al Gobierno terminó de confirmarse para Sánchez en la concentración de Colón del pasado 1o de febrero. \"Cuando la derecha se presenta en Colón, no está en una manifestación en contra del independentismo en Cataluña, está manifestando que hay que echar a Sánchez\". Entonces, ha dicho, \"el debate es otro\" , ha dicho Sánchez, que frente a la España que \"evidente que quieren la derecha y sus tres partidos\", ha apostado por \"una España inclusiva\".</p><p><br></p><h2>Se desvincula del Govern</h2><p><br></p><p>Sobre los independentistas,&nbsp;ha negado \"pactos ocultos\" ni dobles mensajes al Govern, porque, ha asegurado, \"han sabido siempre dónde estaba el Gobierno\", dentro de la legalidad. \"Fuera de la Constitución, nada; dentro, todo\", ha reiterado.</p><p>En un contexto en el que se prevé que en las generales haya un crecimiento del voto a la ultraderecha de Vox que, como ha ocurrido en Andalucía, podría dar el Gobierno a PP y Ciudadanos, Sánchez ha insistido en varias ocasiones, sin citar a ningún partido, en que \"lo que decidan los españoles, bien decidido está\".</p><p>En alusión al motivo de fondo que ha llevado al adelanto electoral, la exigencia de la autodeterminación por parte de los independentistas, que terminaron tumbado sus cuentas, Sánchez ha mantenido que el \"diálogo\" con ellos es la manera de encontrar una solución en Cataluña.</p><p>\"Nunca renunciaré al diálogo.&nbsp;Lo vamos a seguir haciendo siempre, siempre, siempre\", ha aseverado Sánchez, que se ha reafirmado en todo el camino recorrido sobre Cataluña desde que llegó al Gobierno. \"No soy amigo de mirar para otro lado. Para eso me pagan los españoles, para resolver los problemas\", ha dicho, antes de reprochar a PP y Ciudadanos que su planteamiento consista en \"negar la evidencia\" y en perpetuar un artícuo 155 en Cataluña que \"perpetuará la crisis política\".</p><p>Las elecciones del 28 de abril obligarán a hacer&nbsp;campaña electoral no sólo en plena Semana Santa, sino también durante el juicio contra el procés que empezó este martes en el Tribunal Supremo. Sobre si el proceso electoral afectará al juicio, Sánchez ha respondido que \"la justicia va por un lado y hace su trabajo y la política hace el suyo\" que es \"salir de este bloque al que han llevado los extremos\".</p><p>Las generales serán una forma de&nbsp;\"salir al campo, explicarse, dar la cara\", ha dicho Sánchez, que, sin embargo, no ha querido entrar en posibles pactos postelectorales o indicar si él vetará a alguna formación cuando llegue el momento de conformar una mayoría para llegar al Gobierno después del 28 de abril.</p><p>Ha propuesto dejar \"que primero hablen los españoles y [pactar] en función de cuáles sean las mayorías parlamentarias\".</p><p>\"Lo importante es no restar legitimidad a las mayorías parlamentarias\", ha dicho el presidente que ha dedicado buena parte de su intervención a criticar el \"bloqueo\" por motivos \"partidistas\" al que la oposición ha sometido a su Gobierno y los calificativos de \"golpista\" o \"presidente ilegítimo\" que ha recibido en estos casi nueve meses al frente del Ejecutivo.</p><p><br></p><h2>\"Me sorprende que me pongan a mí un cordón sanitario y no lo pongan a la ultraderecha\"</h2><p><br></p><p>A diferencia de Sánchez, el PP y Ciudadanos sí han dejado clara una línea roja incluso antes de convocarse las elecciones. Pablo Casado pidió esta semana un frente para que no se reedite un Gobierno socialista y Albert Rivera aseguró que su límite se llama Pedro Sánchez. \"A mí me sorprende que me pongan a mí un cordón sanitario y no lo pongan a la ultraderecha\", ha indicado el presidente del Gobierno.</p><p>De la misma manera que los partidos independentistas,&nbsp;ERC&nbsp;y&nbsp;PdeCAT, fueron claves para que el año pasado sumara apoyos suficientes para convertirse en presidente tras la moción de censura, su voto en contra de lo Presupuestos ha dado esta semana la puntilla a la legislatura.</p><p>Sánchez ha reafirmado su planteamiento de \"diálogo dentro de la legalidad\" y ha negado la teoría de pactos ocultos o cesiones desconocidas con los independentistas. A pesar del \"ruido, los insultos y absurdos debates infantiles\" de la oposición, \"el independentismo siempre ha sabido dónde estaba el Gobierno\", ha apuntado Sánchez, que ha subrayado que \"dentro de la Constitución, todo; fuera de la Constitución, nada\".</p><p>Así, ha recurrido al \"sarcasmo\" para preguntarse \"si también hubo pactos oscuros\" entre PP y Ciudadanos y ERC y PdeCAT esta semana en el Congreso, cuando votaron juntos para aprobar las enmiendas a la totalidad de sus Presupuestos.</p>', '2019-02-15 18:35:59'),
(2, 1, 2, 'Renfe aparta a un vigilante de seguridad acusado de racismo en la estación de Sants', 'Renfe ha pedido a la empresa de seguridad Ombuds que aparte del servicio a un vigilante de la estación de Sants de Barcelona acusado por la plataforma Es Racismo de pedir el billete, empujar y tratar con \"actitud chulesca y violenta\" a un viajero de Cercanías por motivos racistas.', '<p><span style=\"color: rgb(0, 0, 0);\">Renfe ha pedido a la empresa de seguridad Ombuds que aparte del servicio a un vigilante de la estación de Sants de Barcelona acusado por la plataforma Es Racismo de pedir el billete, empujar y tratar con \"actitud chulesca y violenta\" a un viajero de Cercanías por motivos racistas. Fuentes de Renfe han informado de que están revisando la actuación del vigilante por el trato que dio al viajero y que han abierto un expediente informativo. Es Racismo ha difundido este viernes un vídeo en su cuenta de Twitter en el que aparecen los hechos, ha criticado que el vigilante pidió el billete únicamente al viajero afectado y ha considerado: \"El agente de seguridad no actúa así por casualidad, es conocedor de la criminalización racial (que contribuye a reforzar) y sabe que en el espacio público puede actuar así sin impedimentos\".</span></p>', '2019-02-16 06:12:21'),
(3, 2, 2, 'Trump declara la emergencia nacional ante la \"invasión de drogas y gente que sufre Estados Unidos\"', 'El presidente de Estados Unidos, \"Donald Trump\", ha declarado este viernes el estado de emergencia nacional en la frontera con México para costear la finalización del muro de separación entre ambos países tras considerar insuficiente la partida de 1.500 millones de dólares aprobada finalmente por el Congreso de Estados Unidos.', '<p><span style=\"color: rgb(0, 0, 0);\">El presidente de Estados Unidos, Donald Trump, ha declarado este viernes el estado de emergencia nacional en la frontera con México para costear la finalización del muro de separación entre ambos países tras considerar insuficiente la partida de 1.500 millones de dólares aprobada finalmente por el Congreso de Estados Unidos. \"Voy a firmar una declaración de emergencia, como han hecho otros presidentes antes que yo por cosas menos importantes. Es algo muy importante\", ha declarado Trump. Trump ha argumentado que su decisión ha sido motivada por \"esta invasión que está viviendo Estados Unidos, por criminales, por traficantes de drogas\", en una comparecencia ante los medios en la Casa Blanca, acompañado de las llamadas \"Madres de los Ángeles\", madres de fallecidos a manos de inmigrantes ilegales. \"Nos van a denunciar\" \"Es una invasión de drogas, una invasión de bandas criminales, una invasión de gente, y es inaceptable\", ha añadido, antes de reconocer que se expone a una batería de denuncias de propietarios y negocios en el caso de que el muro afecte a tierras privadas y contratos entre particulares y el Ejército de Estados Unidos si llega a colaborar en la finalización del muro. \"Voy a firmar en cuanto llegue al Despacho Oval, y nos van a denunciar, y va a llegar al Tribunal Supremo, y nos van a denunciar otra vez, y luego nos van a denunciar\", ha pronosticado Trump, \"y lo van a intentar vender como una derrota. Lo de siempre\". \"Yo espero que me van a demandar. No debería ocurrir, pero va a ocurrir. Sin frontera no hay país que valga\", ha añadido Trump. Trump ha explicado que sacará el dinero de \"fondos a discreción del Ejército todavía no destinados\". \"No me quiero meter en detalles\", ha añadido el mandatario, quien reconoció que \"varios generales\" le explicaron para qué iban destinados originalmente esos fondos. \"No puedo decir para qué, pero no me parecía demasiado importante\", ha añadido. Sobre el fracaso de su negociación con el Congreso, Trump ha defendido que los 1.500 millones de dólares han sido, al final, una victoria. \"Recordad que no me iban a dar ni un dólar. Eran unos tacaños con el muro. Podría haberlo hecho por los cauces normales, pero aquí había que ir rápido\", ha añadido el presidente, quien tendrá a su disposición aproximadamente unos 8.000 millones de dólares para completar el proyecto: 3.600 millones del Pentágono, otros 3.100 procedentes de fondos desbloqueados gracias a estas competencias extraordinarias, y los 1.375 millones del Congreso.</span></p>', '2019-02-17 19:21:27'),
(4, 2, 2, 'El Parlamento Europeo veta el acto con Puigdemont del lunes', 'El Parlamento Europeo anunció este viernes que no autorizará la celebración de un evento el próximo lunes en el que iba a participar el expresidente de la Generalitat de Cataluña Carles Puigdemont por seguridad.', '<p><span style=\"color: rgb(0, 0, 0);\">El Parlamento Europeo anunció este viernes que no autorizará la celebración de un evento el próximo lunes en el que iba a participar el expresidente de la Generalitat de Cataluña Carles Puigdemont por seguridad. \"El análisis ha concluido que las amenazas de seguridad vinculadas al evento no pueden ser mitigadas por los servicios de seguridad del Parlamento\", dijo la institución en un comunicado en el que advirtió sobre la \"posibilidad de incidentes dentro o alrededor\" de la Eurocámara. Puigdemont había sido invitado, junto al actual presidente de la Generalitat, Quim Torra, por el eurodiputado nacionalista flamenco Ralph Packet y el exministro de Exteriores esloveno Ivo Vajgl a la ponencia Catalunya y el juicio sobre el referéndum: Un reto para la Unión Europea en la Eurocámara. Según el comunicado, la dirección de Seguridad de la Eurocámara revisó en su evaluación elementos como la ocupación por parte de activistas independentistas de la sede de la Comisión Europea en Barcelona el pasado 1 de febrero y las \"tensiones\" vinculadas al inicio del juicio por el procés en el Tribunal Supremo. Además, tuvieron en cuenta la \"falta de información\" respecto a los participantes en el evento y, \"especialmente\", la \"posibilidad de incidentes\" dentro o en los alrededores del Parlamento Europeo. \"Según la evaluación, hay un alto riesgo de que el evento propuesto pueda significar una amenaza al mantenimiento del orden público en las instalaciones del Parlamento\", concluyó la institución. Los líderes en la Eurocámara de PP, PSOE y Ciudadanos pidieron este jueves a Tajani que impidiera la celebración del acto, alegando que Puigdemont, en la actualidad huido en Bélgica, \"fue el principal artífice de un plan para subvertir el orden constitucional\" en España. \"Permitir la presencia del señor Puigdemont no se corresponde con el noble papel que desempeña el Parlamento Europeo como referente de la democracia y el Estado de derecho que prevalecen en la Unión Europea\", indicaba la carta.</span></p>', '2019-02-18 13:29:40'),
(5, 2, 1, 'Así es el Ferrari SF90, el candidato a romper el dominio de Mercedes', 'Con una presentación más parecida a una entrega de premios, y media hora después de ser filtrado, Ferrari mostró al mundo de manera oficial el que es el 65º monoplaza en la historia de Scuderia, el SF90.', '<p><span style=\"color: rgb(0, 0, 0);\">Con una presentación más parecida a una entrega de premios, y media hora después de ser filtrado, Ferrari mostró al mundo de manera oficial el que es el 65º monoplaza en la historia de Scuderia, el </span><strong style=\"color: rgb(0, 0, 0);\">SF90</strong><span style=\"color: rgb(0, 0, 0);\">. El </span><u style=\"color: rgb(0, 0, 0);\">monoplaza</u><span style=\"color: rgb(0, 0, 0);\">, que parece más anaranjado en directo que en las fotos renderizadas que han facilitado a los medios, ha nacido con el único objetivo de acabar con el reinado de Mercedes en la actual era de la Fórmula 1. Después del buen arranque en 2018 que se diluyó muy pronto, Sebastian Vettel y Charles Leclerc, que además de compañeros serán los principales rivales, han prometido presentar batalla para intentar bajar del trono a Lewis Hamilton. La evolución del SF90 con respecto a su predecesor ha sido notable. Además del necesario cambio del alerón delantero y el trasero (más anchos y largos) debido a la normativa, han retocado notablemente la arquitectura del chasis, como una entrada distinta de los pontones laterales, la reducción a su mínima expresión de la toma de aire superior o una zona trasera mucho más compacta. También la tapa motor ha sido adelgazada notablemente, lo que augura una unidad de potencia más pequeña con respecto al SF71H de 2018. En cuanto al motor en sí, desde Ferrari aseguran que han avanzado con la unidad 064 con un desarrollo extra en busca de una mayor eficiencia sin dejar de lado la fiabilidad. En su aspecto exterior, el \'Mission Winnow\' de su polémico patrocinador gana protagonismo. Con este coche y las imágenes del Alfa Romeo (antiguo Sauber) en su rodaje en pista del jueves, todos los coches de la temporada 2019 han visto la luz.</span></p>', '2019-02-19 10:23:19'),
(6, 1, 2, 'Un estudio de la Universidad de Oxford descarta que haya relación entre la violencia adolescente y los videojuegos', 'Es un clásico de las controversias y una media verdad para muchos. Los videojuegos generan violencia. O no. Desde hace años, la cuestión ocupa a los expertos y, a veces, a los gobiernos (ahí está el empeño de Donald Trump en EE UU).', '<p><span style=\"color: rgb(0, 0, 0);\">Así, en el repaso a los titulares de los últimos 10 años, uno puede leer desde que \"Los videojuegos violentos y las agresiones activan la misma parte del cerebro\" a que \"Los jugadores de videojuegos violentos no confunden ficción con realidad\", pasando porque \"Los juegos violentos relajan a los jugadores\". Lo último al respecto es un estudio de las universidades de Oxford y Cardiff que descarta que haya relación alguna entre la violencia adolescente y los videojuegos. Los autores, que consideran que los efectos negativos del videojuego se han exagerado, consideran que los adolescentes que juegan videojuegos violentos no son más propensos a un comportamiento agresivo en el mundo real. Publicado en la revista Royal Society Open Science, ha sido uno de los estudios más completos hasta la fecha, con una muestra de 1.000 chavales británicos, de 14 y 15 años. Se les preguntó sobre sus hábitos de ocio y resultó que casi la mitad de las niñas y dos tercios de los niños jugaban videojuegos. También entrevistaron a sus padres para saber si pensaban que su hijo se había vuelto más antisocial desde que disfrutaba de los videojuegos. Y no, no se encontró evidencia de que los que más jugaban fueran más agresivos una vez que apagaban la consola. Algo de rabia al jugar, pero nada preocupante \"La idea de que los videojuegos violentos provocan agresividad en el mundo real es muy popular, pero no se ha probado\", dice el investigador principal, el profesor Andrew Przybylski, director de investigación del Oxford Internet Institute. Y añade: \"Pese al interés en el tema por parte de los padres y de los responsables políticos, la investigación no ha demostrado que haya motivo de preocupación\". ¿Qué es lo que sí hallaron los investigadores? Przybylski cuenta que observaron que los videojuegos podían provocar arrebatos de ira y rabia mientras los chavales jugaban en línea. \"Vimos algunas cosas, como que hablarán mal, una competitividad extrema o algún troleo en los grupos de jugadores que podríamos calificar como comportamiento antisocial\", explica. Los autores de este estudio critican que las investigaciones anteriores se han basado demasiado en la información aportada por los propios adolescentes sobre los títulos que jugaban y su comportamiento. Ellos han considerado también a los padres y los sistemas de calificación de la violencia de los juegos (en su caso en Reino Unido y EE UU). De ese modo, aseguran, han podido minimizar el riesgo de seleccionar datos que pudieran dar un resultado más emocionante pero menos cierto. En palabas de la coautora, Netta Weinstein, de la Universidad de Cardiff, \"el sesgo de los investigadores podrían haber influido en los estudios previos sobre este tema y, de ese modo, haber distorsionado nuestra comprensión de los efectos de los videojuegos\".</span></p>', '2019-02-20 14:11:06'),
(7, 1, 1, 'Apex Legends guide: Tips for mastering the battle royale', 'Tips and tricks for staying alive, handling your loot, and working together as a squad.', '<p>Shoot the bad guys. Stay in the circle. Revive your teammates. What more do you need to know to succeed in a battle royale game? Okay—a lot, as it turns out. We\'ve been playing match after match of Apex Legends, and pulled together these tips for staying alive and grabbing first place in Respawn\'s battle royale.&nbsp;</p><p>This beginner\'s guide covers looting, mobility, figuring out how much armor an opponent has, and more. Check out our&nbsp;<a href=\"https://www.pcgamer.com/apex-legends-characters-class-guide/\" target=\"_blank\" style=\"color: rgb(197, 22, 24);\"><u>Apex Legends character guide</u></a>&nbsp;for details on their special abilities, and our&nbsp;<a href=\"https://www.pcgamer.com/apex-legends-map/\" target=\"_blank\" style=\"color: rgb(197, 22, 24);\"><u>map guide</u></a>&nbsp;to learn your way around.</p><h2><strong>Damage numbers also show your enemy\'s armor level&nbsp;</strong></h2><p>As you\'re popping rounds into an enemy, you\'ll see the typical damage numbers appear, but the color of the numbers can give you additional information about the level of armor your opponent is wearing, which will give you some idea of how durable they are. Here are the damage number colors and the armor values they indicate:</p><ul><li>Red: No armor</li><li>White: Level 1 armor</li><li>Blue: Level 2 armor</li><li>Purple: Level 3 armor</li></ul><h2><strong>Master the ping system&nbsp;</strong></h2><iframe class=\"ql-video\" frameborder=\"0\" allowfullscreen=\"true\" src=\"https://gfycat.com/ifr/flawlesslonelychinesecrocodilelizard\" height=\"600\" width=\"500\"></iframe><p><br></p><p>This is a squad-based game, and you\'re not going to win if you don\'t work together with your team. Apex Legends\' ping system gives you the tools to work together even if you don\'t want to get on the mic, and using it wisely is vital.&nbsp;</p><p>By default, middle mouse click is your basic ping, while double tapping is an \"enemy\" ping that shows up in red. Pings are surprisingly context sensitive and trigger tons of unique voice lines—point to any object and ping it to notify your teammates that you\'ve found armor or ammo or a new gun. Hold down middle mouse to pull up a ping wheel with options like \"looting this area\" or \"watching here\" to tell your teammates what you\'re doing.</p><p>Now here\'s the really pro move: Open up your inventory with Tab or I, and hover the mouse over one of your weapons or their attachment slots. Then hit ping to tell your squad that you need light ammo, or optics, or a barrel mod, etc. This also works on your armor, helmet, knockdown shield and backpack slots. Tell your team what you need and they can help you gear up.</p><h2><strong>Don\'t load yourself down with unnecessary loot&nbsp;</strong></h2><p><br></p><p>Like in most battle royale games, you\'re going to be sifting through a lot of loot in Apex Legends. And there\'s a lot of stuff you definitely want to pick up: Shield charges and medpacks to heal up, blue- and purple-tier armor to improve your defense. Apex Legends also does a pretty good job of making weapon upgrades intuitive: If a barrel stabilizer, stock, extended mag, or scope fits on your gun, it\'ll show you what slot it will automatically go into.&nbsp;</p><p>What\'s more confusing is when an add-on doesn\'t apply to the gun you currently have in your hands. Should you pick up a sniper stock, in case you get a sniper rifle later? What about a special purple-tier add-on that makes headshots do more damage on a specific gun? Unless you know you\'re hunting for the exact weapon an upgrade is for, you should probably just leave it behind. \"This might come in handy\" is a surefire way to clutter up your inventory and run out of space when you need it.</p><p>To ditch items, pull up your inventory with Tab or I and right-click on items to drop them. If an item has an X in the corner, that means it\'s not currently usable with either of your equipped guns. Unless you\'re rocking an especially spacious backpack, dump it.</p><h2><strong>Run faster by holstering your weapon&nbsp;</strong></h2><p>In the heat of the moment, it\'s easy to start running with your weapon out. And if you\'re in the middle of a fight, you should keep that gun drawn—you could need it at a moment\'s notice. But if you\'re hightailing it from the encroaching kill circle or running away from a battle, remember to press 3 to holster your weapon. You\'ll actually run faster that way, and that extra speed could separate life from death.&nbsp;</p><h2><strong>Always be sliding&nbsp;</strong></h2><iframe class=\"ql-video\" frameborder=\"0\" allowfullscreen=\"true\" src=\"https://gfycat.com/ifr/ElectricQuarrelsomeHen\" height=\"600\" width=\"500\"></iframe><p><br></p><p>It\'s hard to overuse Apex Legends\' slide. On any slight incline, running and then pressing Ctrl or C to crouch will put you into a powerslide that gives you more speed&nbsp;<em>and</em>&nbsp;makes you a much harder target to hit. On big hills, this gives you a massive speed boost. But it\'s also a powerful tool for simply sliding into cover or bumping up your base movement speed as you traverse the map. You can also use it to propel yourself off a ledge if you slide off it rather than run and jump. Never stop sliding.</p><p>It\'ll take practice to shoot accurately while you\'re sliding, but you\'ll feel very cool when you come sliding into battle guns blazing and actually hit somebody.</p><h2><strong>Hold spacebar to climb&nbsp;</strong></h2><p>Even without Titanfall\'s wall running, you\'re pretty mobile in Apex Legends. Hold space when you\'re running towards a wall and you can easily mantle up surfaces considerably taller than you. Crucially, this isn\'t just limited to buildings. Look for climbable rock formations. There are areas all over the map that may look inaccessible at first, but are actually reachable with a well-positioned jump. Make sure to hold space to climb all the way up. This is a great way to get a drop on people, especially in some of the narrow canyons that connect parts of the map.&nbsp;</p><h2><strong>The supply ship is a major combat zone&nbsp;</strong></h2><p>As you\'re crossing the map before dropping, you\'ll also see a supply ship circling. You can see it on your map, too, and where it will land—the ship appears as a white icon and its landing spot is marked with a blue icon. This ship carries a lot of gear and weapons, and often it\'s high-level stuff, so it\'s a common hotspot for squad landings. If you land there, expect an immediate fight, or quickly grab what you can before leaping off.&nbsp;</p><p><br></p><h2><strong>Don\'t worry about fall damage&nbsp;</strong></h2><p>There\'s no need to be bashful about leaping off buildings, cliffs, or the supply ship that hovers over the map. You can plummet as far as you like and not take any fall damage. It\'s a great incentive to throw caution to the wind and make some desperate escapes or crazy mid-air kills since you don\'t need to worry about hurting yourself when you hit bottom.&nbsp;</p><h2><strong>With three squads left, you can\'t see the playercount&nbsp;</strong></h2><p>Like all battle royale games you can see how many squads and players are left in the match. When only the final three squads are left, however, the player tally becomes a question mark. So unless you were paying close attention you won\'t know how many total players are left, only that there\'s at least one on each squad. When kills are made, the counter will flash red, so you can still keep a mental count of how many total players are remaining—if you can remember how many were left when match dropped from four squads to three. Remember that this includes your squad, too.&nbsp;</p><h2><strong>Use Survey Beacons with Pathfinder to see where the next circle will be&nbsp;</strong></h2><p>If Pathfinder is on your team, take note of the survey beacon locations on the map overview. They’re marked by what looks like a small antenna at the center of a few concentric circles. Pathfinder can grapple up to these devices and interface with them to display where the next circle will be for the entire team. Whether you’re playing cautiously or aggressively, knowing the best place to hole up is vital in any battle royale game. “Have a plan: Scan.” - James “ScanBoy” Davenport&nbsp;</p><h2><strong>Bind the map toggle to left alt&nbsp;</strong></h2><p>Reaching over to hit M is unnatural, and since staying on the move is key in Apex, you’ll need to check your position often and easily. Find a convenient keybind that works for you and use it to check the map often.</p><h2><strong>Drop pods can contain exclusive Legendary weapons</strong></h2><p>Two of the most powerful guns in the game, the Mastiff shotgun and the Kraber sniper, aren\'t available as normal map pickups like everything else. They\'re Legendary weapons, and they\'ll sometimes appear in the drop pods that appear around the map. Go for those supply drops for some high level items. Just keep in mind other players are probably gunning for them, too.</p><h2><strong>Legendary knockdown shields let you self-revive</strong></h2><iframe class=\"ql-video\" frameborder=\"0\" allowfullscreen=\"true\" src=\"https://gfycat.com/ifr/massiveentireerne\" height=\"600\" width=\"500\"></iframe><p><br></p><p>You could play for a long time without spotting one, but keep your eyes peeled for a legendary knockdown shield. Typical knockdown shields will give you some protection from damage while you\'re incapacitated and crawling away so a teammate can revive you, but with a legendary knockdown shield you\'ll see a prompt telling you to revive with the E key. No need for a teammate, you can get back on your feet by yourself.</p>', '2019-02-20 18:38:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`nombre`) VALUES
('Cataluña'),
('Donald trump'),
('Eeuu'),
('F1'),
('Juegos'),
('Renfe'),
('Sanchez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags_noticias`
--

DROP TABLE IF EXISTS `tags_noticias`;
CREATE TABLE `tags_noticias` (
  `noticia` int(11) NOT NULL,
  `tag` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tags_noticias`
--

INSERT INTO `tags_noticias` (`noticia`, `tag`) VALUES
(1, 'Sanchez'),
(2, 'Renfe'),
(3, 'Donald trump'),
(3, 'Eeuu'),
(4, 'Cataluña'),
(5, 'F1'),
(6, 'Juegos'),
(7, 'Juegos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descripcion` (`nombre`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticia` (`noticia`);

--
-- Indices de la tabla `editores`
--
ALTER TABLE `editores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `tags_noticias`
--
ALTER TABLE `tags_noticias`
  ADD PRIMARY KEY (`noticia`,`tag`),
  ADD KEY `tags_noticias_ibfk_2` (`tag`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editores`
--
ALTER TABLE `editores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`noticia`) REFERENCES `noticias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `editores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tags_noticias`
--
ALTER TABLE `tags_noticias`
  ADD CONSTRAINT `tags_noticias_ibfk_1` FOREIGN KEY (`noticia`) REFERENCES `noticias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tags_noticias_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tags` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
