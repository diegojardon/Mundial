<?php

	/*
		Desarroll�: Diego Alberto Jard�n Ram�rez
		Fecha: 13 - Abril - 2014
		Versi�n: 1.0
		Appsteroid -- Conectrabajo
	
		Configuraci�n de la conexi�n a Base de Datos
	
	*/

	//conexion a Base de Datos
	$link = mysql_connect("localhost","","") or die('No se pudo conectar a la BD');
	mysql_select_db("conectrabajo",$link);
	
?>