/*
	Desarrolló: Diego Alberto Jardón Ramírez
	Fecha: 31 - Mayo - 2014
	Versión: 1.0
	Appsteroid -- Mundial
	
	Controlador para obtener los datos de sesión
	
*/

var app = angular.module("app", []);

app.controller("homeUsuarioController", function($scope, $http){

	var app = this;
	var suma = 0;
	//$http.get("http://www.appsteroid.com/mundial/rest/consultaQuiniela.php")
	$http.get("http://localhost:8018/mundial/rest/consultaQuiniela.php)
	.success(function(data){
		console.log(data);
		app.partidos = data;
		/*$scope.nombre = vars['name'].replace(/%20/g, ' ');
		$scope.idUsuario = vars['id'];*/
		$scope.idUsuario = data[0].idUsuario;
		$scope.nombre = data[0].nombreUsuario;
		for(i=0;i<64;i++){
			suma += data[i].puntosQuiniela; 
		}
		console.log(suma);
		
		$scope.total = suma;
	})
	.error(function(data){
		console.log(data);
	})
	
	$scope.actualizaQuiniela = function(id, resultado){
		//console.log(id +","+resultado);
		$http.post("http://www.appsteroid.com/mundial/rest/actualizaQuiniela.php", {'idQuiniela': id,'resultadoQuiniela':resultado})
		//$http.post("http://localhost:8018/mundial/rest/actualizaQuiniela.php", {'idQuiniela': id,'resultadoQuiniela':resultado})
		.success(function(data){
			$scope.usuarioLogin = data;
			console.log(data);
			if(data.response != 0){
				alert("Error al actualizar quiniela!");
			}
		})
		.error(function(data){
			//Enviar a HTML de error genérico
		});
	}
		
});
