<?php

$conexion =mysql_connect("localhost", "virtualt_g6","abcde12345") or die("No sepudo conectar al servidor");
mysql_select_db("virtualt_grupo6") or die ("No se encontro la base de datos");

$query = mysql_query("INSERT INTO `area` (`id`, `nombre`, `id_docente`, `id_actividad`) VALUES
(2, 'Cultura', NULL, NULL),
(3, 'Tecnología', NULL, NULL),
(4, 'Arte', NULL, NULL),
(5, 'Física', NULL, NULL),
(6, 'Matemáticas', NULL, NULL),
(7, 'Química', NULL, NULL),
(8, 'Ciencia', NULL, NULL),
(9, 'Psicología', NULL, NULL),
(10, 'Medicina', NULL, NULL),
(11, 'Software', NULL, NULL),
(12, 'Electrónica', NULL, NULL);
",$conexion) or die ("Consulta erronea");

?>