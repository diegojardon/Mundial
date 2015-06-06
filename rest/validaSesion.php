<?php
	session_start();

	if(isset($_SESSION['login'])){
		$usuario = $_SESSION['idUsuario'];
		echo "Usuario: ".$usuario;
	}else{
		echo "No hay sesion, puta madre!";
	}
?>