<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 13 - Abril - 2014
		Versión: 1.0
		Appsteroid -- Conectrabajo
	
		Servicio que inserta la selección realizada por un usuario candidato
	
	*/

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	//Validacion de variables
	$idCandidato = isset($_POST["idCandidato"]) ? $_POST["idCandidato"] : "";
	$idOferta = isset($_POST["idOferta"]) ? $_POST["idOferta"] : "";
	$estatusSeleccion = isset($_POST["estatusSeleccion"]) ? $_POST["estatusSeleccion"] : "";
	$fechaIniciaSeleccion = isset($_POST["fechaIniciaSeleccion"]) ? $_POST["fechaIniciaSeleccion"] : "";
	$fechaTerminaSeleccion = isset($_POST["fechaTerminaSeleccion"]) ? $_POST["fechaTerminaSeleccion"] : "";
		
	$query = "INSERT INTO seleccion (`idSeleccion`,`idCandidato`,`idOferta`,`estatusSeleccion`,`fechaIniciaSeleccion`,`fechaTerminaSeleccion`) 
			  VALUES (NULL, '$idCandidato', '$idOferta', '$estatusSeleccion', '$fechaIniciaSeleccion', '$fechaTerminaSeleccion')";
	
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_INSERCION_SELECCION_NO_VALIDA;
	}	
	echo json_encode($resultado);

?>
