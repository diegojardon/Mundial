<?php

	//conexion a Base de Datos
	$link = mysql_connect("localhost","","") or die('No se pudo conectar a la BD');
	mysql_select_db("conectrabajo",$link);
	
?>