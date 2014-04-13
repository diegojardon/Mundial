<?php

	require("../model/conexion.php");
	require("../model/constantes.php");
	
	//Validacion de variables
	$idEmpresa = isset($_POST["idEmpresa"]) ? $_POST["idEmpresa"] : "";
	$nombreOferta = isset($_POST["nombreOferta"]) ? $_POST["nombreOferta"] : "";
	$descripcionOferta = isset($_POST["descripcionOferta"]) ? $_POST["descripcionOferta"] : "";
	$horarioOferta = isset($_POST["horarioOferta"]) ? $_POST["horarioOferta"] : "";
	$diasLaboralesOferta = isset($_POST["diasLaboralesOferta"]) ? $_POST["diasLaboralesOferta"] : "";
	$tipoPlazaOferta = isset($_POST["tipoPlazaOferta"]) ? $_POST["tipoPlazaOferta"] : "";
	$puestoOferta = isset($_POST["puestoOferta"]) ? $_POST["puestoOferta"] : "";
	$sueldoOferta = isset($_POST["sueldoOferta"]) ? $_POST["sueldoOferta"] : "";
	$latUbicacionOferta = isset($_POST["latUbicacionOferta"]) ? $_POST["latUbicacionOferta"] : "";
	$lonUbicacionOferta = isset($_POST["lonUbicacionOferta"]) ? $_POST["lonUbicacionOferta"] : "";
	$totalPlazasOferta = isset($_POST["totalPlazasOferta"]) ? $_POST["totalPlazasOferta"] : "";
	$viajesOferta = isset($_POST["viajesOferta"]) ? $_POST["viajesOferta"] : "";
	$residenciaOferta = isset($_POST["residenciaOferta"]) ? $_POST["residenciaOferta"] : "";
	$fechaCreacionferta = isset($_POST["fechaCreacionOferta"]) ? $_POST["fechaCreacionOferta"] : "";
	$estatusOferta = isset($_POST["estatusOferta"]) ? $_POST["estatusOferta"] : "";
	
	$query = "INSERT INTO oferta (`idOferta`,`nombreOferta`,`descripcionOferta`,`horarioOferta`,`diasLaboralesOferta`,`tipoPlazaOferta`,`puestoOferta`,`sueldoOferta`,
								  `latUbicacionOferta`,`lonUbicacionOferta`,`totalPlazasOferta`,`viajesOferta`,`residenciaOferta`,`fechaCreacionOferta`,`estatusOferta`) 
			  VALUES (NULL, '$nombreOferta', '$descripcionOferta', '$horarioOferta', '$diasLaboralesOferta','$tipoPlazaOferta','$puestoOferta','$sueldoOferta',
								'$latUbicacionOferta','$lonUbicacionOferta','$totalPlazasOferta','$viajesOferta','$residenciaOferta','$fechaCreacionOferta','$estatusOferta')";
	
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = ERROR_INSERCION_NO_VALIDA;
	}	
	echo json_encode($resultado);

?>