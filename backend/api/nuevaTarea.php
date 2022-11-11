<?php

require_once('../conexion.php');
$tarea = $_POST["nombreTarea"];
$fecha = $_POST["fecha"];

$sql = "INSERT INTO tareas value(null, ?, ?)";
$consulta = $conexion->prepare($sql);
$consulta->bind_param("ss", $tarea, $fecha);

$consulta->execute();
$nuevo_id = $consulta->insert_id;
echo $nuevo_id;

$consulta->close();
$conexion->close();

?>