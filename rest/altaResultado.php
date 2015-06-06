<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que asigna marcador y resultado a un partido
	
	*/

	require("conexion.php");
	require("constantes.php");
		
	/*$idPartido = ($_GET["idPartido"]);
	$marcadorPartido = ($_GET["marcadorPartido"]);
	$resultadoPartido = ($_GET["resultadoPartido"]);*/
	
	$idPartido = 1;
	$marcadorPartido = "";
	$resultadoPartido = 0;
	
	//Insertamos las quinielas vacías para los partidos
	$query = "UPDATE partido SET marcadorPartido = '$marcadorPartido', resultadoPartido = '$resultadoPartido' WHERE idPartido = '$idPartido'";
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR_INSERCION_RESULTADO_NO_VALIDO;
	}
	
	echo json_encode($resultado);		

?>