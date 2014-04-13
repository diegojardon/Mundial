<?php

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	//Validacion de variables
	$nombreUsuario = isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : "";
	$passwordUsuario = isset($_POST["passwordUsuario"]) ? $_POST["passwordUsuario"] : "";
	$tipoUsuario = isset($_POST["tipoUsuario"]) ? $_POST["tipoUsuario"] : "";
	
	$query = "INSERT INTO usuario (`idUsuario`,`nombreUsuario`,`passwordUsuario`,`tipoUsuario`) 
			  VALUES (NULL, '$nombreUsuario', '$passwordUsuario', '$tipoUsuario')";
	
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = ERROR_INSERCION_NO_VALIDA;
	}	
	echo json_encode($resultado);		

?>