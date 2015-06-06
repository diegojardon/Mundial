<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que consulta la quiniela de todos los usuarios
				
	*/

	require("conexion.php");
	require("constantes.php");
	
	$query = "SELECT partido.idPartido, idQuiniela, usuario.idUsuario, localPartido, visitantePartido, fechaPartido, marcadorPartido, resultadoPartido, resultadoQuiniela, nombreUsuario FROM partido,quiniela,usuario WHERE partido.idPartido = quiniela.idPartido 
			  AND usuario.idUsuario = quiniela.idUsuario ORDER BY partido.idPartido ASC, fechaPartido ASC";
	
	//SELECT nombreUsuario, idPartido, resultadoQuiniela, idQuiniela FROM quiniela,usuario WHERE usuario.idUsuario = quiniela.idUsuario ORDER BY usuario.idUsuario ASC, idPartido ASC 
	
	
	$result = mysql_query($query,$link);
	
	if($result === FALSE){
		$resultado["response"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalFilas = mysql_num_rows($result);
		if($totalFilas > 0){
			$i = 0;
			while ($info = mysql_fetch_assoc($result)) {
				$resultado[$i]["response"] = Constantes::EXITO;
				$resultado[$i]["idPartido"] = $info["idPartido"];
				$resultado[$i]["localPartido"] = $info["localPartido"];
				$resultado[$i]["visitantePartido"] = $info["visitantePartido"];
				$resultado[$i]["fechaPartido"] = $info["fechaPartido"];
				$resultado[$i]["marcadorPartido"] = $info["marcadorPartido"];
				$resultado[$i]["resultadoPartido"] =  $info["resultadoPartido"];
				$resultado[$i]["idQuiniela"] = $info["idQuiniela"];
				$resultado[$i]["idUsuario"] = $info["idUsuario"];
				$resultado[$i]["resultadoQuiniela"] =  $info["resultadoQuiniela"];
				$resultado[$i]["nombreUsuario"] =  $info["nombreUsuario"];
				if($info["resultadoPartido"] == $info["resultadoQuiniela"] && $info["resultadoPartido"] != 0){
					if($info["resultadoPartido"] == 3){
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