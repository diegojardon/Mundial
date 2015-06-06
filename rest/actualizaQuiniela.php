<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que asigna resultado a una quiniela
	
	*/

	require("conexion.php");
	require("constantes.php");
	require("cors.php");
	
	$data = json_decode(file_get_contents("php://input"));
	$idQuiniela = mysql_real_escape_string($data->idQuiniela);
	$resultadoQuiniela = mysql_real_escape_string($data->resultadoQuiniela);
	//$partidos = mysql_real_escape_string($data->partidos);
	
	//$resultadoQuiniela = ($_GET["resultadoQuiniela"]);
	
	/*$idQuiniela = 1;
	$resultadoQuiniela = 0;*/
	
	//Insertamos las quinielas vacías para los partidos
	$query = "UPDATE quiniela SET resultadoQuiniela = '$resultadoQuiniela' WHERE idQuiniela = '$idQuiniela'";
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR_INSERCION_RESULTADO_NO_VALIDO;
	}
	
	echo json_encode($resultado);
	
?>