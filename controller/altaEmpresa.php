<?php

	/*
		Desarroll�: Diego Alberto Jard�n Ram�rez
		Fecha: 13 - Abril - 2014
		Versi�n: 1.0
		Appsteroid -- Conectrabajo
	
		Servicio que da de alta a un usuario empresa
	
	*/
	
	require("../model/conexion.php");
	require("../model/constantes.php");
	
	//Validacion de variables
	$nombreEmpresa = isset($_POST["nombreEmpresa"]) ? $_POST["nombreEmpresa"] : "";
	$giroEmpresa = isset($_POST["giroEmpresa"]) ? $_POST["giroEmpresa"] : "";
	$usuarioEmpresa = isset($_POST["usuarioEmpresa"]) ? $_POST["usuarioEmpresa"] : "";
	$passwordEmpresa = isset($_POST["passwordEmpresa"]) ? $_POST["passwordEmpresa"] : "";
	
	$query = "INSERT INTO empresa (`idEmpresa`,`nombreEmpresa`,`giroEmpresa`,`usuarioEmpresa`,`passwordEmpresa`) 
			  VALUES (NULL, '$nombreEmpresa', '$giroEmpresa', '$usuarioEmpresa', '$passwordEmpresa')";
	
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_INSERCION_EMPRESA_NO_VALIDA;
	}	
	echo json_encode($resultado);		
	
?>