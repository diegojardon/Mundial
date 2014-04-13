<?php

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