/*
	Desarrolló: Diego Alberto Jardón Ramírez
	Fecha: 31 - Mayo - 2014
	Versión: 1.0
	Appsteroid -- Mundial
	
	Controlador para mostrar el ranking
	
*/

var app = angular.module("app", []);

app.controller("rankingController", function($scope, $http){

var cadGET = location.search.substr(1,location.search.length); 
	var arrGET = cadGET.split("&"); 
	var vars = new Array(); 
	var variable = ""; 
	var valor = ""; 
	for(i=0;i<arrGET.length;i++){ 
		var aux = arrGET[i].split("="); 
		variable = aux[0]; 
		valor = aux[1]; 
		vars[variable] = valor; 
	} 
	
	var app = this;
	//$http.get("http://www.appsteroid.com/mundial/rest/consultaRanking.php")
	$http.get("http://localhost:8018/mundial/rest/consultaRanking.php")
	.success(function(data){
		console.log(data);
		app.ranking = data;
		
		//Track by $index
		//http://stackoverflow.com/questions/16296670/angular-ng-repeat-error-duplicates-in-a-repeater-are-not-allowed
		
		$scope.idUsuario = vars['id'];
	})
	.error(function(data){
		console.log(data);
	})
	
});
