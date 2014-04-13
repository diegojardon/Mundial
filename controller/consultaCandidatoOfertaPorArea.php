<?php

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	$idArea = isset($_POST["idArea"]) ? $_POST["idArea"] : "";
	$ultimoRegistro = isset($_POST["ultimoRegistro"]) ? $_POST["ultimoRegistro"] : "";
	
	//Buscamos ofertas de acuerdo al area de trabajo seleccionada
	$result = mysql_query("SELECT idOferta, nombreOferta, nombreEmpresa FROM oferta,empresa WHERE idArea = '".$idArea."' AND estatusOferta = 'ACTIVA' 
						   AND oferta.idEmpresa = empresa.idEmpresa LIMIT " . $ultimoRegistro . ", 100",$link);
	
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
			}
		}else{
			$resultado["response"] = Constantes::ERROR;
			$resultado["response"]["causa"] = Constantes::ERROR_SIN_RESULTADOS_OFERTA_AREA;
		}	
	}
		
	echo json_encode($resultado);

?>