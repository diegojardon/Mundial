<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que consulta la quiniela ingresada por el usuario
				
	*/

	session_start();
	if(isset($_SESSION['login'])){
		$idUsuario = $_SESSION['idUsuario'];
		$nombreUsuario = $_SESSION['nombreUsuario'];
	}
	
	require("conexion.php");
	require("constantes.php");
	
	//$idUsuario = ($_GET["idUsuario"]);
	//$idUsuario = 2;	
	
	$query = "SELECT partido.idPartido, idQuiniela, localPartido, visitantePartido, fechaPartido, marcadorPartido, resultadoPartido, resultadoQuiniela FROM partido,quiniela WHERE idUsuario = '".$idUsuario."' AND partido.idPartido = quiniela.idPartido ORDER BY fechaPartido ASC";
	
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
				$resultado[$i]["idQuiniela"] = $info["idQuiniela"];
				$resultado[$i]["localPartido"] = $info["localPartido"];
				$resultado[$i]["visitantePartido"] = $info["visitantePartido"];
				$resultado[$i]["fechaPartido"] = $info["fechaPartido"];
				$resultado[$i]["marcadorPartido"] = $info["marcadorPartido"];
				$resultado[$i]["resultadoPartido"] =  $info["resultadoPartido"];
				$resultado[$i]["resultadoQuiniela"] =  $info["resultadoQuiniela"];
				$resultado[$i]["nombreUsuario"] = $nombreUsuario;
				$hoy = time();
				if($hoy - strtotime($info["fechaPartido"]) < 0)
					$resultado[$i]["mostrar"] =  false;
				else
					$resultado[$i]["mostrar"] =  true;
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