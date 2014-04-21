<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 13 - Abril - 2014
		Versión: 1.0
		Appsteroid -- Conectrabajo
	
		Servicio que inserta el área de trabajo para ser escogido en una oferta laboral
	
	*/

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	//Validacion de variables
	$nombreArea = isset($_POST["nombreArea"]) ? $_POST["nombreArea"] : "";
	
	$query = "INSERT INTO area (`idArea`,`nombreArea`) 
			  VALUES (NULL, '$nombreArea')";
	
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_INSERCION_AREA_NO_VALIDA;
	}	
	echo json_encode($resultado);		

?>