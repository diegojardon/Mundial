/*
	Desarrolló: Diego Alberto Jardón Ramírez
	Fecha: 31 - Mayo - 2014
	Versión: 1.0
	Appsteroid -- Mundial
	
	Controlador para el registro de usuarios
	
*/

//Validaciones de formularios con angularjs
//http://www.ng-newsletter.com/posts/validations.html

function registroUsuarioController($scope, $http, $templateCache){
	//nombre del método
	$scope.registraUsuario = function(usuario){
		//enviamos los parámetros por post al servicio REST
		//alert("Nombre: "+candidato.nombre);
		//Web Service Productivo
		//$http.post("http://www.appsteroid.com/mundial/rest/altaUsuario.php", 
		$http.post("http://localhost:8018/mundial/rest/altaUsuario.php", 
		{
			'nombreUsuario': usuario.nombre,
			'usuarioUsuario': usuario.usuario,
			'passwordUsuario': usuario.password
		})
		.success(function(data){
			//$scope.usuarioLogin = data;
			console.log(data);
			if(data.response == 0){
				alert("Registro Exitoso!");
			}else{
				alert("Error!No se pudo registrar al usuario");
			}
		})
		.error(function(data){
			//Enviar a HTML de error genérico
		});
	}
}