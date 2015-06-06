<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que loguea usuarios
	
	*/
	
	require("conexion.php");
	require("constantes.php");
	require("cors.php");

	//Se tienen que leer las variables así porque el método post de angular define el header Content-type a "application/json"
	//http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
	$data = json_decode(file_get_contents("php://input"));
	$usuarioUsuario = mysql_real_escape_string($data->usuarioUsuario);
	$passwordUsuario = mysql_real_escape_string($data->passwordUsuario);
	
	//$nombreUsuario = "empresa";
	//$passwordUsuario = "emp123";
	
	//Buscamos si el usuario es candidato
	$result = mysql_query("SELECT idUsuario, nombreUsuario FROM usuario WHERE usuarioUsuario = '".$usuarioUsuario."' AND passwordUsuario = '".$passwordUsuario."'",$link);
	
	if($result === FALSE){
		$resultado["response"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalUsu = mysql_num_rows($result);
		if($totalUsu == 1){
			$info = mysql_fetch_assoc($result);
			$resultado["id"] = $info["idUsuario"];
			$resultado["nombre"] = $info["nombreUsuario"];
			$resultado["response"] = Constantes::EXITO;
			session_start();
			$_SESSION['login']='ok';	
			$_SESSION['idUsuario'] = $info["idUsuario"];
			$_SESSION['nombreUsuario'] = $info["nombreUsuario"];
		}else{
			$resultado["response"] = Constantes::ERROR_USUARIO_Y_O_PASSWORD_INCORRECTOS;
		}
	}
	
	echo json_encode($resultado);
?>