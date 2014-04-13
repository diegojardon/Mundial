<?php

	require("../model/conexion.php");
	require("../model/constantes.php");

	//Validamos que las variables no sean null
	$nombreUsuario = isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : "";
	$passwordUsuario = isset($_POST["passwordUsuario"]) ? $_POST["passwordUsuario"] : "";

	//Buscamos si el usuario es candidato
	$result = mysql_query("SELECT idCandidato, nombreCandidato, apellidosCandidato FROM candidato WHERE usuarioCandidato = '".$nombreUsuario."' AND passwordCandidato = '".$passwordUsuario."'",$link);
	
	if($result === FALSE){
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalUsu = mysql_num_rows($result);
		if($totalUsu == 1){
			$info = mysql_fetch_assoc($result);
			$resultado["id"] = $info["idCandidato"];
			$resultado["nombre"] = $info["nombreCandidato"] . " " . $info["apellidosCandidato"];
			$resultado["tipoUsuario"] = 1;
			$resultado["response"] = Constantes::EXITO;
		}else{
			//Buscamos si el usuario es empresa
			$result = mysql_query("SELECT idEmpresa, nombreEmpresa FROM empresa WHERE usuarioEmpresa = '".$nombreUsuario."' AND passwordEmpresa = '".$passwordUsuario."'",$link);
			if($result === FALSE){
				$resultado["response"] = Constantes::ERROR;
				$resultado["response"]["causa"] = Constantes::ERROR_SELECCION_NO_VALIDA;
			}else{
				$totalUsu = mysql_num_rows($result);
				if($totalUsu == 1){
					$info = mysql_fetch_assoc($result);
					$resultado["id"] = $info["idEmpresa"];
					$resultado["nombre"] = $info["nombreEmpresa"];
					$resultado["tipoUsuario"] = 2;
					$resultado["response"] = Constantes::EXITO;
				}else{
					$resultado["response"] = Constantes::ERROR;
					$resultado["response"]["causa"] = Constantes::ERROR_USUARIO_Y_O_PASSWORD_INCORRECTOS;
				}
			}
		}
	}
	
	echo json_encode($resultado);

?>