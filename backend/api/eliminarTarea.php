<?php


require_once('../conexion.php');

$idTarea = $_GET["idTarea"];

$sql = "DELETE FROM tareas WHERE idTareas = ?";
$consulta = $conexion->prepare($sql);
$consulta->bind_param("i", $idTarea);

$consulta->execute();
$nuevo_id = $consulta->insert_id;
echo $nuevo_id;
$consulta->close();
$conexion->close();
?>