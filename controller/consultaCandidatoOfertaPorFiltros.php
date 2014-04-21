<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 13 - Abril - 2014
		Versión: 1.0
		Appsteroid -- Conectrabajo
	
		Servicio que consulta las ofertas de acuerdo a los filtros:
			-Área de Trabajo
			-Edad
			-Sueldo
			-Estado
			
		Si los valores de filtros son los genéricos, se muestran todos los resultados
	
	*/

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	$idArea = isset($_POST["idArea"]) ? $_POST["idArea"] : "";
	$ultimoRegistro = isset($_POST["ultimoRegistro"]) ? $_POST["ultimoRegistro"] : "";
	$edadOferta = isset($_POST["edadOferta"]) ? $_POST["edadOferta"] : "";
	$sueldoMinOferta = isset($_POST["sueldoMinOferta"]) ? $_POST["sueldoMinOferta"] : "";
	$sueldoMaxOferta = isset($_POST["sueldoMaxOferta"]) ? $_POST["sueldoMaxOferta"] : "";
	$estadoOferta = isset($_POST["estadoOferta"]) ? $_POST["estadoOferta"] : "";
	
	//Armamos el query de la consulta de acuerdo a los filtros solicitados por el usuario
	
	$query = "SELECT idOferta, nombreOferta, nombreEmpresa, visitasOferta FROM oferta,empresa WHERE estatusOferta = 'ACTIVA' ";
	
	//Filtro por Área de Trabajo
	if($idArea != 0){
		$query .= "AND idArea = '".$idArea."' ";
	}

	//Filtro por Edad
	if($edad != 0){
		$query .= "AND edadOferta >= '".$edadOferta."' ";
	}
	
	//Filtro por Sueldo
	if($sueldoMaxOferta != 0){
		$query .= "AND sueldoMinOferta >= '".$sueldoMinOferta."' AND sueldoMaxOferta <= '".$sueldoMaxOferta."' ";
	}
	
	//Filtro por Estado
	if($estadoOferta != 0){
		$query .= "AND estadoOferta = '".$estadoOferta."' ";
	}
	
	//Agregamos el final del query
	$query .= "AND oferta.idEmpresa = empresa.idEmpresa ORDER BY fechaCreacionOferta DESC LIMIT " . $ultimoRegistro . ", 100";
	
	$result = mysql_query($query,$link);
	
	if($result === FALSE){
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalFilas = mysql_num_rows($result);
		if($totalFilas > 0){
			$resultado["response"] = Constantes::EXITO;
			while ($info = mysql_fetch_assoc($result)) {
				$resultado["idOferta"] = $info["idOferta"];
				$resultado["nombreOferta"] = $info["nombreOferta"];
				$resultado["nombreEmpresa"] = $info["nombreEmpresa"];
				$resultado["visitasOferta"] = $info["visitasOferta"];
			}
		}else{
			$resultado["response"] = Constantes::ERROR;
			$resultado["response"]["causa"] = Constantes::ERROR_SIN_RESULTADOS_OFERTA_AREA;
		}	
	}
		
	echo json_encode($resultado);

?>