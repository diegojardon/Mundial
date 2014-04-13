<?php

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	$idOferta = isset($_POST["idOferta"]) ? $_POST["idOferta"] : "";
		
	//Buscamos ofertas de acuerdo al area seleccionada
	$result = mysql_query("SELECT descripcionOferta, horarioOferta, diasLaboralesOferta, tipoPlazaOferta, puestoOferta, sueldoOferta, latUbicacionOferta,
						   lonUbicacionOferta, totalPlazasOferta, viajesOferta, residenciaOferta, fechaCreacionOferta FROM oferta WHERE idOferta = '".$idOferta."'",$link);
	
	if($result === FALSE){
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_SELECCION_NO_VALIDA;
	}else{
		$totalFilas = mysql_num_rows($result);
		if($totalFilas > 0){
			$info = mysql_fetch_assoc($result);
			$resultado["response"] = Constantes::EXITO;
			$resultado["descripcionOferta"] = $info["descripcionOferta"];
			$resultado["horarioOferta"] = $info["horarioOferta"];
			$resultado["diasLaboralesOferta"] = $info["diasLaboralesOferta"];
			$resultado["tipoPlazaOferta"] = $info["tipoPlazaOferta"];
			$resultado["puestoOferta"] = $info["puestoOferta"];
			$resultado["sueldoOferta"] = $info["sueldoOferta"];
			$resultado["latUbicacionOferta"] = $info["latUbicacionOferta"];
			$resultado["lonUbicacionOferta"] = $info["lonUbicacionOferta"];
			$resultado["totalPlazasOferta"] = $info["totalPlazasOferta"];
			$resultado["viajesOferta"] = $info["viajesOferta"];
			$resultado["residenciaOferta"] = $info["residenciaOferta"];
			$resultado["fechaCreacionOferta"] = $info["fechaCreacionOferta"];
		}else{
			$resultado["response"] = Constantes::ERROR;
			$resultado["response"]["causa"] = Constantes::ERROR_SIN_RESULTADOS_DETALLE_OFERTA;
		}	
	}

	echo json_encode($resultado);

?>