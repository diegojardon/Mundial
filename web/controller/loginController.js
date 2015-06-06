/*
	Desarrolló: Diego Alberto Jardón Ramírez
	Fecha: 31 - Mayo - 2014
	Versión: 1.0
	Appsteroid -- Mundial
	
	Controlador para el inicio de sesión
	
*/

function loginCtrl($scope, $http, $templateCache){
	//nombre del método
	$scope.iniciaSesion = function(usuario){
		//enviamos los parámetros por post al servicio REST
		//alert("Usuario: "+usuario.nombre+" , Password: "+usuario.password);
		//Web Service Productivo
		//$http.post("http://www.appsteroid.com/mundial/rest/login.php", {'usuarioUsuario': usuario.usuario, 'passwordUsuario': usuario.password})
		$http.post("http://localhost:8018/mundial/rest/login.php", {'usuarioUsuario': usuario.usuario, 'passwordUsuario': usuario.password})
		.success(function(data){
			$scope.usuarioLogin = data;
			if(data.response == 0){
				//Aquí se puede colocar un loader y un timer que diga "Iniciando Sesión"
				document.location.href = "../view/homeUsuario.html";
			}else{
				//alert("Valor: " + $scope.usuarioLogin.response);
				$scope.mensaje = "Error! Usuario y/o password incorrecto.";
			}
		})
		.error(function(data){
			//Enviar a HTML de error genérico
		});
	}
}
