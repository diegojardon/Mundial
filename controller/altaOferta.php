<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 13 - Abril - 2014
		Versión: 1.0
		Appsteroid -- Conectrabajo
	
		Servicio que inserta una nueva oferta laboral
	
	*/

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
	$sueldoMinOferta = isset($_POST["sueldoMinOferta"]) ? $_POST["sueldoMinOferta"] : "";
	$sueldoMaxOferta = isset($_POST["sueldoMaxOferta"]) ? $_POST["sueldoMaxOferta"] : "";
	$latUbicacionOferta = isset($_POST["latUbicacionOferta"]) ? $_POST["latUbicacionOferta"] : "";
	$lonUbicacionOferta = isset($_POST["lonUbicacionOferta"]) ? $_POST["lonUbicacionOferta"] : "";
	$totalPlazasOferta = isset($_POST["totalPlazasOferta"]) ? $_POST["totalPlazasOferta"] : "";
	$viajesOferta = isset($_POST["viajesOferta"]) ? $_POST["viajesOferta"] : "";
	$residenciaOferta = isset($_POST["residenciaOferta"]) ? $_POST["residenciaOferta"] : "";
	$fechaCreacionferta = isset($_POST["fechaCreacionOferta"]) ? $_POST["fechaCreacionOferta"] : "";
	$estatusOferta = isset($_POST["estatusOferta"]) ? $_POST["estatusOferta"] : "";
	$idArea = isset($_POST["idArea"]) ? $_POST["idArea"] : "";
	$visitasOferta = isset($_POST["visitasOferta"]) ? $_POST["visitasOferta"] : "";
	$edadOferta = isset($_POST["edadOferta"]) ? $_POST["edadOferta"] : "";
	$estadoOferta = isset($_POST["estadoOferta"]) ? $_POST["estadoOferta"] : "";
	
	$query = "INSERT INTO oferta (`idOferta`,`nombreOferta`,`descripcionOferta`,`horarioOferta`,`diasLaboralesOferta`,`tipoPlazaOferta`,`puestoOferta`,`sueldoMinOferta`,`sueldoMaxOferta`,
								  `latUbicacionOferta`,`lonUbicacionOferta`,`totalPlazasOferta`,`viajesOferta`,`residenciaOferta`,`fechaCreacionOferta`,`estatusOferta`
								  ,`idArea`,`visitasOferta`,`edadOferta`,`estadoOferta`) 
			  VALUES (NULL, '$nombreOferta', '$descripcionOferta', '$horarioOferta', '$diasLaboralesOferta','$tipoPlazaOferta','$puestoOferta','$sueldoMinOferta','$sueldoMaxOferta',
								'$latUbicacionOferta','$lonUbicacionOferta','$totalPlazasOferta','$viajesOferta','$residenciaOferta','$fechaCreacionOferta','$estatusOferta'
								,'$idArea','$visitasOferta','$edadOferta','$estadoOferta')";
	$result = mysql_query($query);
	if($result === TRUE){
		$resultado["response"] = Constantes::EXITO;
	}else{
		$resultado["response"] = Constantes::ERROR;
		$resultado["response"]["causa"] = Constantes::ERROR_INSERCION_OFERTA_NO_VALIDA;
	}	
	echo json_encode($resultado);

?>