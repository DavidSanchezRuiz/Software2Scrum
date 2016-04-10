<?php

$conexion =mysql_connect("localhost", "virtualt_g6","abcde12345") or die("No sepudo conectar al servidor");
mysql_select_db("virtualt_grupo6") or die ("No se encontro la base de datos");

$query = mysql_query("select nombre from docentes",$conexion) or die("No se realizo la consulta");
while($fila = mysql_fetch_array($query)){
	echo "".$fila['nombre'];
}


?>