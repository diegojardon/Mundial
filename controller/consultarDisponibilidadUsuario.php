<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 13 - Abril - 2014
		Versión: 1.0
		Appsteroid -- Conectrabajo
	
		Servicio que valida si un nombre de usuario está disponible durante el registro
	
	*/

	require("../model/conexion.php");
	require("../model/constantes.php");

	//Validamos que las variables no sean null
	$nombreUsuario = isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : "";
	
	//Buscamos si el nombre de usuario ya está ocupado como candidato
	$result = mysql_query("SELECT idCandidato FROM candidato WHERE usuarioCandidato = '".$nombreUsuario."'",$link);
	
	if($result === FALSE){
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalUsu = mysql_num_rows($result);
		if($totalUsu == 1){
			$resultado["response"] = Constantes::ERROR;
			$resultado["response"]["causa"] = Constantes::ERROR_USUARIO_REGISTRADO;
		}else{
			//Buscamos si el usuario es empresa
			$result = mysql_query("SELECT idEmpresa FROM empresa WHERE usuarioEmpresa = '".$nombreUsuario."'",$link);
			if($result === FALSE){
				$resultado["response"] = Constantes::ERROR;
				$resultado["response"]["causa"] = Constantes::ERROR_SELECCION_NO_VALIDA;
			}else{
				$totalUsu = mysql_num_rows($result);
				if($totalUsu == 1){
					$resultado["response"] = Constantes::ERROR;
					$resultado["response"]["causa"] = Constantes::ERROR_USUARIO_REGISTRADO;
				}else{
					$resultado["response"] = Constantes::EXITO;
				}
			}
		}
	}
	
	echo json_encode($resultado);

?>