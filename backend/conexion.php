<?php 
	$conexion = new mysqli('localhost', 'root', '', 'lista_tareas_vue');

	if($conexion->connect_error){
		die($conexion->connect_error);
	}
?>