<?php
	require_once('../conexion.php');

	$sql = "SELECT * FROM tareas";

	$resultado = $conexion->query($sql) or die($conexion->connect_error);

	$json = [];

	while($fila = $resultado->fetch_array()){
		$json[] = $fila;
	}

	echo json_encode($json);
?>