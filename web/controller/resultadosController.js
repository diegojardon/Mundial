/*
	Desarrolló: Diego Alberto Jardón Ramírez
	Fecha: 31 - Mayo - 2014
	Versión: 1.0
	Appsteroid -- Mundial
	
	Controlador para mostrar los resultados totales de la quiniela
	
*/

var app = angular.module("app", []);

app.controller("resultadosController", function($scope, $http){

/*var cadGET = location.search.substr(1,location.search.length); 
	var arrGET = cadGET.split("&"); 
	var vars = new Array(); 
	var variable = ""; 
	var valor = ""; 
	for(i=0;i<arrGET.length;i++){ 
		var aux = arrGET[i].split("="); 
		variable = aux[0]; 
		valor = aux[1]; 
		vars[variable] = valor; 
	} */
	
	var app = this;
	//$http.get("http://www.appsteroid.com/mundial/rest/consultaPartidos.php")
	$http.get("http://localhost:8018/mundial/rest/consultaPartidos.php")
	.success(function(data){
		console.log(data);
		app.partidos = data;
		//$scope.idUsuario = vars['id'];
	})
	.error(function(data){
		console.log(data);
	})
	
	//http://angular-tips.com/blog/2013/08/watch-how-the-apply-runs-a-digest/
	
	$scope.muestraQuinielaPartido = function(partido){
		//$http.post("http://www.appsteroid.com/mundial/rest/consultaQuinielaTotal.php", {'idPartido': partido.idPartido,'resultadoPartido':partido.resultadoPartido})
		$http.post("http://localhost:8018/mundial/rest/consultaQuinielaTotal.php", {'idPartido': partido.idPartido,'resultadoPartido':partido.resultadoPartido})
			.success(function(data){
				app.quinielas = data;
				console.log(app.quinielas);
			})
			.error(function(data){
				//Enviar a HTML de error genérico
			});
	
	}
	
	
});
