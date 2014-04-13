<?php

	require("../model/conexion.php");
	require("../model/constantes.php");

	$idCandidato = isset($_POST["idCandidato"]) ? $_POST["idCandidato"] : "";
	
	//Buscamos las ofertas a las que el candidato aplicó
	$result = mysql_query("SELECT idOferta, estatusSeleccion, fechaIniciaSeleccion, fechaTerminaSeleccion FROM seleccion,oferta WHERE idCandidato = '".$idCandidato."'",$link);
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