<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que da de alta a un usuario
	
	*/

	require("conexion.php");
	require("constantes.php");
	require("cors.php");
	
	$data = json_decode(file_get_contents("php://input"));
	$nombreUsuario = mysql_real_escape_string($data->nombreUsuario);
	$usuarioUsuario = mysql_real_escape_string($data->usuarioUsuario);
	$passwordUsuario = mysql_real_escape_string($data->passwordUsuario);
	
	//Datos Usuario
	/*$usuarioUsuario = "test";
	$passwordUsuario = "test";
	$nombreUsuario = "test";*/
	
	$query = "INSERT INTO usuario (`idUsuario`,`usuarioUsuario`,`passwordUsuario`,`nombreUsuario`) 
			  VALUES (NULL, '$usuarioUsuario', '$passwordUsuario', '$nombreUsuario')";
	
	$result = mysql_query($query);
	
	if($result === TRUE){
		//Buscamos el id del nuevo usuario
		$result = mysql_query("SELECT idUsuario FROM usuario WHERE usuarioUsuario = '".$usuarioUsuario."' AND passwordUsuario = '".$passwordUsuario."'",$link);
		if($result === FALSE){
			$resultado["response"] = Constantes::ERROR_SELECCION_NO_VALIDA;
		}else{
			$totalUsu = mysql_num_rows($result);
			if($totalUsu == 1){
				$info = mysql_fetch_assoc($result);
				$idUsuario = $info["idUsuario"];
				$idPartido = 1;
				//Insertamos las quinielas vacías para los partidos
				for($i=0;$i<64;$i++){
					$query = "INSERT INTO quiniela (`idQuiniela`,`idUsuario`,`idPartido`,`resultadoQuiniela`) 
						VALUES (NULL, '$idUsuario', '$idPartido', 0)";
					$result = mysql_query($query);
					if($result === FALSE){
						break;
					}	
					$idPartido++;
				}
				if($idPartido == 65){
					$resultado["response"] = Constantes::EXITO;
				}else{
					$resultado["response"] = Constantes::ERROR_INSERCION_QUINIELA_VACIA_NO_VALIDA;
				}
			}else{
				$resultado["response"] = Constantes::ERROR_USUARIO_Y_O_PASSWORD_INCORRECTOS;
			}
		}
	}else{
		$resultado["response"] = Constantes::ERROR_INSERCION_USUARIO_NO_VALIDA;
	}	
		
	echo json_encode($resultado);		

?>