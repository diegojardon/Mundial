<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 13 - Abril - 2014
		Versión: 1.0
		Appsteroid -- Conectrabajo
	
		Servicio que consulta las ofertas a las cuales aplicó un candidato
	
	*/

	require("../model/conexion.php");
	require("../model/constantes.php");

	$idCandidato = isset($_POST["idCandidato"]) ? $_POST["idCandidato"] : "";
	
	//Buscamos las ofertas a las que el candidato aplicó
	$result = mysql_query("SELECT idOferta, estatusSeleccion, fechaIniciaSeleccion, fechaTerminaSeleccion FROM seleccion WHERE idCandidato = '".$idCandidato."'",$link);
	if($result === FALSE){
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalFilas = mysql_num_rows($result);
		if($totalFilas > 0){
			$resultado["response"] = Constantes::EXITO;
			while ($info = mysql_fetch_assoc($result)) {
				$resultado["idOferta"] = $info["idOferta"];
				$resultado["estatusSeleccion"] = $info["estatusSeleccion"];
				$resultado["fechaIniciaSeleccion"] = $info["fechaIniciaSeleccion"];
				$resultado["fechaTerminaSeleccion"] = $info["fechaTerminaSeleccion"];
			}
		}else{
			$resultado["response"] = Constantes::ERROR;
			$resultado["response"]["causa"] = Constantes::ERROR_SIN_RESULTADOS_OFERTA_SELECCIONADA;
		}	
	}
	
	echo json_encode($resultado);

?>