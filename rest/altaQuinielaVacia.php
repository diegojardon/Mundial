<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que da de alta todas la quinielas vacias
	
	*/

	require("conexion.php");
	require("constantes.php");
		
	//Datos Usuario
	$idUsuario = ($_GET["idUsuario"]);
	//$idUsuario = 2;
	$idPartido = 1;
	//Insertamos las quinielas vacías para los partidos
	for($i=0;$i<64;$i++){
		$query = "INSERT INTO quiniela (`idQuiniela`,`idUsuario`,`idPartido`,`resultadoQuiniela`) 
			VALUES (NULL, '$idUsuario', '$idPartido', 0)";
		$result = mysql_query($query);
		if($result === FALSE){
			break;
		}	
		$idPartido++;
	}
	
	if($idPartido == 65){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR_INSERCION_QUINIELA_VACIA_NO_VALIDA;
	}
	
	echo json_encode($resultado);		

?>