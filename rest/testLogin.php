<?php
	echo "Comienza Login\n";
	session_start();
	$_SESSION['login']='ok';
	$_SESSION['idUsuario']=1;
	if (isset($_SESSION['login'])){
		echo 'Habemus sesion';
	}else{
		echo 'No habemus sesion';
	}

?>