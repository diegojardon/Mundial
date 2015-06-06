<?php

	/*
		Desarrolló: Diego Alberto Jardón Ramírez
		Fecha: 25 - Mayo - 2014
		Versión: 1.0
		Appsteroid -- Conectrabajo
	
		Utilidades Conectrabajo
	
	*/

//Singleton en PHP (se puede usar Singleton o miembros estáticos
//http://www.cristalab.com/tutoriales/crear-e-implementar-el-patron-de-diseno-singleton-en-php-c256l/

class Utilidades{

	public static function mapeoEstado($idEstado){
		$estado = "";
		switch($idEstado){
			case 1:
				$estado = "Aguascalientes";
				break;
			case 2:
				$estado = "Baja California Norte";
				break;
			case 3:
				$estado = "Baja California Sur";
				break;
			case 4:
				$estado = "Campeche";
				break;
			case 5:
				$estado = "Coahuila";
				break;
			case 6:
				$estado = "Colima";
				break;
			case 7:
				$estado = "Chiapas";
				break;
			case 8:
				$estado = "Chihuahua";
				break;
			case 9:
				$estado = "Distrito Federal";
				break;
			case 10:
				$estado = "Durango";
				break;
			case 11:
				$estado = "Guanajuato";
				break;
			case 12:
				$estado = "Guerrero";
				break;
			case 13:
				$estado = "Hidalgo";
				break;
			case 14:
				$estado = "Jalisco";
				break;
			case 15:
				$estado = "Estado de Mexico";
				break;
			case 16:
				$estado = "Michoacan";
				break;
			case 17:
				$estado = "Morelos";
				break;
			case 18:
				$estado = "Nayarit";
				break;
			case 19:
				$estado = "Nuevo Leon";
				break;
			case 20:
				$estado = "Oaxaca";
				break;
			case 21:
				$estado = "Puebla";
				break;
			case 22:
				$estado = "Queretaro";
				break;
			case 23:
				$estado = "Quintana Roo";
				break;
			case 24:
				$estado = "San Luis Potosi";
				break;
			case 25:
				$estado = "Sinaloa";
				break;
			case 26:
				$estado = "Sonora";
				break;
			case 27:
				$estado = "Tabasco";
				break;
			case 28:
				$estado = "Tamaulipas";
				break;
			case 29:
				$estado = "Tlaxcala";
				break;
			case 30:
				$estado = "Veracruz";
				break;
			case 31:
				$estado = "Yucatan";
				break;
			case 32:
				$estado = "Zacatecas";
				break;
			default:
				$estado = "Error";
		}
		return $estado;
	}
	
	public static function mapeoAreaInteres($idArea){
		$areaInteres = "";
		switch($idArea){
			case 1:
				$areaInteres = "Sistemas";
				break;
			case 2:
				$areaInteres = "Diseño Grafico";
				break;
			case 3:
				$areaInteres = "Contabilidad";
				break;
			case 4:
				$areaInteres = "Administracion";
				break;
			case 5:
				$areaInteres = "Cocina";
				break;
			case 6:
				$areaInteres = "";
				break;
			case 7:
				$areaInteres = "";
				break;
			case 8:
				$areaInteres = "";
				break;
			case 9:
				$areaInteres = "";
				break;
			case 10:
				$areaInteres = "";
				break;
			case 11:
				$areaInteres = "";
				break;
			case 12:
				$areaInteres = "";
				break;
			case 13:
				$areaInteres = "";
				break;
			case 14:
				$areaInteres = "";
				break;
			case 15:
				$areaInteres = "";
				break;
			case 16:
				$areaInteres = "";
				break;
			case 17:
				$areaInteres = "";
				break;
			case 18:
				$areaInteres = "";
				break;
			case 19:
				$areaInteres = "";
				break;
			case 20:
				$areaInteres = "";
				break;
			default:
				$areaInteres = "Error";
		}
		return $areaInteres;
	}
	
	public static function convierteEspacios($cadenaOrigen){
		return str_replace("%20"," ",$cadenaOrigen);
	}
}

?>