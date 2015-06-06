<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que consulta el ranking de usuarios
				
	*/
	
	require("conexion.php");
	require("constantes.php");
	
	error_reporting(0);
	
	$query = "SELECT partido.idPartido, idQuiniela, usuario.idUsuario, marcadorPartido, resultadoPartido, resultadoQuiniela, nombreUsuario FROM partido,quiniela,usuario WHERE partido.idPartido = quiniela.idPartido 
			  AND usuario.idUsuario = quiniela.idUsuario";
	
	//SELECT nombreUsuario, idPartido, resultadoQuiniela, idQuiniela FROM quiniela,usuario WHERE usuario.idUsuario = quiniela.idUsuario ORDER BY usuario.idUsuario ASC, idPartido ASC 
	
	
	$result = mysql_query($query,$link);

	$ranking = "";
	
	if($result === FALSE){
		$ranking["response"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalFilas = mysql_num_rows($result);
		if($totalFilas > 0){
			$i = 0;
			while ($info = mysql_fetch_assoc($result)) {
				if($info["resultadoPartido"] == $info["resultadoQuiniela"] && $info["resultadoPartido"] != 0){
					if($info["resultadoPartido"] == 3){
						$ranking[$info["idUsuario"]-1]["puntosQuiniela"] += 1;
						$ranking[$info["idUsuario"]-1]["nombreUsuario"] = $info["nombreUsuario"];
					}else{
						$ranking[$info["idUsuario"]-1]["puntosQuiniela"] += 3;
						$ranking[$info["idUsuario"]-1]["nombreUsuario"] = $info["nombreUsuario"];
					}
				}else{
					$ranking[$info["idUsuario"]-1]["puntosQuiniela"] += 0;
					$ranking[$info["idUsuario"]-1]["nombreUsuario"] = $info["nombreUsuario"];
				}
				$i++;
			}
		}else{
			$ranking["response"] = Constantes::ERROR_SIN_RESULTADOS_QUINIELA;
		}	
		
	//krsort($ranking);
		
	$size = count($ranking);
		for ($i=0; $i<$size; $i++) {
			for ($j=1; $j<$size-$i; $j++) {
				if ($ranking[$j-1]["puntosQuiniela"] < $ranking[$j]["puntosQuiniela"]) {
					$tmp = $ranking[$j-1]["puntosQuiniela"];
					$tmp2 = $ranking[$j-1]["nombreUsuario"];
					$ranking[$j-1]["puntosQuiniela"] = $ranking[$j]["puntosQuiniela"];
					$ranking[$j-1]["nombreUsuario"] = $ranking[$j]["nombreUsuario"];
					$ranking[$j]["puntosQuiniela"] = $tmp;
					$ranking[$j]["nombreUsuario"] = $tmp2;
				}
			}
		}
		
	/*$size = count($ranking);
		for ($i=0; $i<$size; $i++) {
			echo "Valor: ".$ranking[$i]["puntosQuiniela"];
		}*/
	}
	
	echo json_encode($ranking);

?>