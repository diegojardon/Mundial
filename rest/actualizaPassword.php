<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que actualiza el password de un usuario
	
	*/

	session_start();
	
	require("conexion.php");
	require("constantes.php");
	require("cors.php");
	
	$data = json_decode(file_get_contents("php://input"));
	if(isset($_SESSION['login'])){
		$idUsuario = $_SESSION['idUsuario'];
	}
	$passwordUsuario = mysql_real_escape_string($data->passwordUsuario);
	//$partidos = mysql_real_escape_string($data->partidos);
	
	//$resultadoQuiniela = ($_GET["resultadoQuiniela"]);
	
	/*$idQuiniela = 1;
	$resultadoQuiniela = 0;*/
	
	//Insertamos las quinielas vacías para los partidos
	$query = "UPDATE usuario SET passwordUsuario = '$passwordUsuario' WHERE idUsuario = '$idUsuario'";
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR_INSERCION_RESULTADO_NO_VALIDO;
	}
	
	echo json_encode($resultado);
	
?>