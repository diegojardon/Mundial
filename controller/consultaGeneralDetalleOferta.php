<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 13 - Abril - 2014
		Versión: 1.0
		Appsteroid -- Conectrabajo
	
		Servicio que consulta el detalle de una oferta
	
	*/

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	$idOferta = isset($_POST["idOferta"]) ? $_POST["idOferta"] : "";
		
	//Buscamos ofertas de acuerdo al area seleccionada
	$result = mysql_query("SELECT nombreOferta, descripcionOferta, horarioOferta, diasLaboralesOferta, tipoPlazaOferta, puestoOferta, sueldoMinOferta, sueldoMaxOferta, latUbicacionOferta,
						   lonUbicacionOferta, totalPlazasOferta, viajesOferta, residenciaOferta, fechaCreacionOferta, edadOferta, estadoOferta FROM oferta WHERE idOferta = '".$idOferta."'",$link);
	
	if($result === FALSE){
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalFilas = mysql_num_rows($result);
		if($totalFilas > 0){
			$info = mysql_fetch_assoc($result);
			$resultado["response"] = Constantes::EXITO;
			$resultado["nombreOferta"] = $info["nombreOferta"];
			$resultado["descripcionOferta"] = $info["descripcionOferta"];
			$resultado["horarioOferta"] = $info["horarioOferta"];
			$resultado["diasLaboralesOferta"] = $info["diasLaboralesOferta"];
			$resultado["tipoPlazaOferta"] = $info["tipoPlazaOferta"];
			$resultado["puestoOferta"] = $info["puestoOferta"];
			$resultado["sueldoMinOferta"] = $info["sueldoMinOferta"];
			$resultado["sueldoMaxOferta"] = $info["sueldoMaxOferta"];
			$resultado["latUbicacionOferta"] = $info["latUbicacionOferta"];
			$resultado["lonUbicacionOferta"] = $info["lonUbicacionOferta"];
			$resultado["totalPlazasOferta"] = $info["totalPlazasOferta"];
			$resultado["viajesOferta"] = $info["viajesOferta"];
			$resultado["residenciaOferta"] = $info["residenciaOferta"];
			$resultado["fechaCreacionOferta"] = $info["fechaCreacionOferta"];
			$resultado["edadOferta"] = $info["edadOferta"];
			$resultado["estadoOferta"] = $info["estadoOferta"];
		}else{
			$resultado["response"] = Constantes::ERROR;
			$resultado["response"]["causa"] = Constantes::ERROR_SIN_RESULTADOS_DETALLE_OFERTA;
		}	
	}

	echo json_encode($resultado);

?>