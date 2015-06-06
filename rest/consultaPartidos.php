<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 31 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Mundial
	
		Servicio que consulta los partidos
				
	*/

	/*session_start();
	if(isset($_SESSION['login'])){
		$idUsuario = $_SESSION['idUsuario'];
	}*/
	
	require("conexion.php");
	require("constantes.php");
	
	//$idUsuario = ($_GET["idUsuario"]);
	//$idUsuario = 2;	
	
	$query = "SELECT idPartido, localPartido, visitantePartido, resultadoPartido FROM partido ORDER BY fechaPartido ASC";
	
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
				$resultado[$i]["resultadoPartido"] =  $info["resultadoPartido"];
				$i++;
			}
		}else{
			$resultado["response"] = Constantes::ERROR_SIN_RESULTADOS_QUINIELA;
		}	
	}
	
	echo json_encode($resultado);

?>