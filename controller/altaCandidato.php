<?php

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	//Validacion de variables
	$nombreCandidato = isset($_POST["nombreCandidato"]) ? $_POST["nombreCandidato"] : "";
	$apellidosCandidato = isset($_POST["apellidosCandidato"]) ? $_POST["apellidosCandidato"] : "";
	$correoCandidato = isset($_POST["correoCandidato"]) ? $_POST["correoCandidato"] : "";
	$celularCandidato = isset($_POST["celularCandidato"]) ? $_POST["celularCandidato"] : "";
	$fijoCandidato = isset($_POST["fijoCandidato"]) ? $_POST["fijoCandidato"] : "";
	$edadCandidato = isset($_POST["edadCandidato"]) ? $_POST["edadCandidato"] : "";
	$sexoCandidato = isset($_POST["sexoCandidato"]) ? $_POST["sexoCandidato"] : "";
	$interesesCandidato = isset($_POST["interesesCandidato"]) ? $_POST["interesesCandidato"] : "";
	$usuarioCandidato = isset($_POST["usuarioCandidato"]) ? $_POST["usuarioCandidato"] : "";
	$passwordCandidato = isset($_POST["passwordCandidato"]) ? $_POST["passwordCandidato"] : "";
	
	$query = "INSERT INTO candidato (`idCandidato`,`nombreCandidato`,`apellidosCandidato`,`correoCandidato`,`celularCandidato`,`fijoCandidato`,
									 `edadCandidato`,`sexoCandidato`,`interesesCandidato`,`usuarioCandidato`,`passwordCandidato`) 
			  VALUES (NULL, '$nombreCandidato', '$apellidosCandidato', '$correoCandidato', '$celularCandidato','$fijoCandidato','$edadCandidato','$sexoCandidato','$interesesCandidato','$usuarioCandidato','$passwordCandidato')";
	
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_INSERCION_CANDIDATO_NO_VALIDA;
	}	
	echo json_encode($resultado);		

?>