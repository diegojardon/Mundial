<?php

	require("../model/conexion.php");
	require("../model/constantes.php");

	//Validamos que las variables no sean null
	$nombreUsuario = isset($_POST["loginUsuario"]) ? $_POST["loginUsuario"] : "";
	$passwordUsuario = isset($_POST["loginUsuario"]) ? $_POST["loginUsuario"] : "";

	$result = mysql_query("SELECT tipoUsuario FROM usuario WHERE nombreUsuario = '".$nombreUsuario."' AND passwordUsuario = '".$passwordUsuario."'",$link) or die(mysql_error());
	$totalUsu = mysql_num_rows($result);
	$info = mysql_fetch_assoc($result);

	if($totalUsu == 1){
		$resultado["tipoUsuario"] = $info["tipoUsuario"];
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["tipoUsuario"] = -1;
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_SIN_RESULTADOS;
	}
	echo json_encode($resultado);

?>