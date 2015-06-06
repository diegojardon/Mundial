<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que consulta la quiniela de todos los usuarios para un partido
				
	*/

	require("conexion.php");
	require("constantes.php");
	require("cors.php");
	
	$data = json_decode(file_get_contents("php://input"));
	$idPartido = mysql_real_escape_string($data->idPartido);
	$resultadoPartido = mysql_real_escape_string($data->resultadoPartido);
	
	$query = "SELECT idQuiniela, resultadoQuiniela, nombreUsuario FROM quiniela,usuario WHERE usuario.idUsuario = quiniela.idUsuario AND idPartido ='".$idPartido."'";
	
	$result = mysql_query($query,$link);
	
	if($result === FALSE){
		$resultado["response"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalFilas = mysql_num_rows($result);
		if($totalFilas > 0){
			$i = 0;
			while ($info = mysql_fetch_assoc($result)) {
				$resultado[$i]["response"] = Constantes::EXITO;
				$resultado[$i]["resultadoQuiniela"] =  $info["resultadoQuiniela"];
				$resultado[$i]["nombreUsuario"] =  $info["nombreUsuario"];
				$resultado[$i]["idQuiniela"] =  $info["idQuiniela"];
				if($resultadoPartido == $info["resultadoQuiniela"] && $resultadoPartido != 0){
					if($resultadoPartido == 3){
						$resultado[$i]["puntosQuiniela"] = 1;
					}else{
						$resultado[$i]["puntosQuiniela"] = 3;
					}
				}else{
					$resultado[$i]["puntosQuiniela"] = 0;
				}
				$i++;
			}
		}else{
			$resultado["response"] = Constantes::ERROR_SIN_RESULTADOS_QUINIELA;
		}	
	}
	
	echo json_encode($resultado);

?>