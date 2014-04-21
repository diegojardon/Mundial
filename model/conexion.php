<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 13 - Abril - 2014
		Versión: 1.0
		Appsteroid -- Conectrabajo
	
		Configuración de la conexión a Base de Datos
	
	*/

	//conexion a Base de Datos
	$link = mysql_connect("localhost","","") or die('No se pudo conectar a la BD');
	mysql_select_db("conectrabajo",$link);
	
?>