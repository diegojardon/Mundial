<?php

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	//Validacion de variables
	$idCandidato = isset($_POST["idCandidato"]) ? $_POST["idCandidato"] : "";
	$idOferta = isset($_POST["idOferta"]) ? $_POST["idOferta"] : "";
	$estatusSeleccion = isset($_POST["estatusSeleccion"]) ? $_POST["estatusSeleccion"] : "";
	
	$query = "INSERT INTO seleccion (`idSeleccion`,`idCandidato`,`idOferta`,`estatusSeleccion`) 
			  VALUES (NULL, '$idCandidato', '$idOferta', '$estatusSeleccion')";
	
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = ERROR_INSERCION_NO_VALIDA;
	}	
	echo json_encode($resultado);

?>
