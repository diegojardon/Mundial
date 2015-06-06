<?php
	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio de logout
				
	*/

	require("constantes.php");

	session_start();
	session_destroy();
	
	header('Location: ../web/view/login.html');
	
?>